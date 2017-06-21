<?php

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Services\Factory;
use App\Utils\Http;
use App\Models\User as UserModel;
use App\Services\Auth\User as AuthUser;

trait Helper
{
    /**
     * @param ServerRequestInterface $request
     * @return UserModel
     */
    public function getUserFromReq(ServerRequestInterface $request)
    {
        $token = Http::getTokenFromReq($request);
        if (!$token) {
            return $this->guestUser();
        }
        $token = Factory::getTokenStorage()->get($token);
        if (!$token) {
            return $this->guestUser();
        }
        return $token->getUser();
    }

    /**
     * @return UserModel
     */
    private function guestUser()
    {
        $user = new UserModel();
        $user->isLogin = false;
        return $user;
    }
}