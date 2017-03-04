<?php


namespace App\Services\Auth;

use App\Contracts\TokenInterface;

class Token implements TokenInterface
{

    private $accessToken;

    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
}