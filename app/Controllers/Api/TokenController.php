<?php

namespace App\Controllers\Api;


use App\Controllers\BaseController;

use App\Models\User;
use App\Services\Factory;
use App\Utils\Hash;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 *  ApiController.
 */
class TokenController extends BaseController
{

    // Login Error Code
    const UserNotExist = 601;
    const UserPasswordWrong = 602;


    /**
     * @param Request $request
     * @param $response
     * @param $args
     * @return mixed
     */
    public function store(Request $request, $response, $args)
    {

        $email = $request->getParam('email');
        $email = strtolower($email);
        $passwd = $request->getParam('password');
        $rememberMe = $request->getParam('remember_me');
        $this->logger->debug($email . Hash::passwordHash($passwd));
        // Handle Login
        $user = User::where('email', '=', $email)->first();

        if ($user == null) {
            return $this->echoJson($response, [
                'error_code' => self::UserNotExist,
                'msg' => lang('auth.login-fail'),
            ], 400);
        }

        if (!Hash::checkPassword($user->pass, $passwd)) {
            return $this->echoJson($response, [
                'error_code' => self::UserPasswordWrong,
                'msg' => lang('auth.login-fail'),
                'hash' => Hash::passwordHash($passwd),
            ], 400);
        }
        // @todo
        $ttl = config('auth.session_timeout');
        if ($rememberMe) {
            $ttl = 3600 * 24 * 7;
        }
        $token = Factory::getTokenStorage()->store($user, $ttl);
        $this->logger->info(sprintf("login user %d token: %s  ttl:  %d", $user->id, $token->getAccessToken(), $ttl));

        return $this->echoJson($response, [
            'msg' => '',
            'data' => [
                'token' => $token->getAccessToken(),
                'user_id' => $user->id,
            ]
        ]);
    }

    public function show(Request $request, Response $response, $args)
    {
        $token = Factory::getTokenStorage()->get($args['token']);
        if(!$token){
            return $this->echoJson($response,[],404);
        }
        return $this->echoJson($response, [
            'msg' => '',
            'data' => [
                'token' => $token->getAccessToken(),
                'user' => $token->getUser()->getId(),
            ]
        ]);
    }
}
