<?php

namespace Tests\Services;

use Tests\TestCase;
use App\Services\Cache\Factory;
use App\Services\Config;

class CacheTest extends TestCase
{
    public function testCache()
    {
        $driverArray = [
            'redis', 'file'
        ];
        foreach ($driverArray as $driver) {
            $this->TestingCache($driver);
        }
    }

    public function TestingCache($cache)
    {
        fwrite(STDERR, "test $cache cache  ");
        Config::set('cache', $cache);
        $client = Factory::newCache();
        $key = 'key';
        $value = 'value';
        $ttl = 3600;
        $client->set($key, $value, $ttl);
        $this->assertEquals($value, $client->get($key));

        $client->del($key);
        $this->assertEquals(null, $client->get($key));
        $this->assertEquals(null,$client->get(time()));
    }
}