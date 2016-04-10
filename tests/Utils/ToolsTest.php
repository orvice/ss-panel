<?php

use App\Utils\Tools;

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
}