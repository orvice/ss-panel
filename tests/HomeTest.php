<?php


class HomeTest extends TestCase
{
    public function testIndex()
    {
        $this->get('/');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testCode()
    {
        $this->get('/code');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testTos()
    {
        $this->get('/tos');
        $this->assertEquals('200', $this->response->getStatusCode());
    }



    public function testError()
    {
        $this->get('/404');
        $this->assertEquals('404', $this->response->getStatusCode());
    }


}