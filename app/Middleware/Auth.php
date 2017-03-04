<?php

namespace App\Middleware;

use App\Utils\Http;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Services\Factory;

class Auth
{

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param $next
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next)
    {
        $token = Http::getTokenFromReq($request);
        if (!$token) {
            return $this->login($response);
        }

        if (!Factory::getTokenStorage()->get($token)) {
            return $this->login($response);
        }

        $response = $next($request, $response);

        return $response;
    }

    /**
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function login(ResponseInterface $response)
    {
        $newResponse = $response->withStatus(302)->withHeader('Location', '/auth/login');
        return $newResponse;
    }
}
