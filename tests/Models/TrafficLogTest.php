<?php

namespace Tests\Models;

use App\Models\TrafficLog;
use App\Utils\Tools;
use Tests\TestCase;

class TrafficLogTest extends TestCase
{
    public function testNewTrafficLog()
    {
        // log
        $u = 1024;
        $d = 1024;
        $rate = 1;
        $id = 1;
        $nodeId = 1;
        $totalTraffic = Tools::flowAutoShow(($u + $d) * $rate);
        $traffic = new TrafficLog();
        $traffic->user_id = $id;
        $traffic->u = $u;
        $traffic->d = $d;
        $traffic->node_id = $nodeId;
        $traffic->rate = $rate;
        $traffic->traffic = $totalTraffic;
        $traffic->log_time = time();
        $this->assertEquals(true, $traffic->save());
    }

    public function testTrafficLogMethod()
    {
        $log = TrafficLog::first();
        $log->node();
        $log->totalUsed();
        $log->logTime();
    }
}