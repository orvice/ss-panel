<?php


namespace App\Controllers\Api\Admin;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\TrafficLog;
use App\Controllers\BaseController;

class TrafficLogController extends BaseController
{
    public function index(Request $req, Response $res, $args)
    {
        $pageNum = 1;
        if (isset($req->getQueryParams()['page'])) {
            $pageNum = $req->getQueryParams()['page'];
        }
        $traffic = TrafficLog::where('user_traffic_log.id', '>','0')
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