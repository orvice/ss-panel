<?php


namespace App\Command;

use App\Models\User;
use App\Services\Config;
use App\Services\Mail;

class DailyMail
{

    public static function sendDailyMail()
    {
        $users = User::all();
        foreach($users as $user){
            echo "Send daily mail to user: ".$user->id;
            $subject = Config::get('appName')."-每日流量报告";
            $to = $user->email;
            $text = "总流量:". $user->enableTraffic()."  已用流量: ". $user->usedTraffic()." 剩余流量:". $user->unusedTraffic() ;
            try{
                Mail::send($to,$subject,$text);
            }catch(\Exception $e){
                echo $e->getMessage();
            }
        }
    }
}