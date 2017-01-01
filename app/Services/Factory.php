<?php


namespace App\Services;

use App\Services\Auth\AuthInterface;
use Psr\SimpleCache\CacheInterface;
use Psr\Log\LoggerInterface;

class Factory
{
    /**
     * @return CacheInterface
     */
    public static function getCache()
    {
        return app()->make('cache');
    }

    /**
     * @return LoggerInterface
     */
    public static function getLogger()
    {
        return app()->make('log');
    }

    /**
     * @return AuthInterface
     */
    public static function getAuth(){
        return app()->make('auth');
    }
}