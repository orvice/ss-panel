<?php

namespace App\Services;

/***
 * Mail Service
 */

use App\Services\Mail\Mailgun;
use App\Services\Mail\Smtp;
use App\Services\Mail\Ses;


class Mail
{
    /**
     * @return Mailgun|Ses|Smtp|null
     */
    public static function getClient()
    {
        $driver = Config::get("mailDriver");
        switch ($driver) {
            case "mailgun":
                return new Mailgun();
            case "ses":
                return new Ses();
            case "smtp":
                return new Smtp();
            default:
                // @TODO default action
        }
        return null;
    }

    /***
     * @param $to
     * @param $subject
     * @param $text
     * @return bool
     */
    public static function send($to, $subject, $text, $ishtml = false)
    {
        return self::getClient()->send($to, $subject, $text, $ishtml);
    }


}