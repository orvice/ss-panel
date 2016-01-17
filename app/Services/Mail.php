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
        try{
            $driver->send($to,$subject,$text);
        }catch (Exception $e){
            return false;
        }
        return true;
    }
}