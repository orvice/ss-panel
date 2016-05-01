<?php

namespace Tests\Services;

use App\Services\Config;
use App\Services\DbConfig;
use Tests\TestCase;

class ConfigTest extends TestCase
{
    public function testEnvConfig()
    {
        $this->assertEquals(true, is_array(Config::getDbConfig()));
    }

    public function testDbConfig()
    {
        $key = 'key' . time();
        $value = "value";
        DbConfig::set($key, $value);
        $this->assertEquals($value, DbConfig::get($key));

        $this->assertEquals(null, DbConfig::get(time()));

        DbConfig::set($key, null);
        $this->assertEquals("", DbConfig::get($key));
    }
}