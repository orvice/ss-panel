<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Services\Factory;
use App\Utils\Helper;

class Api
{

    public function __invoke(ServerRequestInterface $request,ResponseInterface $response, $next)
    {
        if(Helper::isTesting()){
            $response = $next($request, $response);
            return $response;
        }
        $accessToken = Helper::getTokenFromReq($request);
        if ($accessToken==null){
            $res['ret'] = 0;
            $res['msg'] = "token is null";
            $newResponse = $response->withJson($res,401);
            return $newResponse;
        }
        $storage = Factory::createTokenStorage();
        $token = $storage->get($accessToken);
        if ($token==null){
            $res['ret'] = 0;
            $res['msg'] = "token is null";
            $newResponse = $response->withJson($res,401);
            return $newResponse;
        }
        if ($token->expireTime < time()){
            $res['ret'] = 0;
            $res['msg'] = "token is expire";
            $newResponse = $response->withJson($res,401);
            return $newResponse;
        }
        $response = $next($request, $response);
        return $response;
    }
}