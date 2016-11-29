<?php

namespace Tests\Command;

use App\Command\DailyMail;
use App\Services\Config;
use Tests\TestCase;

class SendDailyMailTest extends TestCase
{
    public function testSendDailyMail()
    {
        Config::set('mailDriver', 'file');
        DailyMail::sendDailyMail();
    }
}
