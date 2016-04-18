<?php

namespace App\Middleware;

use App\Services\Auth as AuthService;
use App\Utils\Helper;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Admin
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next)
    {
        if (Helper::isTesting()) {
            $response = $next($request, $response);
            return $response;
        }
        $user = AuthService::getUser();
        if (!$user->isLogin) {
            $newResponse = $response->withStatus(302)->withHeader('Location', '/auth/login');
            return $newResponse;
        }

        if (!$user->isAdmin()) {
            $newResponse = $response->withStatus(302)->withHeader('Location', '/user');
            return $newResponse;
        }
        $response = $next($request, $response);
        return $response;
    }
}