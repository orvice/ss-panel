<?php

namespace App\Services;

use Predis\Client;

class RedisClient
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client($this->getConfig());
    }

    /**
     * @return array
     */
    protected function getConfig()
    {
        $config = [
            'scheme' => Config::get('redis_scheme'),
            'host' => Config::get('redis_host'),
            'port' => Config::get('redis_port'),
            'database' => Config::get('redis_database'),
            'password' => Config::get('redis_pass'),
        ];
        if (Config::get('redis_pass') == null || Config::get('redis_pass') == '') {
            unset($config['password']);
        }

        return $config;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param $key
     *
     * @return string
     */
    public function get($key)
    {
        return $this->client->get($key);
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->client->set($key, $value);
    }

    /**
     * @param $key
     * @param $time
     * @param $value
     */
    public function setex($key, $time, $value)
    {
        $this->client->setex($key, $time, $value);
    }

    /**
     * @param $key
     */
    public function del($key)
    {
        $this->client->del($key);
    }
}
