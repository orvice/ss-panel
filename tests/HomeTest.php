<?php

namespace Tests;

use App\Services\Config;

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
        $ary = json_decode($this->response->getBody(), true);
        // test version
        $this->assertEquals(Config::get('version'), $ary['version']);
    }

    public function testPost()
    {
        $this->post('/debug', [
           'name' => 'bar',
        ]);
        //echo $this->response->getBody();

        //$this->post('/debug',"foobar");
        //echo $this->response->getBody();
    }

    public function testError()
    {
        $this->get('/404');
        $this->assertEquals('404', $this->response->getStatusCode());
    }
}
