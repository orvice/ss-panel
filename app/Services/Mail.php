<?php

namespace App\Services;

use App\Services\Config;
use App\Services\Mail\Mailgun;
use App\Services\Mail\Smtp;

class Mail
{

    public static function send($to,$subject,$text){
        $driver = Config::get("maildriver");
        switch ($driver){
            case "mailgun":
                $mail = new Mailgun();
                $mail->send($to,$subject,$text);
                break;
            case "smtp":
                $mail = new Smtp();
                $mail->send($to,$subject,$text);
                break;
            default:
                // @TODO default action
        }
    }
}