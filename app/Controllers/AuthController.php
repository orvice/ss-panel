<?php

namespace App\Controllers;

use App\Models\InviteCode;
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
        // check code
        $c = InviteCode::where('code',$code)->first();
        if ( $c == null) {
            $res['ret'] = 0;
            $res['msg'] = "邀请码无效";
            return $response->getBody()->write(json_encode($res));
        }

        // check email format

        // check pwd length

        // check email
        $user = User::where('email',$email)->first();
        if ( $user == null) {
            $res['ret'] = 0;
            $res['msg'] = "邮箱已经被注册了";
            return $response->getBody()->write(json_encode($res));
        }

        // do reg user

        // get port

        


        $res['ret'] = 1;
        $res['msg'] = "注册成功";
        return $response->getBody()->write(json_encode($res));
    }

    public function logout(){
        Auth::logout();
    }

}