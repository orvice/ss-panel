<?php


namespace App\Services\Auth;

use App\Models\User;
use App\Utils\Tools;
use Psr\SimpleCache\CacheInterface;

class Token
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


    public function saveToken($uid, $time)
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

    private function getUidFromData($data)
    {
        // @todo
        return $data;
    }

    /**
     * @param $token
     * @return User
     */
    public function getUserFromToken($token)
    {
        $value = $this->cache->get($token);
        if (!$value) {
            return $this->emptyUser();
        }
        $uid = $this->getUidFromData($value);
        $user = User::find($uid);
        if ($user == null) {
            return $this->emptyUser();
        }
        $user->isLogin = true;
        return $user;
    }

    /**
     * @param $token
     * @return bool
     */
    public function delToken($token)
    {
        $this->cache->delete($token);
        return true;
    }
}