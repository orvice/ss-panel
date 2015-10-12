<?php

namespace App\Models;

/**
 * User Model
 */

use App\Utils\Tools;

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
}
