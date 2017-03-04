<?php


namespace App\Contracts;


interface TokenInterface
{
    /**
     * @return string
     */
    public function getAccessToken();
}