<?php

namespace App\Services\Auth;

use App\Services\RedisClient;

class Redis
{
    public static function getClient(){
        $client = new RedisClient();
        return $client->getClient();
    }

    public static function login($uid,$time){

    }
}