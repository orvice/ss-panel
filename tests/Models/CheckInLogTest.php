<?php

namespace Tests\Models;

use App\Models\CheckInLog;
use App\Utils\Tools;
use Tests\TestCase;

class CheckInLogTest extends TestCase
{
    public function testCheckInLog()
    {
        $log = new CheckInLog();
        $log->user_id = 1;
        $log->checkin_at = time();
        $log->traffic = 1024;
        $log->save();

        $this->assertEquals(Tools::toDateTime($log->checkin_at), $log->CheckInTime());
        $this->assertEquals(Tools::flowAutoShow($log->traffic), $log->traffic());
    }
}
