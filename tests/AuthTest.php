<?php

namespace Tests;

use App\Controllers\AuthController;
use App\Models\InviteCode;
use App\Models\User;
use App\Services\Config;
use App\Utils\Tools;

class AuthTest extends TestCase
{

    protected $email = "sp3@sp3.me";

    protected $password = "password123##";

    public function setUp()
    {
        $this->setProdEnv();
        $this->email = Tools::genRandomChar(8) . "@sp3.me";
    }

    public function testAuthLogin()
    {
        $this->get('/auth/login');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    protected function addCode()
    {
        $codeStr = Tools::genRandomChar(32);
        $code = new InviteCode();
        $code->code = $codeStr;
        $code->user_id = 0;
        if ($code->save()) {
            return $codeStr;
        }
        return null;
    }

    public function testHandleRegister()
    {

        $code = $this->addCode();

        // test wrong code
        $this->post('/auth/register', [
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());
        $this->checkErrorCode(AuthController::WrongCode);

        // test illegal email
        $this->post('/auth/register', [
            "code" => $code
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());
        $this->checkErrorCode(AuthController::IllegalEmail);

        // test password to short
        $shortPwd = '123';
        $this->post('/auth/register', [
            "code" => $code,
            "email" => $this->email,
            "passwd" => $shortPwd
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());
        $this->checkErrorCode(AuthController::PasswordTooShort);

        // test password not equal
        $this->post('/auth/register', [
            "code" => $code,
            "email" => $this->email,
            "passwd" => $this->password,
            "repasswd" => $shortPwd
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());
        $this->checkErrorCode(AuthController::PasswordNotEqual);

        // test email used
        $usedEmail = User::first()->email;
        $this->post('/auth/register', [
            "code" => $code,
            "email" => $usedEmail,
            "passwd" => $this->password,
            "repasswd" => $this->password
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());
        $this->checkErrorCode(AuthController::EmailUsed);

        //  illegal register
        Config::set('emailVerifyEnabled', false);
        $this->post('/auth/register', [
            "code" => $code,
            "email" => $this->email,
            "passwd" => $this->password,
            "repasswd" => $this->password,
            "name" => "name"
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testHandleLogin()
    {
        $this->post('/auth/login', [
            "email" => "",
            "password" => ""
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testAuthRegister()
    {
        $this->get('/auth/register');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

}