<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 *  AuthController
 */

class AuthController extends BaseController
{

    public function login()
    {
        return $this->view()->display('auth/login.tpl');
    }

    public function loginHandle($request, $response, $next)
    {
        // $data = $request->post('sdf');
        $email =  $request->getParam('email');
        $passwd = $request->getParam('passwd');
        $rememberMe = $request->getParam('remember_me');

    }

    public function register($request, $response, $next)
    {
        $code = $request->getQueryParams('code');
        return $this->view()->assign('code',$code)->display('auth/register.tpl');
    }

    public function registerHandle($request, $response, $next)
    {

    }

}