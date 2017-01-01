<?php

namespace App\Controllers;

use App\Models\InviteCode;
use App\Models\User;
use App\Services\Auth\EmailVerify;
use App\Services\Factory;
use App\Services\Logger;
use App\Utils\Check;
use App\Utils\Hash;
use App\Utils\Http;
use App\Utils\Tools;
use Interop\Container\ContainerInterface;
use Slim\Http\Request;

/**
 *  AuthController.
 */
class AuthController extends BaseController
{

    // Register Error Code
    const WrongCode = 501;
    const IllegalEmail = 502;
    const PasswordTooShort = 511;
    const PasswordNotEqual = 512;
    const EmailUsed = 521;

    // Login Error Code
    const UserNotExist = 601;
    const UserPasswordWrong = 602;

    // Verify Email
    const VerifyEmailWrongEmail = 701;
    const VerifyEmailExist = 702;

    public function login($request, $response, $args)
    {
        return $this->view('auth/login');
    }

    public function loginHandle(Request $request, $response, $args)
    {
        // $data = $request->post('sdf');
        $email = $request->getParam('email');
        $email = strtolower($email);
        $passwd = $request->getParam('passwd');
        $rememberMe = $request->getParam('remember_me');
        $this->logger->debug($email . Hash::passwordHash($passwd));
        // Handle Login
        $user = User::where('email', '=', $email)->first();

        if ($user == null) {
            $res['ret'] = 0;
            $res['error_code'] = self::UserNotExist;
            $res['msg'] = lang('auth.login-fail');
            return $this->echoJson($response, $res, 400);
        }

        if (!Hash::checkPassword($user->pass, $passwd)) {
            $res['ret'] = 0;
            $res['error_code'] = self::UserPasswordWrong;
            $res['msg'] = lang('auth.login-fail');
            return $this->echoJson($response, $res, 400);
        }
        // @todo
        $time = config('auth.session_timeout');
        if ($rememberMe) {
            $time = 3600 * 24 * 7;
        }
        $this->logger->info("login user $user->id ");
        $auth = Factory::getAuth();
        $sid = $auth->login($user->id, $time);
        $this->logger->info($sid);

        $res['ret'] = 1;
        $res['msg'] = '欢迎回来';
        $res['data'] = [
            "sid" => $sid,
            "token" => $sid,
        ];

        return $this->echoJson($response, $res);
    }

    public function register(Request $request, $response, $args)
    {
        $arr = $request->getQueryParams();
        $code = '';
        if (isset($arr['code'])) {
            $code = $arr['code'];
        }
        $requireEmailVerification = config('app.email_verify_enabled');
        return $this->view('auth/register', [
            'requireEmailVerification' => $requireEmailVerification,
            "code" => $code,
        ]);
    }

    public function registerHandle(Request $request, $response, $args)
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
            $res['error_code'] = self::WrongCode;
            $res['msg'] = '邀请码无效';

            return $this->echoJson($response, $res);
        }

        // check email format
        if (!Check::isEmailLegal($email)) {
            $res['ret'] = 0;
            $res['error_code'] = self::IllegalEmail;
            $res['msg'] = '邮箱无效';

            return $this->echoJson($response, $res);
        }
        // check pwd length
        if (strlen($passwd) < 8) {
            $res['ret'] = 0;
            $res['error_code'] = self::PasswordTooShort;
            $res['msg'] = '密码太短';

            return $this->echoJson($response, $res);
        }

        // check pwd re
        if ($passwd != $repasswd) {
            $res['ret'] = 0;
            $res['error_code'] = self::PasswordNotEqual;
            $res['msg'] = '两次密码输入不符';

            return $this->echoJson($response, $res);
        }

        // check email
        $user = User::where('email', $email)->first();
        if ($user != null) {
            $res['ret'] = 0;
            $res['error_code'] = self::EmailUsed;
            $res['msg'] = '邮箱已经被注册了';

            return $this->echoJson($response, $res);
        }

        // verify email
        if (Config::get('emailVerifyEnabled') && !EmailVerify::checkVerifyCode($email, $verifycode)) {
            $res['ret'] = 0;
            $res['msg'] = '邮箱验证代码不正确';

            return $this->echoJson($response, $res);
        }

        // check ip limit
        $ip = Http::getClientIP();
        $ipRegCount = Check::getIpRegCount($ip);
        if ($ipRegCount >= Config::get('ipDayLimit')) {
            $res['ret'] = 0;
            $res['msg'] = '当前IP注册次数超过限制';

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
            $res['msg'] = '注册成功';
            $c->delete();

            return $this->echoJson($response, $res);
        }
        $res['ret'] = 0;
        $res['msg'] = '未知错误';

        return $this->echoJson($response, $res);
    }

    public function sendVerifyEmail(Request $request, $response, $args)
    {
        $res = [];
        $email = $request->getParam('email');

        if (!Check::isEmailLegal($email)) {
            $res['ret'] = 0;
            $res['error_code'] = self::VerifyEmailWrongEmail;
            $res['msg'] = '邮箱无效';

            return $this->echoJson($response, $res);
        }

        // check email
        $user = User::where('email', $email)->first();
        if ($user != null) {
            $res['ret'] = 0;
            $res['error_code'] = self::VerifyEmailExist;
            $res['msg'] = '邮箱已经被注册了';

            return $this->echoJson($response, $res);
        }

        if (EmailVerify::sendVerification($email)) {
            $res['ret'] = 1;
            $res['msg'] = '验证代码已发送至您的邮箱，请在登录邮箱后将验证码填到相应位置.';

            return $this->echoJson($response, $res);
        }
        $res['ret'] = 0;
        $res['msg'] = '邮件发送失败，请联系管理员';

        return $this->echoJson($response, $res);
    }

    public function logout(Request $request, $response, $args)
    {
        $auth = Factory::getAuth();
        $auth->logout($request->getCookieParams());
        // @todo
        return $this->redirect($response, '/auth/login');
    }
}
