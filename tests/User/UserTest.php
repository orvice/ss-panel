<?php


class UserTest extends TestCase
{
    public function testUser()
    {
        $this->setProdEnv();
        $this->get('/user');
        $this->assertEquals('302', $this->response->getStatusCode());
        $this->setTestingEnv();
    }

    public function testUserNode()
    {
        $this->setProdEnv();
        $this->get('/user/node');
        $this->assertEquals('302', $this->response->getStatusCode());
        $this->setTestingEnv();
    }
}