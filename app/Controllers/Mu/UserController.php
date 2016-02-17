<?php

namespace App\Controllers\Mu;

use App\Models\User;
use App\Controllers\BaseController;

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
        $user = User::find($id);

        $user->t = time();
        $user->u = $user->u + $u;
        $user->d = $user->d + $d;
        if (!$user->save()) {
            $res = [
                "ret" => 0,
                "msg" => "update failed",
            ];
            return $this->echoJson($response, $res);
        }
        $res = [
            "ret" => 1,
            "msg" => "ok",
        ];
        return $this->echoJson($response, $res);
    }
}