<?php


namespace App\Controllers\MuV2;

use App\Controllers\BaseController;
use App\Models\Node;
use App\Models\NodeInfoLog;
use App\Models\NodeOnlineLog;
use App\Models\TrafficLog;
use App\Models\User;
use App\Services\V2rayGenerator;
use App\Utils\Tools;

class NodeController extends BaseController
{

    public function users($request, $response, $args)
    {
        $users = User::all();
        $data = [];
        foreach ($users as $user) {
            $user->v2ray_user = [
                "uuid" => $user->v2ray_uuid,
                "email" => sprintf("%s@sspanel.xyz", $user->v2ray_uuid),
                "alter_id" => $user->v2ray_alter_id,
                "level" => $user->v2ray_level,
            ];
            array_push($data, $user);
        }
        $res = [
            'msg' => 'ok',
            'data' => $data,
        ];

        return $this->echoJson($response, $res);
    }

    public function onlineUserLog($request, $response, $args)
    {
        $node_id = $args['id'];
        $count = $request->getParam('count');
        $log = new NodeOnlineLog();
        $log->node_id = $node_id;
        $log->online_user = $count;
        $log->log_time = time();
        if (!$log->save()) {
            $res = [
                "ret" => 0,
                "msg" => "update failed",
            ];
            return $this->echoJson($response, $res);
        }
        $res = [
            "ret" => 1,
            "msg" => "ok",
        ];
        return $this->echoJson($response, $res);
    }

    public function info($request, $response, $args)
    {
        $node_id = $args['id'];
        $load = $request->getParam('load');
        $uptime = $request->getParam('uptime');

        $log = new NodeInfoLog();
        $log->node_id = $node_id;
        $log->load = $load;
        $log->uptime = $uptime;
        $log->log_time = time();
        if (!$log->save()) {
            $res = [
                "ret" => 0,
                "msg" => "update failed",
            ];
            return $this->echoJson($response, $res);
        }
        $res = [
            "ret" => 1,
            "msg" => "ok",
        ];
        return $this->echoJson($response, $res);
    }

    public function postTraffic($request, $response, $args)
    {
        $nodeId = $args['id'];
        $node = Node::find($nodeId);
        $rate = $node->traffic_rate;

        $input = $request->getBody();
        $datas = json_decode($input, true);
        foreach ($datas as $data) {
            $user = User::find($data['user_id']);
            $user->t = time();
            $user->u = $user->u + ($data['u'] * $rate);
            $user->d = $user->d + ($data['d'] * $rate);
            $user->save();

            // log
            $totalTraffic = Tools::flowAutoShow(($data['u'] + $data['d']) * $rate);
            $traffic = new TrafficLog();
            $traffic->user_id = $data['user_id'];
            $traffic->u = $data['u'];
            $traffic->d = $data['d'];
            $traffic->node_id = $nodeId;
            $traffic->rate = $rate;
            $traffic->traffic = $totalTraffic;
            $traffic->log_time = time();
            $traffic->save();
        }

        $res = [
            "ret" => 1,
            "msg" => "ok",
        ];
        return $this->echoJson($response, $res);
    }

    public function v2rayUsers($request, $response, $args)
    {
        $node = Node::find($args['id']);
        $users = User::all();
        $v = new V2rayGenerator();
        $v->setPort($node->v2ray_port);
        foreach ($users as $user) {
            if ($user->enable == 0) {
                continue;
            }
            $email = sprintf("%s@sspanel.io", $user->v2ray_uuid);
            $v->addUser($user->v2ray_uuid, $user->v2ray_level, $user->v2ray_alter_id, $email);
        }

        return $this->echoJson($response, $v->getArr());
    }
}