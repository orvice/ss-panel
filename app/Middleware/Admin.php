<?php

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Services\Factory;
use App\Utils\Http;

class Admin extends Auth
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next)
    {
        $token = Http::getTokenFromReq($request);
        if (!$token) {
            return $this->login($response);
        }
        $token = Factory::getTokenStorage()->get($token);
        if (!$token) {
            return $this->login($response);
        }

        if (!$token->getUser()->isAdmin()) {
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
