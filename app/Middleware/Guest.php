<?php

namespace App\Middleware;

use App\Services\Factory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Utils\Http;

class Guest
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next)
    {
        $token = Http::getTokenFromReq($request);
        if (Factory::getTokenStorage()->get($token)) {
            return $this->userCenter($response);
        }
        $response = $next($request, $response);
        return $response;

    }

    /**
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function userCenter(ResponseInterface $response)
    {
        $newResponse = $response->withStatus(302)->withHeader('Location', '/user');
        return $newResponse;
    }
}
