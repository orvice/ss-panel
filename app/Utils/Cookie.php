<?php

namespace App\Utils;


class Cookie
{
    public static function set($key,$value,$time){
        setcookie($key,$value,$time,'/');
    }

    public static function get($key){
        return $_COOKIE[$key];
    }
}