<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Services\RedisClient;
use App\Utils\Tools;
use App\Utils\Cookie;

class Redis
{
    private $client;

    public function __construct(){
        $client = new RedisClient();
        $this->client = $client;
    }

    public  function getClient(){
        $client = new RedisClient();
        return $client;
    }

    public  function login($uid,$time){
        $sid = Tools::genSID();
        Cookie::set([
            'sid' => $sid
        ],$time);
        $value = $uid;
        $this->client->set($sid,$value);
    }

    public  function logout(){

    }

    public  function getUser(){
        $sid = Cookie::get('sid');
        $value = $this->client->get($sid);
        if($value == null ){
            $user = new User();
            $user->isLogin = false;
            return $user;
        }
        $uid = $value;
        $user =  User::find($uid);
        if($user == null ){
            $user->isLogin = false;
            return $user;
        }
        $user->isLogin = true;
        return $user;
    }
}