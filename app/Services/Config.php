<?php

namespace App\Services;


class Config
{
    public static function get($key){
       // global $config;
       // return $config[$key];
       return $_ENV[$key];
    }
}