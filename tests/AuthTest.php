<?php

namespace Tests;

use App\Utils\Tools;
use App\Models\InviteCode;

class AuthTest extends TestCase
{

    protected $email = "sp3@sp3.dev";

    protected $password = "password123##";

    public function setUp()
    {
        $this->setProdEnv();
    }

    public function testAuthLogin()
    {
        $this->get('/auth/login');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    protected function addCode(){
        $codeStr = Tools::genRandomChar(32);
        $code = new InviteCode();
        $code->code = $codeStr;
        $code->user_id = 0;
        if($code->save()){
            return $codeStr;
        }
        return null;
    }

    public function testHandleRegister(){

        $code = $this->addCode();

        // test wrong code
        $this->post('/auth/register',[
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());

        // test illegal email
        $this->post('/auth/register',[
            "code" => $code
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());

        // test password to short
        $shortPwd = '123';
        $this->post('/auth/register',[
            "code" => $code,
            "passwd" => $shortPwd
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());

        // test password not equal
        $this->post('/auth/register',[
            "code" => $code,
            "passwd" => $this->password,
            "repasswd" => $shortPwd
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());

    }

    public function testHandleLogin(){
        $this->post('/auth/login',[
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