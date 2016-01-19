<?php

namespace App\Services;

/***
 * Mail Service
 */

use App\Services\Mail\Mailgun;
use App\Services\Mail\Smtp;

class Mail
{
    /***
     * @param $to
     * @param $subject
     * @param $text
     * @return bool
     */
    public static function send($to,$subject,$text){
        $driver = Config::get("mailDriver");
        switch ($driver){
            case "mailgun":
                $mail = new Mailgun();
                return $mail->send($to,$subject,$text);
            case "smtp":
                $mail = new Smtp();
                return $mail->send($to,$subject,$text);
            default:
                // @TODO default action
        }
        return true;
    }
}