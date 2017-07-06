<?php

namespace App\Utils;

use App\Services\Config;
use App\Services\Factory;

class Hash
{

    const MD5 = 'md5';
    const SHA256 = 'sha256';
    const BCRYPT = 'bcrypt';

    /**
     * @param $str
     *
     * @return string
     */
    public static function passwordHash($str)
    {
        $method = config('auth.password_encryption_type');
        switch ($method) {
            case self::MD5:
                return self::md5WithSalt($str);
            case self::SHA256:
                return self::sha256WithSalt($str);
            case self::BCRYPT:
                return self::genBcryptHash($str);
            default:

        }

        return $str;
    }

    /**
     * @param $s
     * @return bool|string
     */
    public static function genBcryptHash($s)
    {
        return password_hash($s, PASSWORD_DEFAULT);
    }

    /**
     * @param $pass
     * @param $hash
     * @return bool
     */
    public static function bcryptVerify($pass, $hash)
    {
        return password_verify($pass, $hash);
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
        if ($method == self::BCRYPT) {
            return self::bcryptVerify($password, $hashedPassword);
        }
        $truePassword = self::passwordHash($password);
        if ($hashedPassword == $truePassword) {
            return true;
        }
        Factory::getLogger()->error("true: " . $truePassword . "  input: " . $hashedPassword);
        return false;
    }
}
