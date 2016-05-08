<?php

namespace Tests;


class AuthTest extends TestCase
{

    public function setUp()
    {
        $this->setProdEnv();
    }

    public function testAuthLogin()
    {
        $this->get('/auth/login');
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