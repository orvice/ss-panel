<?php

namespace Tests\User;

use Tests\TestCase;
use App\Models\Node;

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

    public function testCheckIn()
    {
        $this->post('/user/checkin');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testNode()
    {
        $this->get('/user/node');
        $this->assertEquals('200', $this->response->getStatusCode());

        $node = Node::first();
        if ($node != null) {
            $this->get("/user/node/$node->id");
            $this->assertEquals('200', $this->response->getStatusCode());
        }
    }

    public function testProfile()
    {
        $this->get('/user/profile');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testKill()
    {
        $this->get('/user/kill');
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
