<?php

namespace App\Controllers\Mu;

use App\Controllers\BaseController;
use App\Models\Node;
use App\Models\TrafficLog;
use App\Models\User;
use App\Services\Config;
use App\Services\Logger;
use App\Storage\Dynamodb\TrafficLog as DynamoTrafficLog;
use App\Utils\Tools;

class UserController extends BaseController
{
    // User List
    public function index($request, $response, $args)
    {
        $users = User::all();
        $res = [
            "ret" => 1,
            "msg" => "ok",
            "data" => $users
        ];
        return $this->echoJson($response, $res);
    }

    //   Update Traffic
    public function addTraffic($request, $response, $args)
    {
        $id = $args['id'];
        $u = $request->getParam('u');
        $d = $request->getParam('d');
        $nodeId = $request->getParam('node_id');
        $node = Node::find($nodeId);
        $rate = $node->traffic_rate;
        $user = User::find($id);

        $user->t = time();
        $user->u = $user->u + ($u * $rate);
        $user->d = $user->d + ($d * $rate);
        if (!$user->save()) {
            $res = [
                "ret" => 0,
                "msg" => "update failed",
            ];
            return $this->echoJson($response, $res);
        }
        // log
        $totalTraffic = Tools::flowAutoShow(($u + $d) * $rate);
        $traffic = new TrafficLog();
        $traffic->user_id = $id;
        $traffic->u = $u;
        $traffic->d = $d;
        $traffic->node_id = $nodeId;
        $traffic->rate = $rate;
        $traffic->traffic = $totalTraffic;
        $traffic->log_time = time();
        $traffic->save();

        $res = [
            "ret" => 1,
            "msg" => "ok",
        ];
        if (Config::get('log_traffic_dynamodb')) {
            try {
                $client = new DynamoTrafficLog();
                $id = $client->store($u, $d, $nodeId, $id, $totalTraffic, $rate);
                $res["id"] = $id;
            } catch (\Exception $e) {
                $res["msg"] = $e->getMessage();
                Logger::error($e->getMessage());
            }
        }
        return $this->echoJson($response, $res);
    }
}