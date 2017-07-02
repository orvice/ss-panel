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
        if (!$user || !$user->isLogin) {
            return $this->denied($response);
        }
        if (!$user->isAdmin()) {
            $id = $request->getAttribute('routeInfo')[2]['id'];
            if ($id != $user->id) {
                return $this->denied($response);
            }
        }
        $response = $next($request, $response);

        return $response;
    }

    /**
     * @param Response $response
     * @return Response
     */
    public function denied(Response $response)
    {
        $newResponse = $response->withJson([
            "error_code" => 401,
            "message" => "Access Denied",
        ], 401);
        return $newResponse;
    }
}
