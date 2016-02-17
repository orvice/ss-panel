<?php

namespace App\Controllers\Mu;

use App\Models\User;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    // User List
    public function index($request, $response, $args){
        $user = User::all();
        $res = [
            "ret" => 1,
            "msg" => "ok",
            "data" => $user
        ];
        return $this->echoJson($response,$res);
    }

    //   Update Traffic
    public function addTraffic($request, $response, $args){

    }
}