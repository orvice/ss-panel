<?php

namespace Tests\Command;

use App\Command\XCat;
use Tests\TestCase;

class XCatTest extends TestCase
{
    public function testXcat()
    {
        $cat = new XCat([]);
        $cat->resetTraffic();
    }
}
