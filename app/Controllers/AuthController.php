<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

use App\Utils\Hash;
use App\Services\Auth;
use App\Models\User;

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
        $email = strtolower($email);
        $passwd = $request->getParam('passwd');
        $rememberMe = $request->getParam('remember_me');

        // Handle Login
        $user = User::where('email','=',$email)->first();

        if ($user == null){
            $rs['code'] = '0';
            $rs['msg'] = "401 邮箱或者密码错误";
            return $response->getBody()->write(json_encode($rs));
        }

        if ($user->pass != Hash::passwordHash($passwd)){
            $rs['code'] = '0';
            $rs['msg'] = "402 邮箱或者密码错误";
            return $response->getBody()->write(json_encode($rs));
        }
        // @todo
        $time =  3600*24;
        Auth::login($user->id,$time);
        $rs['code'] = '1';
        $rs['ok'] = '1';
        $rs['msg'] = "欢迎回来";
        return $response->getBody()->write(json_encode($rs));
    }

    public function register($request, $response, $next)
    {
        $code = $request->getQueryParams('code');
        return $this->view()->assign('code',$code)->display('auth/register.tpl');
    }

    public function registerHandle($request, $response, $next)
    {
        $email =  $request->getParam('email');
        $email = strtolower($email);
        $passwd = $request->getParam('passwd');
        $code = $request->getParam('code');

        $user = User::where('email',$email)->first();


    }

    public function logout(){
        Auth::logout();
    }

}