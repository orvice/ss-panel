<?php


namespace App\Services\Cache;

use App\Services\Config;

class Factory
{
    /**
     * @return Cache
     */
    public static function newCache()
    {
        switch (Config::get('cacheDriver')) {
            case 'redis':
                return self::newRedisCache();
            case 'file':
                return self::newFileCache();
            default:
                return self::newFileCache();
        }
    }

    /**
     * @return Redis
     */
    public static function newRedisCache()
    {
        return new Redis();
    }

    /**
     * @return File
     */
    public static function newFileCache()
    {
        return new File();
    }
}