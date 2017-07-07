<?php

namespace Tests\Utils;

use App\Services\Config;
use App\Utils\Hash;
use App\Utils\Tools;
use Tests\TestCase;

class HashTest extends TestCase
{
    public function testHash()
    {
        // @todo more hash
        $this->hashTest();
    }


    public function hashTest()
    {
        $pwd = 'testPassword';
        $hashPwd = Hash::passwordHash($pwd);
        $this->assertEquals(true, Hash::checkPassword($hashPwd, $pwd));
        $this->assertEquals(false, Hash::checkPassword('', $pwd));
    }
}
