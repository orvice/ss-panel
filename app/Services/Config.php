<?php

namespace App\Services;


class Config
{
    public static function get($key){
       // global $config;
       // return $config[$key];
       return $_ENV[$key];
    }

    public static function getPublicConfig(){
        return [
            "appName" => self::get("appName"),
            "version" => self::get("version"),
            "baseUrl" => self::get("baseUrl")
         ];
    }
}