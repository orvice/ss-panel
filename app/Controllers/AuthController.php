<?php

namespace App\Controllers;

use App\Models\InviteCode, App\Models\User;
use App\Services\Config, App\Services\Auth\EmailVerify, App\Services\Auth, App\Services\Mail;
use App\Utils\Check, App\Utils\Tools, App\Utils\Http, App\Utils\Hash;
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

    public function loginHandle($request, $response, $args)
    {
        // $data = $request->post('sdf');
        $email = $request->getParam('email');
        $email = strtolower($email);
        $passwd = $request->getParam('passwd');
        $rememberMe = $request->getParam('remember_me');

        // Handle Login
        $user = User::where('email', '=', $email)->first();

        if ($user == null) {
            $res['ret'] = 0;
            $res['msg'] = "401 邮箱或者密码错误";
            return $this->echoJson($response, $res);
        }

        if (!Hash::checkPassword($user->pass, $passwd)) {
            $res['ret'] = 0;
            $res['msg'] = "402 邮箱或者密码错误";
            return $this->echoJson($response, $res);
        }
        // @todo
        $time = 3600 * 24;
        if ($rememberMe) {
            $time = 3600 * 24 * 7;
        }
        Auth::login($user->id, $time);
        $res['ret'] = 1;
        $res['msg'] = "欢迎回来";
        return $this->echoJson($response, $res);
    }

    public function register($request, $response, $next)
    {
        $ary = $request->getQueryParams();
        $code = "";
        if (isset($ary['code'])) {
            $code = $ary['code'];
        }
        $requireEmailVerification = Config::get('emailVerifyEnabled');
        return $this->view()->assign('code', $code)->assign('requireEmailVerification', $requireEmailVerification)->display('auth/register.tpl');
    }

    public function registerHandle($request, $response, $next)
    {
        $name = $request->getParam('name');
        $email = $request->getParam('email');
        $email = strtolower($email);
        $passwd = $request->getParam('passwd');
        $repasswd = $request->getParam('repasswd');
        $code = $request->getParam('code');
        $verifycode = $request->getParam('verifycode');

        // check code
        $c = InviteCode::where('code', $code)->first();
        if ($c == null) {
            $res['ret'] = 0;
            $res['msg'] = "邀请码无效";
            return $this->echoJson($response, $res);
        }

        // check email format
        if (!Check::isEmailLegal($email)) {
            $res['ret'] = 0;
            $res['msg'] = "邮箱无效";
            return $this->echoJson($response, $res);
        }
        // check pwd length
        if (strlen($passwd) < 8) {
            $res['ret'] = 0;
            $res['msg'] = "密码太短";
            return $this->echoJson($response, $res);
        }

        // check pwd re
        if ($passwd != $repasswd) {
            $res['ret'] = 0;
            $res['msg'] = "两次密码输入不符";
            return $this->echoJson($response, $res);
        }

        // check email
        $user = User::where('email', $email)->first();
        if ($user != null) {
            $res['ret'] = 0;
            $res['msg'] = "邮箱已经被注册了";
            return $this->echoJson($response, $res);
        }

        // verify email
        if (Config::get('emailVerifyEnabled') && !EmailVerify::checkVerifyCode($email, $verifycode)) {
            $res['ret'] = 0;
            $res['msg'] = '邮箱验证代码不正确';
            return $this->echoJson($response, $res);
        }

        // do reg user
        $user = new User();
        $user->user_name = $name;
        $user->email = $email;
        $user->pass = Hash::passwordHash($passwd);
        $user->passwd = Tools::genRandomChar(6);
        $user->port = Tools::getLastPort() + 1;
        $user->t = 0;
        $user->u = 0;
        $user->d = 0;
        $user->transfer_enable = Tools::toGB(Config::get('defaultTraffic'));
        $user->invite_num = Config::get('inviteNum');
        $user->reg_ip = Http::getClientIP();
        $user->ref_by = $c->user_id;

        if ($user->save()) {
            $res['ret'] = 1;
            $res['msg'] = "注册成功";
            $c->delete();
            return $this->echoJson($response, $res);
        }
        $res['ret'] = 0;
        $res['msg'] = "未知错误";
        return $this->echoJson($response, $res);
    }

    public function sendVerifyEmail($request, $response, $next)
    {
        $res = array();
        $email = $request->getParam('email');

        if (!Check::isEmailLegal($email)) {
            $res['ret'] = 0;
            $res['msg'] = '邮箱无效';
            return $this->echoJson($response, $res);
        }

        // check email
        $user = User::where('email', $email)->first();
        if ($user != null) {
            $res['ret'] = 0;
            $res['msg'] = "邮箱已经被注册了";
            return $this->echoJson($response, $res);
        }

        if (EmailVerify::sendVerification($email)) {
            $res['ret'] = 1;
            $res['msg'] = '验证代码已发送至您的邮箱，请在登录邮箱后将验证码填到相应位置.';
        } else {
            $res['ret'] = 0;
            $res['msg'] = '邮件发送失败，请联系管理员';
        }
        return $this->echoJson($response, $res);
    }

    public function logout($request, $response, $next)
    {
        Auth::logout();
        $newResponse = $response->withStatus(302)->withHeader('Location', '/auth/login');
        return $newResponse;
    }

}