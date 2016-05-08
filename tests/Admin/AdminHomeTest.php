<?php

namespace Tests\Admin;

use Tests\TestCase;


class AdminHomeTest extends TestCase
{
    public function testHome()
    {
        $this->get('/admin');
        $this->assertEquals('200', $this->response->getStatusCode());
    }


    public function testConfig()
    {
        $this->get('/admin/config');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testTrafficLog()
    {
        $this->get('/admin/trafficlog');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testCheckinLog()
    {
        $this->get('/admin/checkinlog');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testInvite()
    {
        $this->get('/admin/invite');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testUpdateConfig()
    {
        $this->put('/admin/config', [
            "analyticsCode" => "",
            "homeCode" => "",
            "appName" => "",
            "user-index" => "",
            "user-node" => ""
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testAddInviteCode(){
        $this->post('/admin/invite', [
            "num" => "10",
            "prefix" => "prefix-",
            "uid" => "0",
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());
    }

}