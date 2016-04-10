<?php


class UserTest extends TestCase
{
    public function testUser()
    {
        $this->get('/user');
        $this->assertEquals('302', $this->response->getStatusCode());
    }

    public function testUserNode()
    {
        $this->get('/user/node');
        $this->assertEquals('302', $this->response->getStatusCode());
    }
}