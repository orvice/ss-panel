<?php

namespace App\Models;

/**
 * User Model
 */

class User extends Model

{
    public $table = "user";

    public $isLogin;

    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "https://secure.gravatar.com/avatar/$hash";
    }
}
