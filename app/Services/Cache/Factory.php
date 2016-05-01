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
        switch (Config::get('cache')) {
            case 'redis':
                return self::newRedisCache();
            case 'file':
                return self::newFileCache(Config::getStoragePath('/framework/cache'));
            default:
                return self::newFileCache();
        }
    }


    /**
     * @return Cache
     */
    public static function newSessionCache()
    {
        switch (Config::get('session')) {
            case 'redis':
                return self::newRedisCache();
            case 'file':
                return self::newFileCache(Config::getStoragePath('/framework/sessions'));
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
     * @param string $dir
     * @return File
     */
    public static function newFileCache($dir = '/tmp')
    {
        return new File($dir);
    }
}