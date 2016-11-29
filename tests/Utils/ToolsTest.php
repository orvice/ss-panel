<?php

namespace Tests\Utils;

use App\Utils\Tools;
use Tests\TestCase;

class ToolsTest extends TestCase
{
    public function testFlow()
    {
        $traffic = 100;
        $this->assertEquals(100, Tools::flowAutoShow($traffic));
    }

    public function testGetRandomChar()
    {
        $char = Tools::genRandomChar(8);
        $this->assertEquals(8, strlen($char));
    }

    public function testGenSID()
    {
        Tools::genSID();
    }

    public function testGenUUID()
    {
        Tools::genUUID();
    }

    public function testGenToken()
    {
        Tools::genToken();
    }

    public function testCheckHtml()
    {
        $legalText = 'xoxo';
        $this->assertEquals($legalText, Tools::checkHtml($legalText));
    }
}
