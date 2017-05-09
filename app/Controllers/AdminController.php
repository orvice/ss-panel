<?php

namespace App\Controllers;

use App\Models\CheckInLog;
use App\Models\InviteCode;
use App\Models\TrafficLog;
use App\Models\NodeInfoLog;
use App\Models\NodeOnlineLog;
use App\Models\User;
use App\Models\Node;
use App\Services\Analytics;
use App\Services\DbConfig;
use App\Utils\Tools;

/**
 *  Admin Controller
 */
class AdminController extends UserController
{

    public function index($request, $response, $args)
    {
        $sts = new Analytics();
        return $this->view()->assign('sts', $sts)->display('admin/index.tpl');
    }

    public function invite($request, $response, $args)
    {
        $codes = InviteCode::where('user_id', '=', '0')->get();
        return $this->view()->assign('codes', $codes)->display('admin/invite.tpl');
    }

    public function addInvite($request, $response, $args)
    {
        $n = $request->getParam('num');
        $prefix = $request->getParam('prefix');
        $uid = $request->getParam('uid');
        if ($n < 1) {
            $res['ret'] = 0;
            return $response->getBody()->write(json_encode($res));
        }
        for ($i = 0; $i < $n; $i++) {
            $char = Tools::genRandomChar(32);
            $code = new InviteCode();
            $code->code = $prefix . $char;
            $code->user_id = $uid;
            $code->save();
        }
        $res['ret'] = 1;
        $res['msg'] = "邀请码添加成功";
        return $response->getBody()->write(json_encode($res));
    }

    public function checkInLog($request, $response, $args)
    {
        $pageNum = 1;
        if (isset($request->getQueryParams()["page"])) {
            $pageNum = $request->getQueryParams()["page"];
        }
        $traffic = CheckInLog::orderBy('id', 'desc')->paginate(15, ['*'], 'page', $pageNum);
        $traffic->setPath('/admin/checkinlog');
        return $this->view()->assign('logs', $traffic)->display('admin/checkinlog.tpl');
    }


    private function getTrafficLog($node, $user, $pageNum){
        $logs = TrafficLog::orderBy('id', 'desc');
        if ($user > 0) {
            $logs->where('user_id', $user);
        }
        if ($node > 0) {
            $logs->where('node_id', $node);
        }
        $logs = $logs->paginate(15, ['*'], 'page', $pageNum);
        if ($node == -1) {
            $logs->setPath('/admin/trafficlog');
        } elseif ($user == -1){
            $logs->setPath("/admin/trafficlog/$node");
        } else {
            $logs->setPath("/admin/trafficlog/$node/$user");
        }

        return $this->view()->assign('logs', $logs)
            ->assign('seleUser', $user)
            ->assign('seleNode', $node)
            ->assign('users', User::all())
            ->assign('nodes', Node::all())
            ->display('admin/trafficlog.tpl');
    }

    public function trafficLog($request, $response, $args)
    {
        $pageNum = 1;
        if (isset($request->getQueryParams()["page"])) {
            $pageNum = $request->getQueryParams()["page"];
        }
        $this->getTrafficLog(-1, -1, $pageNum);
    }

    public function trafficLogNode($request, $response, $args)
    {
        $pageNum = 1;
        if (isset($request->getQueryParams()["page"])) {
            $pageNum = $request->getQueryParams()["page"];
        }
        $this->getTrafficLog($args['nid'], -1, $pageNum);
    }

    public function trafficLogFull($request, $response, $args)
    {
        $pageNum = 1;
        if (isset($request->getQueryParams()["page"])) {
            $pageNum = $request->getQueryParams()["page"];
        }
        $this->getTrafficLog($args['nid'], $args['uid'], $pageNum);
    }

    public function config($request, $response, $args)
    {
        $conf = [
            "app-name" => DbConfig::get('app-name'),
            "home-code" => DbConfig::get('home-code'),
            "analytics-code" => DbConfig::get('analytics-code'),
            "user-index" => DbConfig::get('user-index'),
            "user-node" => DbConfig::get('user-node'),
        ];
        return $this->view()->assign('conf', $conf)->display('admin/config.tpl');
    }

    public function updateConfig($request, $response, $args)
    {
        $config = [
            "analytics-code" => $request->getParam('analyticsCode'),
            "home-code" => $request->getParam('homeCode'),
            "app-name" => $request->getParam('appName'),
            "user-index" => $request->getParam('userIndex'),
            "user-node" => $request->getParam('userNode'),
        ];
        foreach ($config as $key => $value) {
            DbConfig::set($key, $value);
        }
        $res['ret'] = 1;
        $res['msg'] = "更新成功";
        return $response->getBody()->write(json_encode($res));
    }
    public function cleanNodelog($request, $response, $args)
    {
        if($clean = NodeInfoLog::TRUNCATE()){
            $res['ret'] = 1;
            return $response->getBody()->write(json_encode($res));
        }
        $res['ret'] = 0;
        return $response->getBody()->write(json_encode($res));
    }
    public function cleanOnlinelog($request, $response, $args)
    {
        if($clean = NodeOnlineLog::TRUNCATE()){
            $res['ret'] = 1;
            return $response->getBody()->write(json_encode($res));
        }
        $res['ret'] = 0;
        return $response->getBody()->write(json_encode($res));
    }
    public function cleantrafficlog($request, $response, $args)
    {
        if($clean = TrafficLog::TRUNCATE()){
            $res['ret'] = 1;
            return $response->getBody()->write(json_encode($res));
        }
        $res['ret'] = 0;
        return $response->getBody()->write(json_encode($res));
    }

}
