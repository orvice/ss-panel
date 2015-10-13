<?php


namespace App\Services;

use Predis\Client;
use App\Services\Config;


class RedisClient
{
    public $client;

    public function __construct(){
        $config = Config::get('redis');
        $this->client = new Client([
            'scheme' => 'tcp',
            'host'   => $config['host'],
            'port'   => $config['port'],
        ]);

    }

    public function getClient(){
        return $this->client;
    }

    public function get($key){
        return $this->client->get($key);
    }

    public function set($key,$value){
        $this->client->set($key,$value);

    }
}