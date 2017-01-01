<?php

namespace App\Services\Auth;


interface AuthInterface
{
    public function login($uid, $time);

    public function getUser($input);

    public function logout($input);
}