<?php


namespace App\Middleware;

use App\Services\Config;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Services\Factory;
use App\Utils\Helper;

class Mu
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next)
    {
        $key = Helper::getMuKeyFromReq($request);
        if ($key == null) {
            $res['ret'] = 0;
            $res['msg'] = "key is null";
            $newResponse = $response->withStatus(401);
            $newResponse->getBody()->write(json_encode($res));
            return $newResponse;
        }
        if ($key != Config::get('muKey')) {
            $res['ret'] = 0;
            $res['msg'] = "token is  invalid";
            $newResponse = $response->withStatus(401);
            $newResponse->getBody()->write(json_encode($res));
            return $newResponse;
        }
        $response = $next($request, $response);
        return $response;
    }
}