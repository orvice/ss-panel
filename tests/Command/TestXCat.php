<?php

use App\Command\XCat;

class TestXCat extends TestCase
{
    public function testXcat()
    {
        $cat = new XCat();
        $cat->defaultAction();
        $cat->resetTraffic();
    }
}