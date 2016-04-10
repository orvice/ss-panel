<?php

use App\Utils\Hash;

class HashTest extends TestCase
{
    public function testHash()
    {
        $pwd = "testPassword";
        $hashPwd = Hash::passwordHash($pwd);
        $this->assertEquals(true, Hash::checkPassword($hashPwd, $pwd));
        $this->assertEquals(false, Hash::checkPassword("", $pwd));
    }
}