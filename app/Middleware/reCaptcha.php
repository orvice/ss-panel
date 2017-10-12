<?php

namespace App\Middleware;

use App\Services\Auth as AuthService;
use App\Utils\Helper;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class reCaptcha
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next)
    {
        if (Helper::isTesting()) {
            $response = $next($request, $response);
            return $response;
        }
        if (!AuthService::checkReCaptcha() && $request->getRequestTarget() != '/reCaptcha' && $request->getRequestTarget() != '/pay/eapay/async') {
            $newResponse = $response->withStatus(302)->withHeader('Location', '/reCaptcha');
            return $newResponse;
        }
        $response = $next($request, $response);
        return $response;
    }
}