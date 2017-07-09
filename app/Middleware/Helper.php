<?php

namespace App\Middleware;

use Slim\Http\Response;
use Psr\Http\Message\ServerRequestInterface;
use App\Services\Factory;
use App\Utils\Http;
use App\Models\User as UserModel;

trait Helper
{

    private $logger;

    public function init()
    {
        $this->logger = Factory::getLogger();
    }

    /**
     * @param ServerRequestInterface $request
     * @return UserModel
     */
    public function getUserFromReq(ServerRequestInterface $request)
    {
        $token = Http::getTokenFromReq($request);
        if (!$token) {
            return $this->guestUser();
        }
        $token = Factory::getTokenStorage()->get($token);
        if (!$token) {
            return $this->guestUser();
        }
        return $token->getUser();
    }

    /**
     * @return UserModel
     */
    private function guestUser()
    {
        $user = new UserModel();
        $user->isLogin = false;
        return $user;
    }

    /**
     * @param $response
     * @param $data
     * @param int $statusCode
     *
     * @return mixed
     */
    public function echoJson(Response $response, $data = [], $statusCode = 200)
    {
        $newResponse = $response->withJson($data, $statusCode);
        return $newResponse;
    }
}