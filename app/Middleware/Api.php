<?php

namespace App\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

class Api
{
    use Helper;

    public function __invoke(Request $request, Response $response, $next)
    {
        $user = $this->getUserFromReq($request);
        if (!$user) {
            $newResponse = $response->withJson([

            ], 401);
            return $newResponse;
        }
        $response = $next($request, $response);

        return $response;
    }
}
