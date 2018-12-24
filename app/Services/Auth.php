<?php

namespace App\Services;

use App\Models\User;
use App\Services\Cache\Cache;
use App\Services\Cache\Factory;
use App\Utils\Cookie;
use App\Utils\Helper;
use App\Utils\Tools;

class Auth
{
    protected $driver;

    protected $cache;

    public function __construct()
    {

    }

    /**
     * @return Cache
     */
    protected static function getCache()
    {
        return Factory::newSessionCache();
    }
    
    public static function login($uid, $time)
    {
        $sid = Tools::genSID();
        Cookie::set([
            'sid' => $sid
        ], $time + time());
        $key = $sid;
        $value = $uid;
        self::getCache()->set($key, $value, $time);
    }

    /**
     * @return User|void
     */
    public static function getUser()
    {
        if (Helper::isTesting()) {
            $user = User::first();
            $user->isLogin = true;
            return $user;
        }
        $sid = Cookie::get('sid');
        $value = self::getCache()->get($sid);
        if ($value == null || !$value) {
            $user = new User();
            $user->isLogin = false;
            return $user;
        }
        $uid = $value;
        $user = User::find($uid);
        if ($user == null) {
            $user = new User();
            $user->isLogin = false;
            return $user;
        }
        $user->isLogin = true;
        return $user;
    }

    public static function logout()
    {
        Cookie::set(['sid' => ''],0);
        $sid = Cookie::get('sid');
        self::getCache()->del($sid);
    }
}
