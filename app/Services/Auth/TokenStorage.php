<?php


namespace App\Services\Auth;

use App\Contracts\TokenStorageInterface;
use App\Models\User;
use App\Contracts\TokenInterface;
use Psr\SimpleCache\CacheInterface;

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

    }

    /**
     * @param $token string
     * @return TokenInterface
     */
    public function get($token)
    {

    }

    /**
     * @param $token string
     * @return bool
     */
    public function delete($token)
    {

    }


}