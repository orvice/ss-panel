<?php


namespace App\Services\Auth;

use App\Contracts\TokenStorageInterface;
use App\Models\User;
use App\Contracts\TokenInterface;
use Psr\SimpleCache\CacheInterface;
use App\Utils\Tools;

class TokenStorage implements TokenStorageInterface
{
    /**
     * @var CacheInterface
     */
    private $cache;

    /**
     * TokenStorage constructor.
     * @param CacheInterface $cache
     */
    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param User $user
     * @param $ttl
     * @return TokenInterface
     */
    public function store(User $user, $ttl)
    {
        $accessToken = Tools::genToken();
        $this->cache->set($accessToken, $user->getId(), $ttl);
        return new Token($accessToken);
    }

    /**
     * @param $token string
     * @return TokenInterface
     */
    public function get($token)
    {
        if (!$this->cache->has($token)) {
            return null;
        }
        return new Token($token);
    }

    /**
     * @param $token string
     * @return bool
     */
    public function delete($token)
    {
        $this->cache->delete($token);
        return true;
    }


}