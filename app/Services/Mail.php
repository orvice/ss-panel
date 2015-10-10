<?php

namespace App\Services;

use App\Services\Config;

class Mail
{

    public static function send($to,$subject,$text){
        $driver = Config::get("maildriver");
        switch ($driver){
            case "mailgun":
                $mail = new Mailgun();
                $mail->send($to,$subject,$text);
            case "smtp":
                // @TODO smtp
            default:
                // @TODO default action
        }
    }
}