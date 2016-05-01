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

    protected function getConfig()
    {
        return [
            'scheme' => Config::get('redis_scheme'),
            'host' => Config::get('redis_host'),
            'port' => Config::get('redis_port'),
            'database' => Config::get('redis_database'),
            'password' => Config::get('redis_pass'),
        ];
    }

    public function getClient()
    {
        return $this->client;
    }

    public function get($key)
    {
        return $this->client->get($key);
    }

    public function set($key, $value)
    {
        $this->client->set($key, $value);

    }

    public function setex($key, $time, $value)
    {
        $this->client->setex($key, $time, $value);
    }

    public function del($key)
    {
        $this->client->del($key);
    }
}