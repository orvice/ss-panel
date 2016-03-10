<?php

namespace App\Services;

use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;

class Boot
{
    public static function loadEnv()
    {
        // Env
        $env = new Dotenv(BASE_PATH);
        $env->load();
    }

    public static function setDebug()
    {
        // debug
        if (Config::get('debug') == "true") {
            define("DEBUG", true);
        }
    }

    public static function setVersion($version)
    {
        $_ENV['version'] = $version;
        putenv("version=$version");
    }

    public static function setTimezone()
    {
        // config time zone
        date_default_timezone_set(Config::get('timeZone'));
    }

    public static function bootDb()
    {
        // Init Eloquent ORM Connection
        $capsule = new Capsule;
        $capsule->addConnection(Config::getDbConfig());
        $capsule->bootEloquent();
    }
}