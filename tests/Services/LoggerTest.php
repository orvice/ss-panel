<?php

namespace Tests\Services;

use App\Services\Logger;
use Tests\TestCase;

class LoggerTest extends TestCase
{
    public function testFileLogger()
    {
        $this->assertEquals(true, Logger::debug("debug"));
        $this->assertEquals(true, Logger::error("error"));
        $this->assertEquals(true, Logger::warning("error"));
        $this->assertEquals(true, Logger::info("error"));
    }

    public function testDbLogger()
    {
        $this->assertEquals(true, Logger::newDbLog('error', "msg"));
    }
}