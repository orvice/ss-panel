<?php

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
        Config::set('cacheDriver', $cache);
        $client = Factory::newCache();
        $key = 'key';
        $value = 'value';
        $ttl = 3600;
        $client->set($key, $value, $ttl);
        $this->assertEquals($value, $client->get($key));

        $client->del($key);
        $this->assertEquals(null, $this->get($key));
    }
}