<?php

use App\Utils\Check;

class CheckTest extends TestCase
{
    public function testEmail()
    {
        $this->assertEquals(false, Check::isEmailLegal("illegalEmail"));
        $this->assertEquals(true, Check::isEmailLegal("sspanel@gmail.com"));
    }
}