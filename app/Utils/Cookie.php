<?php

namespace App\Utils;


class Cookie
{
    public static function set($arg,$time){
        foreach($arg as $key => $value){
            setcookie($key,$value,$time,'/');
        }
    }

    public static function get($key){
        return $_COOKIE[$key];
    }
}