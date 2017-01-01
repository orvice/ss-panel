<?php

namespace App\Services\Auth;


interface AuthInterface
{
    public function login($uid, $ttl);

    public function getUser($input);

    public function logout($input);
}