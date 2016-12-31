<?php

namespace App\Middleware;

use App\Services\Auth as AuthService;
use App\Services\Factory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Guest
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next)
    {
        $auth = Factory::getAuth();
        $user = $auth->getUser($request->getCookieParams());
        if ($user->isLogin) {
            $newResponse = $response->withStatus(302)->withHeader('Location', '/user');
            return $newResponse;
        }
        $response = $next($request, $response);

        return $response;
    }
}
