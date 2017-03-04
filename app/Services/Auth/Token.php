<?php


namespace App\Services\Auth;

use Psr\SimpleCache\CacheInterface;
use App\Contracts\TokenInterface;
use App\Services\Factory;
use App\Models\User;

class Token implements TokenInterface
{

    /**
     * @var CacheInterface
     */
    private $cache;

    private $accessToken;

    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
        $this->cache = Factory::getCache();
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        $uid = $this->cache->get($this->accessToken);
        return User::find($uid);
    }
}