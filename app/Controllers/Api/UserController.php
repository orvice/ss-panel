<?php


namespace App\Controllers\Api;

use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\BaseController;
use App\Models\Node;
use App\Models\TrafficLog;
use App\Utils\Ss as SsUtil;

class UserController extends BaseController
{
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


    public function update(Request $req, Response $res, $args)
    {

    }

    public function handleCheckIn(Request $request, Response $response, $args)
    {
        $user = $this->getUserFromArgs($args);

        if (!$this->user->isAbleToCheckin()) {
            // @todo
        }
        $traffic = rand(Config::get('checkinMin'), Config::get('checkinMax'));
        $trafficToAdd = Tools::toMB($traffic);
        $this->user->transfer_enable = $this->user->transfer_enable + $trafficToAdd;
        $this->user->last_check_in_time = time();
        $this->user->save();
        // checkin log
        try {
            $log = new CheckInLog();
            $log->user_id = Auth::getUser()->id;
            $log->traffic = $trafficToAdd;
            $log->checkin_at = time();
            $log->save();
        } catch (\Exception $e) {
        }
        $res['msg'] = sprintf('获得了 %u MB流量.', $traffic);
        $res['ret'] = 1;

        return $this->echoJson($response, $res);
    }
}