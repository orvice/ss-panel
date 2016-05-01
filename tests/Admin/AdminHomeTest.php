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

    public function testNode()
    {
        $this->get('/admin/node');
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

    public function testInvite()
    {
        $this->get('/admin/invite');
        $this->assertEquals('200', $this->response->getStatusCode());
    }
}