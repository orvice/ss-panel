<?php


namespace App\Contracts;

use App\Models\User;

interface TokenInterface
{
    /**
     * @return string
     */
    public function getAccessToken();

    /**
     * @return User
     */
    public function getUser();
}