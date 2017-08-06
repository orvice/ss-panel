<?php

namespace App\Controllers;

use App\Models\CheckInLog;
use App\Models\InviteCode;
use App\Models\TrafficLog;
use App\Models\User;
use App\Models\Node;
use App\Models\NodeInfoLog;
use App\Models\NodeOnlineLog;
use App\Services\Analytics;
use App\Services\DbConfig;
use App\Utils\Tools;
use App\Services\Mail;
use App\Services\Auth;
use App\Services\Factory;

/**
 *  Ping Controller
 */
class PingController extends BaseController
{
    private $user;

    public function __construct()
    {
        $this->user = Auth::getUser();
    }

    public function index($request, $response, $args)
    {
        $nodes = Node::where('type', 1)->orderBy('sort')->get();
        return $this->view()->assign('nodes', $nodes)->display('ping/index.tpl');
    }

    public function getToken($request, $response, $args)
    {
        $tokenStr = Tools::genToken();
        $storage = Factory::createTokenStorage();
        $expireTime = time() + 3600*24*7;
        if($storage->store($tokenStr, $this->user,$expireTime)){
            $res['ret'] = 1;
            $res['msg'] = "ok";
            $res['data']['token'] = $tokenStr;
            $res['data']['user_id'] = $this->user->id;
            return $this->echoJson($response,$res);
        }
    }

}
