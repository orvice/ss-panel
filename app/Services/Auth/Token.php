<?php


namespace App\Services\Auth;

use App\Models\User;
use App\Utils\Tools;
use Psr\SimpleCache\CacheInterface;

class Token
{

    /**
     * @var CacheInterface
     */
    protected $cache;

    const SID = 'sid';

    /**
     * Token constructor.
     * @param CacheInterface $cache
     */
    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param $uid
     * @param $ttl
     * @return string
     */
    public function saveToken($uid, $ttl)
    {
        $sid = Tools::genSID();
        $key = $sid;
        $value = $uid;
        $this->cache->set($key, $value, $ttl);
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
     * @param $data
     * @return mixed
     */
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