<?php

namespace Tests;


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

    public function testDebug()
    {
        $this->get('/debug');
        $this->assertEquals('200', $this->response->getStatusCode());
        $arr = json_decode($this->response->getBody(), true);
        // test version
        $this->assertEquals(get_version(), $arr['version']);
    }

    public function testPost()
    {

    }

    public function testError()
    {
        $this->get('/404');
        $this->assertEquals('404', $this->response->getStatusCode());

//        $this->get('/500');
//        $this->assertEquals('500', $this->response->getStatusCode());
    }
}
