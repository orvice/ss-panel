<?php

namespace App\Controllers;

use App\Models\InviteCode;
use App\Services\Config;
use App\Utils\Check;
use App\Utils\Tools;
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
            $rs['ret'] = '0';
            $rs['msg'] = "402 邮箱或者密码错误";
            return $response->getBody()->write(json_encode($rs));
        }
        // @todo
        $time =  3600*24;
        if($rememberMe){
            $time = 3600*24*7;
        }
        Auth::login($user->id,$time);
        $rs['code'] = '1';
        $rs['ret'] = '1';
        $rs['msg'] = "欢迎回来";
        return $response->getBody()->write(json_encode($rs));
    }

    public function register($request, $response, $next)
    {
         $ary = $request->getQueryParams();
        $code = "";
        if(isset($ary['code'])){
            $code = $ary['code'];
        }
        return $this->view()->assign('code',$code)->display('auth/register.tpl');
    }

    public function registerHandle($request, $response, $next)
    {
        $name =  $request->getParam('name');
        $email =  $request->getParam('email');
        $email = strtolower($email);
        $passwd = $request->getParam('passwd');
        $repasswd = $request->getParam('repasswd');
        $code = $request->getParam('code');
        // check code
        $c = InviteCode::where('code',$code)->first();
        if ( $c == null) {
            $res['ret'] = 0;
            $res['msg'] = "邀请码无效";
            return $response->getBody()->write(json_encode($res));
        }

        // check email format
        if(!Check::isEmailLegal($email)){
            $res['ret'] = 0;
            $res['msg'] = "邮箱无效";
            return $response->getBody()->write(json_encode($res));
        }
        // check pwd length
        if(strlen($passwd)<8){
            $res['ret'] = 0;
            $res['msg'] = "密码太短";
            return $response->getBody()->write(json_encode($res));
        }

        // check pwd re
        if($passwd != $repasswd){
            $res['ret'] = 0;
            $res['msg'] = "两次密码输入不符";
            return $response->getBody()->write(json_encode($res));
        }

        // check email
        $user = User::where('email',$email)->first();
        if ( $user != null) {
            $res['ret'] = 0;
            $res['msg'] = "邮箱已经被注册了";
            return $response->getBody()->write(json_encode($res));
        }

        // do reg user
        $user = new User();
        $user->user_name = $name;
        $user->email = $email;
        $user->pass = Hash::passwordHash($passwd);
        $user->passwd = Tools::genRandomChar(6);
        $user->port = Tools::getLastPort()+1;
        $user->t = 0;
        $user->u = 0;
        $user->d = 0;
        $user->transfer_enable = Tools::toGB(Config::get('defaultTraffic'));
        $user->invite_num = Config::get('inviteNum');
        $user->ref_by = $c->user_id;

        if($user->save()){
            $res['ret'] = 1;
            $res['msg'] = "注册成功";
            $c->delete();
            return $response->getBody()->write(json_encode($res));
        }
        $res['ret'] = 0;
        $res['msg'] = "未知错误";
        return $response->getBody()->write(json_encode($res));
    }

    public function logout($request, $response, $next){
        Auth::logout();
        $newResponse = $response->withStatus(302)->withHeader('Location', '/auth/login');
        return $newResponse;
    }

}