<?php


namespace App\Services\Cache;

use App\Services\RedisClient;

class Redis extends Cache
{

    protected $client;

    public function __construct()
    {
        $redis = new RedisClient();
        $this->client = $redis;
    }


    public function set($key, $value, $ttl)
    {
        return $this->client->setex($key, $ttl, $value);
    }

    public function get($key)
    {
        return $this->client->get($key);
    }

    public function del($key)
    {
        return $this->client->del($key);
    }
}