<?php


namespace App\Controllers\Api;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function show(Request $req, Response $res, $args)
    {
        $id = $args['id'];
        return $this->echoJson($req, [
            'data' => User::find($id),
        ]);
    }
}