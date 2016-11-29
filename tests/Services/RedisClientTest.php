<?php

namespace Tests\Services;

use App\Services\RedisClient as Client;
use Tests\TestCase;

class RedisClientTest extends TestCase
{
    public function testRedisClient()
    {
        $redisClient = new Client();
        $client = $redisClient->getClient();
        $key = 'foo';
        $value = 'bar';

        $redisClient->set($key, $value);
        $this->assertEquals($value, $redisClient->get($key));
    }
}
