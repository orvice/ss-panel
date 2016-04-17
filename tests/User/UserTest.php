<?php


class UserTest extends TestCase
{
    public function setUp()
    {
        // set testing env
        $this->setTestingEnv();
    }

    public function testIndex()
    {
        $this->get('/user');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testNode()
    {
        $this->get('/user/node');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testProfile()
    {
        $this->get('/user/profile');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testInvite()
    {
        $this->get('/user/invite');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testTrafficLog()
    {
        $this->get('/user/trafficlog');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testEdit()
    {
        $this->get('/user/edit');
        $this->assertEquals('200', $this->response->getStatusCode());
    }
}