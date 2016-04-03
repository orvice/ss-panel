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
        foreach ($users as $user) {
            echo "Send daily mail to user: " . $user->id;
            $subject = Config::get('appName') . "-每日流量报告";
            $to = $user->email;
            try {
                Mail::send($to, $subject, 'news/daily-traffic-report.tpl', [
                    "user" => $user
                ], [
                ]);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}