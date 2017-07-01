<?php

namespace App\Services\Factories;

use Predis\Client;

class Redis
{
    /**
     * @return Client
     */
    public static function newDefaultRedisClient()
    {
        return new Client();
    }

    /**
     * @param $name
     *
     * @return array
     */
    protected static function getConfig($name)
    {
        return config("database.redis.$name");
    }

    /**
     * @param $name
     *
     * @return Client
     */
    public static function newRedis($name)
    {
        $config = self::getConfig($name);
        $client = new Client($config);
        $client->select($config['database']);

        return $client;
    }

    /**
     * @return Client
     */
    public static function getCacheRedis()
    {
        return self::newRedis('cache');
    }

    public static function getConfigRedis()
    {
        return self::newRedis('cache');
    }
}
