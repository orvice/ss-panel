<?php


namespace App\Controllers\Api;

use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\BaseController;
use App\Models\Node;

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
        return $this->echoJsonWithData($res,$nodes);
    }

    public function update(Response $req, Response $res, $args)
    {

    }
}