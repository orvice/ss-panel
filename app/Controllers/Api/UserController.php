<?php


namespace App\Controllers\Api;

use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\BaseController;
use App\Models\Node;
use App\Models\TrafficLog;

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
        ]);
    }

    public function nodes(Request $req, Response $res, $args)
    {
        $nodes = Node::where('type', 1)->orderBy('sort')->get();
        return $this->echoJsonWithData($res, $nodes);
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
        $traffic->setPath('/api/users/'.$args['id'].'/trafficLogs');
        //return $this->echoJsonWithData($res,$traffic);
        return $this->echoJson($res,$traffic);
    }


    public function update(Request $req, Response $res, $args)
    {

    }
}