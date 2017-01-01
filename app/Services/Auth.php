<?php

namespace App\Services;

use App\Models\User;
use App\Utils\Cookie;
use App\Utils\Tools;
use PDepend\Report\FileAwareGenerator;
use Psr\SimpleCache\CacheInterface;

class Auth
{
    protected $driver;

    /**
     * @var CacheInterface
     */
    protected $cache;

    const SID = 'sid';

    public function __construct($cache)
    {
        $this->cache = $cache;
    }


    public function login($uid, $time)
    {
        $sid = Tools::genSID();
        $key = $sid;
        $value = $uid;
        $this->cache->set($key, $value, $time);
        return $sid;
    }

    /**
     * @return User
     */
    protected function emptyUser()
    {
        $user = new User();
        $user->isLogin = false;
        return $user;
    }

    /**
     * @return User
     */
    public function getUser($cookie)
    {
        // @todo test support
        if (!isset($cookie[self::SID])) {
            return $this->emptyUser();
        }
        $sid = $cookie[self::SID];
        $value = $this->cache->get($sid);
        if (!$value) {
            return $this->emptyUser();
        }
        $uid = $value;
        $user = User::find($uid);
        if ($user == null) {
            return $this->emptyUser();
        }
        $user->isLogin = true;
        return $user;
    }

    /**
     * @param $cookie
     * @return bool
     */
    public function logout($cookie)
    {
        if (!isset($cookie[self::SID])) {
            return true;
        }
        $sid = $cookie[self::SID];
        $this->cache->delete($sid);
    }
}
