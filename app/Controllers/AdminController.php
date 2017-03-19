<?php

namespace App\Controllers;

use App\Models\CheckInLog;
use App\Models\InviteCode;
use App\Models\TrafficLog;
use App\Models\User;
use App\Services\Analytics;
use App\Services\DbConfig;
use App\Utils\Tools;
use App\Services\Mail;

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

    public function trafficLog($request, $response, $args)
    {
        $pageNum = 1;
        if (isset($request->getQueryParams()["page"])) {
            $pageNum = $request->getQueryParams()["page"];
        }
        $logs = TrafficLog::orderBy('id', 'desc')->paginate(15, ['*'], 'page', $pageNum);
        $logs->setPath('/admin/trafficlog');
        return $this->view()->assign('logs', $logs)->display('admin/trafficlog.tpl');
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

    public function sendMail($request, $response, $args)
    {
        return $this->view()->display('admin/sendmail.tpl');
    }

    public function sendMailPost($request, $response, $args)
    {
        $who = $request->getParam('who');
        $subject = $request->getParam('subject');
        $text = $request->getParam('text');
        $res = array();
        $users = array();
        if($who == 'all') {
            $users = User::all();
        }
        else if($who == 'active') {
            $users = User::where('enable', true)->get();
        }
        foreach ($users as $user) {
            try {
                Mail::send($user->email, $subject, 'news/notice.tpl', [
                    'username' => $user->user_name,
                    'time' => Tools::toDateTime(time()),
                    'text' => $text
                ], [
                    BASE_PATH . '/LICENSE'
                ]);
                array_push($res, [
                    "email" => $user->email,
                    "ret" => 1,
                    "msg" => "ok"
                ]);
            } catch (\Exception $e) {
                array_push($res, [
                    "email" => $user->email,
                    "ret" => 0,
                    "msg" => $e->getMessage()
                ]);
            }
        }
        return $this->echoJson($response, $res);
    }

}
