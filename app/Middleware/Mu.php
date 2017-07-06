<?php

namespace App\Middleware;

use App\Utils\Helper;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Contracts\Codes\Cfg;

class Mu implements Cfg
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next)
    {
        $key = Helper::getMuKeyFromReq($request);
        if ($key == null) {
            $res['ret'] = 0;
            $res['msg'] = 'key is null';
            $newResponse = $response->withJson($res, 401);

            return $newResponse;
        }
        if ($key != db_config(self::MuKey)) {
            $res['ret'] = 0;
            $res['msg'] = 'token is  invalid';
            $newResponse = $response->withJson($res, 401);

            return $newResponse;
        }
        $response = $next($request, $response);

        return $response;
    }
}
