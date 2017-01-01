<?php

namespace App\Utils;

use App\Services\Config;
use App\Services\Factory;

class Hash
{
    /**
     * @param $str
     *
     * @return string
     */
    public static function passwordHash($str)
    {
        $method = config('auth.password_encryption_type');
        switch ($method) {
            case 'md5':
                return self::md5WithSalt($str);
            case 'sha256':
                return self::sha256WithSalt($str);
            default:
        }

        return $str;
    }

    public static function cookieHash($str)
    {
        return substr(hash('sha256', $str . config('auth.salt')), 5, 45);
    }

    /**
     * @param $pwd
     *
     * @return string
     */
    public static function md5WithSalt($pwd)
    {
        $salt = config('auth.salt');

        return md5($pwd . $salt);
    }

    /**
     * @param $pwd
     *
     * @return string
     */
    public static function sha256WithSalt($pwd)
    {
        $salt = config('auth.salt');
        return hash('sha256', $pwd . $salt);
    }

    /**
     * @param $hashedPassword
     * @param $password
     * @return bool
     */
    public static function checkPassword($hashedPassword, $password)
    {
        $method = config('auth.password_encryption_type');
        if($method == 'bcrypt'){
            // @todo
        }
        $truePassword = self::passwordHash($password);
        if ($hashedPassword == $truePassword) {
            return true;
        }
        Factory::getLogger()->error("true: ". $truePassword .  "  input: ".$hashedPassword);
        return false;
    }
}
