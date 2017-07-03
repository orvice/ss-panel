<?php


namespace App\Controllers\Api\Admin;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Node;
use App\Models\TrafficLog;
use App\Controllers\BaseController;

class NodeController extends BaseController
{

    public function index(Request $req, Response $res, $args)
    {
        $pageNum = 1;
        if (isset($req->getQueryParams()['page'])) {
            $pageNum = $req->getQueryParams()['page'];
        }
        $traffic = Node::paginate(15, [
            '*',
        ], 'page', $pageNum);
        $traffic->setPath('/api/admin/nodes');
        //return $this->echoJsonWithData($res,$traffic);
        return $this->echoJson($res, $traffic);
    }

    private function saveModel(Response $response, Node $node, $arr)
    {
        foreach ($arr as $k => $v) {
            $node->$k = $v;
        }
        $node->save();
        return $this->echoJsonWithData($response, $node);
    }

    public function store(Request $req, Response $res, $args)
    {
        $input = file_get_contents("php://input");
        $arr = json_decode($input, true);
        return $this->saveModel($res, new Node(), $arr);
    }

    public function update(Request $req, Response $res, $args)
    {
        $input = file_get_contents("php://input");
        $arr = json_decode($input, true);
        return $this->saveModel($res, Node::find($args['id']), $arr);
    }

    public function trafficLogs(Request $req, Response $res, $args)
    {
        $pageNum = 1;
        if (isset($req->getQueryParams()['page'])) {
            $pageNum = $req->getQueryParams()['page'];
        }
        $traffic = TrafficLog::where('user_traffic_log.node_id', $args['id'])
            ->join('ss_node', 'user_traffic_log.node_id', '=', 'ss_node.id')
            ->orderBy('user_traffic_log.id', 'desc')
            ->paginate(15, [
                'user_traffic_log.*',
                'ss_node.name as name'
            ], 'page', $pageNum);
        $traffic->setPath('/api/admin/trafficLogs');
        //return $this->echoJsonWithData($res,$traffic);
        return $this->echoJson($res, $traffic);
    }
}