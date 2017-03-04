<?php


namespace App\Services;

use Psr\SimpleCache\CacheInterface;
use Psr\Log\LoggerInterface;
use App\Contracts\TokenStorageInterface;

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
     * @return TokenStorageInterface
     */
    public static function getTokenStorage()
    {
        return app()->make(TokenStorageInterface::class);
    }


}