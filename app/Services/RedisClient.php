<?php


namespace App\Services;

use Predis\Client;


class RedisClient
{
    public $client;

    public function __construct(){
        $config = Config::get('redis');
        $this->client = new Client($config);

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

    public function setex($key,$value,$time){
        $this->client->setex($key,$time,$value);
    }

    public function del($key){

    }
}