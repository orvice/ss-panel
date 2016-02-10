<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Utils;
use App\Utils\Hash;


class Cookie extends Base
{
    public  function login($uid,$time){
        $user = User::find($uid);
        $key = Hash::cookieHash($user->pass);
        Utils\Cookie::set([
            "uid" => $uid,
            "email" => $user->email,
            "key" => $key
        ],$time+time());
    }

    public  function getUser(){
        $uid = Utils\Cookie::get('uid');
        $key = Utils\Cookie::get('key');
        if ($uid == null){
            $user = new User();
            $user->isLogin = false;
            return $user;
        }

        $user = User::find($uid);
        if ($user == null){
            $user = new User();
            $user->isLogin = false;
            return $user;
        }

        if (Hash::cookieHash($user->pass) != $key){
            $user->isLogin = false;
            return $user;
        }
        $user->isLogin = true;
        return $user;
    }

    public  function logout(){
        $time = time() - 1000;
        Utils\Cookie::set([
            "uid" => null,
            "email" => null,
            "key" => null
        ],$time);
    }
}