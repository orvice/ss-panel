<?php

namespace App\Middleware;


class Base
{
    /**
     * @param $response
     * @param $res
     * @return mixed
     */
    public function echoJson($response,$res){
        return $response->getBody()->write(json_encode($res));
    }
}