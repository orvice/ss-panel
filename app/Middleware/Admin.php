<?php

namespace App\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

class Admin extends Api
{
    use Helper;

    public function __invoke(Request $request, Response $response, $next)
    {
        $user = $this->getUserFromReq($request);
        if (!$user || !$user->isLogin) {
            return $this->denied($response);
        }
        if (!$user->isAdmin()) {
            return $this->denied($response);
        }
        $response = $next($request, $response);
        return $response;
    }
}
