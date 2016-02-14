<?php

namespace App\Services;


class Config
{
    public static function get($key){
       return $_ENV[$key];
    }

    public static function getPublicConfig(){
        return [
            "appName" => self::get("appName"),
            "version" => self::get("version"),
            "baseUrl" => self::get("baseUrl"),
            "checkinTime" => self::get("checkinTime"),
            "checkinMin" => self::get("checkinMin"),
            "checkinMax" => self::get("checkinMax"),
         ];
    }

    public static function getDbConfig(){
        return [
            'driver'    => self::get('db_driver'),
            'host'      => self::get('db_host'),
            'database'  => self::get('db_database'),
            'username'  => self::get('db_username'),
            'password'  => self::get('db_password'),
            'charset'   => self::get('db_charset'),
            'collation' => self::get('db_collation'),
            'prefix'    => self::get('db_prefix')
        ];
    }
}