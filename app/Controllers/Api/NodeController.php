<?php


namespace App\Controllers\Api;


use App\Controllers\BaseController;
use App\Models\Node;
use Slim\Http\Request;
use Slim\Http\Response;

class NodeController extends BaseController
{

    public function index(Request $req, Response $res, $args)
    {
        return $this->echoJson($res, [
            'data' => Node::all(),
        ]);
    }
}