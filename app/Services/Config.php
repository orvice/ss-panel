<?php

namespace App\Services;

use Pongtan\Services\Config as PongtanConfig;


class Config extends PongtanConfig
{
    public static function getPublicConfig()
    {
        return [
            "appName" => self::getAppName(),
            "version" => self::get("version"),
            "baseUrl" => self::get("baseUrl"),
            "checkinTime" => self::get("checkinTime"),
            "checkinMin" => self::get("checkinMin"),
            "checkinMax" => self::get("checkinMax"),
        ];
    }

    public static function getAppName()
    {
        $appName = DbConfig::get('app-name');
        if ($appName == null || $appName == "") {
            return self::get("appName");
        }
        return $appName;
    }

    public static function getDbConfig()
    {
        return [
            'driver' => self::get('db_driver'),
            'host' => self::get('db_host'),
            'port' => self::get('db_port'),
            'database' => self::get('db_database'),
            'username' => self::get('db_username'),
            'password' => self::get('db_password'),
            'charset' => self::get('db_charset'),
            'collation' => self::get('db_collation'),
            'prefix' => self::get('db_prefix')
        ];
    }
	
    public static function getRssConfig()
    {
        return [
            'enable_rss' => self::get('enable_rss')
        ];
    }

    public static function getStoragePath($dir)
    {
        return BASE_PATH . '/storage/' . $dir;
    }

}