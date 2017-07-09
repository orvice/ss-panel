<?php

namespace App\Controllers\MuV2;

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
    /**
     * @SWG\Get(
     *     path="/mu/users",
     *     summary="Get Users",
     *     tags={"Mu"},
     *     description="Get users list",
     *     produces={ "application/json"},
     *     @SWG\Response(
     *         response=200,
     *         description="successful operation",
     *         @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definitions/MuUser")
     *         ),
     *     ),
     *     @SWG\Response(
     *         response="400",
     *         description="Invalid tag value",
     *     ),
     * )
     */
    public function index($request, $response, $args)
    {
        $users = User::all();
        $res = [
            'data' => $users,
        ];

        return $this->echoJson($response, $res);
    }

    //   Update Traffic
    public function addTraffic($request, $response, $args)
    {
        // $data = json_decode($request->getParsedBody(),true);
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
                'msg' => 'update failed',
            ];

            return $this->echoJson($response, $res, 400);
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
            'ret' => 1,
            'msg' => 'ok',
        ];

        // @todo
        $saveToDynamo  = false;
        if ($saveToDynamo) {
            try {
                $client = new DynamoTrafficLog();
                $id = $client->store($u, $d, $nodeId, $id, $totalTraffic, $rate);
                $res['id'] = $id;
            } catch (\Exception $e) {
            }
        }

        return $this->echoJson($response, $res);
    }
}
