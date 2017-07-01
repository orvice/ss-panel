<?php


namespace App\Controllers\Api;

use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\BaseController;
use App\Models\Node;
use App\Models\TrafficLog;
use App\Utils\Ss as SsUtil;
use App\Utils\Tools;
use App\Models\CheckInLog;
use App\Utils\Hash;

class UserController extends BaseController
{

    const CurrentPassword = 102;
    const NewPasswordRepeatWrong = 103;

    const EmptyInput = 701;


    /**
     * @param $args
     * @return User
     */
    private function getUserFromArgs($args)
    {
        $id = $args['id'];
        return User::find($id);
    }

    public function show(Request $req, Response $res, $args)
    {
        $user = $this->getUserFromArgs($args);

        return $this->echoJson($res, [
            'data' => $user,
            'traffic' => [
                "usagePercent" => $user->trafficUsagePercent(),
                "total" => $user->enableTraffic(),
                "used" => $user->usedTraffic(),
                "unused" => $user->unusedTraffic(),
            ],
            "checkIn" => [
                "lastCheckInTime" => $user->lastCheckInTime(),
                "canCheckIn" => $user->isAbleToCheckin(),
            ],
            "ss" => [
                "lastUsedTime" => $user->lastSsTime(),
            ],
        ]);
    }

    public function nodes(Request $req, Response $res, $args)
    {
        $user = $this->getUserFromArgs($args);
        $nodes = Node::where('type', 1)->orderBy('sort')->get();
        $data = [];
        foreach ($nodes as $n) {
            $n->ssArr = SsUtil::genSsAry($n->server, $user->port + $n->offset, $user->passwd, $user->method);
            $n->ssQr = SsUtil::genQrStr($n->server, $user->port + $n->offset, $user->passwd, $user->method);
            $n->ssrQr = SsUtil::genSsrQrStr($n->server, $user->port + $n->offset, $user->passwd, $user->method, $user->protocol, $user->obfs, $user->obfs_param, $user->protocol_param);
            array_push($data, $n);
        }
        return $this->echoJsonWithData($res, $data);
    }

    public function trafficLogs(Request $req, Response $res, $args)
    {
        $pageNum = 1;
        if (isset($req->getQueryParams()['page'])) {
            $pageNum = $req->getQueryParams()['page'];
        }
        $traffic = TrafficLog::where('user_id', $args['id'])
            ->join('ss_node', 'user_traffic_log.node_id', '=', 'ss_node.id')
            ->orderBy('user_traffic_log.id', 'desc')
            ->paginate(15, [
                'user_traffic_log.*',
                'ss_node.name as name'
            ], 'page', $pageNum);
        $traffic->setPath('/api/users/' . $args['id'] . '/trafficLogs');
        //return $this->echoJsonWithData($res,$traffic);
        return $this->echoJson($res, $traffic);
    }


    public function update(Request $request, Response $response, $args)
    {
        $user = $this->getUserFromArgs($args);
        $input = file_get_contents("php://input");
        $arr = json_decode($input, true);
        foreach ($arr as $k => $v) {
            if ($v == '') {
                return $this->echoJson($response, [
                    'error_code' => self::EmptyInput,
                ], 400);
            }
            $user->$k = $v;
        }

        $user->save();
        return $this->echoJsonWithData($response, []);
    }

    public function handleCheckIn(Request $request, Response $response, $args)
    {
        $user = $this->getUserFromArgs($args);

        if (!$user->isAbleToCheckin()) {
            return $this->echoJsonError($response, []);
        }
        $traffic = rand(conf('checkinMin'), conf('checkinMax'));
        $trafficToAdd = Tools::toMB($traffic);
        $user->transfer_enable = $user->transfer_enable + $trafficToAdd;
        $user->last_check_in_time = time();
        $user->save();
        // checkin log
        try {
            $log = new CheckInLog();
            $log->user_id = $user->id;
            $log->traffic = $trafficToAdd;
            $log->checkin_at = time();
            $log->save();
        } catch (\Exception $e) {
            return $this->echoJsonError($response, [], 500);
        }

        return $this->echoJson($response, [
            "traffic" => Tools::flowAutoShow($traffic),
        ]);
    }

    public function updatePassword(Request $request, Response $response, $args)
    {
        $user = $this->getUserFromArgs($args);
        $currentPassword = $request->getParam('current_password');
        $newPassword = $request->getParam('new_password');
        $newPasswordRepeat = $request->getParam('new_password_repeat');

        // check current password
        if (!Hash::checkPassword($user->pass, $currentPassword)) {
            return $this->echoJson($response, [
                'error_code' => self::CurrentPassword,
            ], 400);
        }

        // check new password
        if ($newPassword != $newPasswordRepeat) {
            return $this->echoJson($response, [
                'error_code' => self::NewPasswordRepeatWrong,
            ], 400);
        }

        // Update Password
        $hashPwd = Hash::passwordHash($newPasswordRepeat);
        $user->pass = $hashPwd;
        $user->save();

        return $this->echoJsonWithData($response, []);
    }

}