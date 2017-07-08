<?php


namespace App\Controllers\Api\Admin;


use App\Controllers\BaseController;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Services\Analytic;

class InfoController extends BaseController
{
    public function index(Request $req, Response $res, $args)
    {
        $a = new Analytic();
        return $this->echoJsonWithData($res, [
            'usersTotal' => $a->getTotalUser(),
            'nodesTotal' => $a->getTotalNode(),
            'trafficTotal' => $a->getTrafficTotal(),
        ]);
    }
}