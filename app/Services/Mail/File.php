<?php

namespace App\Services\Mail;

use App\Services\Logger;

class File extends Base
{
    public function send($to, $subject, $text, $file)
    {
        return Logger::info("send mail to $to, subject: $subject | text : $text");
    }
}
