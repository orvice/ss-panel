<?php

use App\Services\Config;
use App\Utils\Tools;
use App\Utils\Hash;

class HashTest extends TestCase
{
    public function testHash()
    {
        Config::set('pwdMethod', 'md5');
        $this->hashTest();

        Config::set('pwdMethod', 'sha256');
        $this->hashTest();

        Config::set('pwdMethod', 'default');
        $this->hashTest();
    }

    public function testCookieHash(){
        $str = Tools::genRandomChar();
        Hash::cookieHash($str);
    }

    public function hashTest()
    {
        $pwd = "testPassword";
        $hashPwd = Hash::passwordHash($pwd);
        $this->assertEquals(true, Hash::checkPassword($hashPwd, $pwd));
        $this->assertEquals(false, Hash::checkPassword("", $pwd));
    }
}