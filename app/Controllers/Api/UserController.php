<?php


namespace App\Controllers\Api;

use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\BaseController;

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
        return $this->echoJson($req, [
            'data' => $user,
        ]);
    }

    public function nodes(Response $req, Response $res, $args)
    {

    }

    public function update(Response $req, Response $res, $args)
    {

    }
}