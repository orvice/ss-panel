<?php

use App\Services\Factory;
use App\Services\Config;
use App\Services\Auth\Redis;

class FactoryTest extends TestCase
{
    public function testAuth(){
        Config::set('authDriver','redis');
        $client = Factory::createAuth();
    }
}