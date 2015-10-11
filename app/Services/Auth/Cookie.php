<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Utils;
use App\Utils\Hash;


class Cookie
{
    public function authUser($uid,$time){
        $user = User::find($uid);
        $key = Hash::cookieHash($user->pass);
        Utils\Cookie::set("uid",$uid,$time);
        Utils\Cookie::set("email",$user->email,$time);
        Utils\Cookie::set("key",$key,$time);
    }

    public function getUser($req){
        $uid = Utils\Cookie::get('uid');
        $key = Utils\Cookie::get('key');
        if ($uid == null){
            $user = new User();
            $user->isLogin = false;
            return $user;
        }

        $user = User::find($uid);
        if ($user == null){
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

    public function logout(){
        $time = tiem() - 1000;
        Utils\Cookie::set("uid","",$time);
        Utils\Cookie::set("email","",$time);
        Utils\Cookie::set("key","",$time);
    }
}