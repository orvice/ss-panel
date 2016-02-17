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
            $response->getBody()->write(json_encode($res));
            return $response;
        }
        if ($key != Config::get('muKey')) {
            $res['ret'] = 0;
            $res['msg'] = "token is  invalid";
            $response->getBody()->write(json_encode($res));
            return $response;
        }
        $response = $next($request, $response);
        return $response;
    }
}