<?php

namespace App\Models;

/**
 * User Model
 */

use App\Utils\Tools;
use App\Utils\Hash;
use App\Models\InviteCode;

class User extends Model

{
    public $table = "user";

    public $isLogin;

    public $isAdmin;

    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "https://secure.gravatar.com/avatar/$hash";
    }

    public function isAdmin(){
        // @TODO
    }

    public function lastSsTime(){
        return Tools::toDateTime($this->attributes['t']);
    }

    public function lastCheckInTime(){
        return Tools::toDateTime($this->attributes['last_check_in_time']);
    }

    public function updatePassword($pwd){
        $this->pass = Hash::passwordHash($pwd);
        $this->save();
    }

    public function updateSsPwd($pwd){
        $this->passwd = $pwd;
        $this->save();
    }

    public function addInviteCode(){
        $uid = $this->attributes['id'];
        $code = new InviteCode();
        $code->code = Tools::genRandomChar(32);
        $code->user = $uid;
        $code->save();
    }

    public function addManyInviteCode($num){
        for($i = 0; $i < $num; $i++){
            $this->addInviteCode();
        }
    }

}
