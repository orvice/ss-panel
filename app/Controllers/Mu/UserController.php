<?php

namespace App\Controllers\Mu;

use App\Controllers\BaseController;
use App\Models\Node, App\Models\TrafficLog, App\Models\User;
use App\Storage\Dynamodb\TrafficLog as DynamoTrafficLog;
use App\Services\Config;
use App\Utils\Tools;

class UserController extends BaseController
{
    // User List
    public function index($request, $response, $args)
    {
        $user = User::all();
        $res = [
            "ret" => 1,
            "msg" => "ok",
            "data" => $user
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

        $msg = "ok";
        if (Config::get('log_traffic_dynamodb')) {
            try{
                $client = new DynamoTrafficLog();
                $client->store($u, $d, $nodeId, $id, $totalTraffic, $rate);
            }catch(\Exception $e){
                $msg = $e->getMessage();
            }
        }

        $res = [
            "ret" => 1,
            "msg" => $msg,
        ];
        return $this->echoJson($response, $res);
    }
}