<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Services\Factory;

class Api extends Base
{

    public function __invoke(ServerRequestInterface $request,ResponseInterface $response, $next)
    {
        $params = $request->getQueryParams();
        if(!isset($params['access_token'])){
            $res['ret'] = 0;
            $res['msg'] = "token is blank";
            return $this->echoJson($response,$res);
        }
        $accessToken = $params['access_token'];
        $storage = Factory::createTokenStorage();
        $token = $storage->get($accessToken);
        if ($token==null){
            $res['ret'] = 0;
            $res['msg'] = "token is null";
            return $this->echoJson($response,$res);
        }
        if ($token->expireTime < time()){
            $res['ret'] = 0;
            $res['msg'] = "token is expire";
            return $this->echoJson($response,$res);
        }
        $response = $next($request, $response);
        return $response;
    }
}