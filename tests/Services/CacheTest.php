<?php

namespace Tests\Services;

use App\Services\Cache\Factory;
use App\Services\Config;
use Tests\TestCase;

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


        // test expired
        $ttl = 1;
        $client->set($key, $value, $ttl);
        sleep(2);
        $this->assertEquals(null, $client->get($key));

        // test wrong key
        $this->assertEquals(null, $client->get(time()));
    }
}