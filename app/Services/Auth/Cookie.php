<?php

namespace App\Services\Auth;

use App\Utils\Cookie;

class Cookie
{
    public function authUser($uid){

    }

    public function getUser($req){
        $data = $req->getCookieParams();
    }
}