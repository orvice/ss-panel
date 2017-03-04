<?php


namespace App\Services\Auth;

use App\Models\User as UserModel;

class User
{
    /**
     * @var UserModel
     */
    private static $user;

    /**
     * @param UserModel $user
     */
    public static function setUser(UserModel $user)
    {
        self::$user = $user;
    }

    /**
     * @return UserModel
     */
    public static function getUser()
    {
        return self::$user;
    }
}