<?php


namespace App\Contracts;

use App\Models\User;

interface TokenStorageInterface
{
    /**
     * @param User $user
     * @param $ttl
     * @return TokenInterface
     */
    public function store(User $user, $ttl);

    /**
     * @param $token string
     * @return TokenInterface
     */
    public function get($token);

    /**
     * @param $token string
     * @return bool
     */
    public function delete($token);
}