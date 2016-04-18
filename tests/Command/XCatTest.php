<?php

use App\Command\XCat;

class XCatTest extends TestCase
{
    public function testXcat()
    {
        $cat = new XCat([]);
        $cat->resetTraffic();
    }

}