<?php

namespace App\Middleware;

use App\Utils\Helper as HelperUtil;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Contracts\Codes\Cfg;

class Mu implements Cfg
{
    public function __invoke(Request $request, Response $response, $next)
    {
        $key = HelperUtil::getMuKeyFromReq($request);
        if ($key == null) {
            $newResponse = $response->withJson([], 401);

            return $newResponse;
        }
        if ($key != db_config(self::MuKey)) {
            $newResponse = $response->withJson([], 401);

            return $newResponse;
        }
        $response = $next($request, $response);

        return $response;
    }
}
