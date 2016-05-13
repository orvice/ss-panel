<?php


namespace App\Utils;

use App\Models\User;

class Check
{
    /**
     * @param $email
     * @return bool
     */
    public static function isEmailLegal($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $ip
     * @param int $time
     * @return int
     */
    public static function getIpRegCount($ip, $time = 86400)
    {
        return User::where('reg_ip', $ip)->where('reg_date', '>', Tools::toDateTime(time() - $time))->count();
    }
}