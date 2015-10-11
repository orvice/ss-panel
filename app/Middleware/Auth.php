<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Services\Auth as AuthService;

class Auth{

    public function __invoke(ServerRequestInterface $request,ResponseInterface $response, $next)
    {
        //$response->getBody()->write('BEFORE');
        $user = AuthService::getUser();
        if(!$user->isLogin){
            // @TODO no login action
            $response->getBody()->write('Access Denied');
            return $response;
        }
        $response = $next($request, $response);
        //$response->getBody()->write('AFTER');
        return $response;
    }
}