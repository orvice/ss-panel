<?php


class HomeTest extends TestCase
{
    public function testIndex()
    {
        $this->get('/');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testError()
    {
        $this->get('/404');
        $this->assertEquals('404', $this->response->getStatusCode());
    }

    public function testAuthLogin()
    {
        $this->get('/auth/login');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

}