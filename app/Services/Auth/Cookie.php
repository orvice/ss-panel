<?php

class Cookie
{
    public function authUser($uid){

    }

    public function getUser($req){
        $data = $req->getCookieParams();
    }
}