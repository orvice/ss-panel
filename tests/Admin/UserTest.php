<?php


namespace Tests\Admin;


use Tests\TestCase;

class UserTest extends TestCase
{

    public function testUserList()
    {
        $this->get('/admin/user');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testUserInfo()
    {
        $this->get('/admin/user/1/edit');
        $this->assertEquals('200', $this->response->getStatusCode());
    }
}