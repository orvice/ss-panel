<?php

use App\Utils\Check;

class CheckTest extends TestCase
{
    public function testEmail()
    {
        $this->assertEquals(false, Check::isEmailLegal("illegalEmail"));
        $this->assertEquals(true, Check::isEmailLegal("sspanel@gmail.com"));
    }

    public function testGetRegIpLimit()
    {
        $count = Check::getIpRegCount('255.255.255.255');
        $this->assertEquals(0, $count);
    }
}