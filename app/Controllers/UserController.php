<?php

namespace App\Controllers;

use App\Models\CheckInLog;
use App\Models\InviteCode;
use App\Models\Node;
use App\Models\TrafficLog;
use App\Utils\Hash;
use App\Utils\Tools;
use Slim\Http\Request;

/**
 *  HomeController.
 */
class UserController extends BaseController
{


    /**
     * @param Request $request
     * @param $response
     * @param $args
     * @return string
     */
    public function index(Request $request, $response, $args)
    {
        return $this->view('user/index', [
            "user" => $this->user,
        ]);
    }

    /**
     * @param Request $request
     * @param $response
     * @param $args
     * @return string
     */
    public function node(Request $request, $response, $args)
    {
        $nodes = Node::where('type', 1)->orderBy('sort')->get();
        return $this->view('user/node', [
            "nodes" => $nodes
        ]);
    }

    /**
     * @param Request $request
     * @param $response
     * @param $args
     * @return mixed
     */
    public function nodeInfo(Request $request, $response, $args)
    {
        $user = $this->getUser();
        $id = $args['id'];
        $node = Node::find($id);

        if ($node == null) {
        }
        $ary['server'] = $node->server;
        $ary['server_port'] = $this->user->port;
        $ary['password'] = $this->user->passwd;
        $ary['method'] = $this->user->method;
        /*        if ($this->user->custom_method) {
                    $ary['method'] = $this->user->method;
                }*/
        $ary['protocol'] = $this->user->protocol;
        $ary['obfs'] = $this->user->obfs;
        if ($this->user->obfs == 'http_post' || $this->user->obfs == 'http_simple' || $this->user->obfs == 'tls1.2_ticket_auth') {
            $ary['obfs_param'] = $this->user->obfs_param;
        }
        $json = json_encode($ary);
        $json_show = json_encode($ary, JSON_PRETTY_PRINT);

        if ($user->obfs == 'http_simple' || $user->obfs == 'http_post' || $user->obfs == 'random_head' || $user->obfs == 'tls_simple' || $user->obfs == 'tls1.0_session_auth' || $user->obfs == 'tls1.2_ticket_auth' || $user->protocol == 'verify_simple' || $user->protocol == 'verify_deflate' || $user->protocol == 'verify_sha1' || $user->protocol == 'auth_simple' || $user->protocol == 'auth_sha1' || $user->protocol == 'auth_sha1_v2') {
            $ssurl = str_replace('_compatible', '', $user->obfs) . ':' . str_replace('_compatible', '', $user->protocol) . ':' . $ary['method'] . ':' . $ary['password'] . '@' . $ary['server'] . ':' . $ary['server_port'] . '/' . base64_encode($user->obfs_param);
            $ssqr_s = 'ss://' . base64_encode($ssurl);
            $ssqr = 'ss://' . base64_encode($ssurl);
        } else {
            $ssurl = str_replace('_compatible', '', $user->obfs) . ':' . str_replace('_compatible', '', $user->protocol) . ':' . $ary['method'] . ':' . $ary['password'] . '@' . $ary['server'] . ':' . $ary['server_port'] . '/' . base64_encode($user->obfs_param);
            $ssqr_s = 'ss://' . base64_encode($ssurl);
            $ssurl = $ary['method'] . ':' . $ary['password'] . '@' . $ary['server'] . ':' . $ary['server_port'];
            $ssqr = 'ss://' . base64_encode($ssurl);
        }

        /*        $token_1 = LinkController::GenerateSurgeCode($ary['server'],$ary['server_port'],$this->user->id,0,$ary['method']);
                        $token_2 = LinkController::GenerateSurgeCode($ary['server'],$ary['server_port'],$this->user->id,1,$ary['method']);*/

        $surge_base = config('app.base_url') . '/downloads/ProxyBase.conf';
        $surge_proxy = "#!PROXY-OVERRIDE:ProxyBase.conf\n";
        $surge_proxy .= "[Proxy]\n";
        $surge_proxy .= 'Proxy = custom,' . $ary['server'] . ',' . $ary['server_port'] . ',' . $ary['method'] . ',' . $ary['password'] . ',' . Config::get('baseUrl') . '/downloads/SSEncrypt.module';

        return $this->view()->assign('json', $json)->assign('json_show', $json_show)->assign('ssqr', $ssqr)->assign('ssqr_s', $ssqr_s)->assign('surge_base', $surge_base)->assign('surge_proxy', $surge_proxy)->display('user/nodeinfo.tpl');
        /*        return $this->view()->assign('ary', $ary)->assign('node',$node)->assign('user',$this->user)->assign('json', $json)->assign('link1',Config::get('baseUrl')."/link/".$token_1)->assign('link2',Config::get('baseUrl')."/link/".$token_2)->assign('json_show', $json_show)->assign('ssqr', $ssqr)->assign('ssqr_s', $ssqr_s)->assign('surge_base', $surge_base)->assign('surge_proxy', $surge_proxy)->assign('info_server', $ary['server'])->assign('info_port', $this->user->port)->assign('info_method', $ary['method'])->assign('info_pass', $this->user->passwd)->display('user/nodeinfo.tpl');*/
    }

    public function profile($request, $response, $args)
    {
        return $this->view('user/profile');
    }

    public function edit($request, $response, $args)
    {
        return $this->view('user/edit');
    }

    public function invite($request, $response, $args)
    {
        $codes = user()->inviteCodes();
        return $this->view('user/invite', [
            "codes" => $codes,
        ]);
    }

    public function doInvite($request, $response, $args)
    {
        $n = $this->user->invite_num;
        if ($n < 1) {
            $res['ret'] = 0;

            return $response->getBody()->write(json_encode($res));
        }
        for ($i = 0; $i < $n; ++$i) {
            $char = Tools::genRandomChar(32);
            $code = new InviteCode();
            $code->code = $char;
            $code->user_id = $this->user->id;
            $code->save();
        }
        $this->user->invite_num = 0;
        $this->user->save();
        $res['ret'] = 1;

        return $this->echoJson($response, $res);
    }

    public function sys(Request $request, $response, $args)
    {
        return $this->view('user/sys');
    }

    public function updatePassword(Request $request, $response, $args)
    {
        $oldpwd = $request->getParam('oldpwd');
        $pwd = $request->getParam('pwd');
        $repwd = $request->getParam('repwd');
        $user = $this->user;
        if (!Hash::checkPassword($user->pass, $oldpwd)) {
            $res['ret'] = 0;
            $res['msg'] = '旧密码错误';

            return $response->getBody()->write(json_encode($res));
        }
        if ($pwd != $repwd) {
            $res['ret'] = 0;
            $res['msg'] = '两次输入不符合';

            return $response->getBody()->write(json_encode($res));
        }

        if (strlen($pwd) < 8) {
            $res['ret'] = 0;
            $res['msg'] = '密码太短啦';

            return $response->getBody()->write(json_encode($res));
        }
        $hashPwd = Hash::passwordHash($pwd);
        $user->pass = $hashPwd;
        $user->save();

        $res['ret'] = 1;
        $res['msg'] = 'ok';

        return $this->echoJson($response, $res);
    }

    public function updateSsPwd(Request $request, $response, $args)
    {
        $user = Auth::getUser();
        $pwd = $request->getParam('sspwd');
        $user->updateSsPwd($pwd);
        $res['ret'] = 1;

        return $this->echoJson($response, $res);
    }

    public function updateMethod(Request $request, $response, $args)
    {
        $user = Auth::getUser();
        $method = $request->getParam('method');
        $method = strtolower($method);
        $user->updateMethod($method);
        $res['ret'] = 1;

        return $this->echoJson($response, $res);
    }

    public function updateProtocol($request, $response, $args)
    {
        $user = Auth::getUser();
        $protocol = $request->getParam('protocol');
        $protocol = strtolower($protocol);
        $user->updateProtocol($protocol);
        $res['ret'] = 1;

        return $this->echoJson($response, $res);
    }

    public function updateObfs($request, $response, $args)
    {
        $user = Auth::getUser();
        $obfs = $request->getParam('obfs');
        $obfs = strtolower($obfs);
        $user->updateObfs($obfs);
        $res['ret'] = 1;

        return $this->echoJson($response, $res);
    }



    public function doCheckIn(Request $request, $response, $args)
    {
        if (!$this->user->isAbleToCheckin()) {
            $res['msg'] = '您似乎已经签到过了...';
            $res['ret'] = 1;

            return $response->getBody()->write(json_encode($res));
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

    public function kill(Request $request, $response, $args)
    {
        return $this->view('user/kill');
    }

    public function handleKill(Request $request, $response, $args)
    {
        $user = user();
        $passwd = $request->getParam('passwd');
        // check passwd
        $res = [];
        if (!Hash::checkPassword($user->pass, $passwd)) {
            $res['ret'] = 0;
            $res['msg'] = ' 密码错误';

            return $this->echoJson($response, $res);
        }
        Auth::logout();
        $user->delete();
        $res['ret'] = 1;
        $res['msg'] = 'GG! 您的帐号已经从我们的系统中删除.';

        return $this->echoJson($response, $res);
    }

    public function trafficLog(Request $request, $response, $args)
    {
        $pageNum = 1;
        if (isset($request->getQueryParams()['page'])) {
            $pageNum = $request->getQueryParams()['page'];
        }
        $traffic = TrafficLog::where('user_id', $this->user->id)->orderBy('id', 'desc')->paginate(15, ['*'], 'page', $pageNum);
        $traffic->setPath('/user/trafficlog');
        return $this->view('user/trafficlog', [
            "logs" => $traffic
        ]);
    }
}
