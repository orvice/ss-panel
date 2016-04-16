<?php

use App\Command\DailyMail;
use App\Services\Config;

class SendDailyMailTest extends TestCase
{
    public function testSendDailyMail()
    {
        Config::set('mailDriver', 'file');
        DailyMail::sendDailyMail();
    }
}