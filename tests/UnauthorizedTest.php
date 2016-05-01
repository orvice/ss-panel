<?php

namespace Tests;


class UnauthorizedTest extends TestCase
{
    public function setUp()
    {
        $this->setProdEnv();
    }

    public function testMuUnauthorized()
    {
        $this->get("/mu/users");
        $this->assertEquals('401', $this->response->getStatusCode());
    }

    public function testUnauthorized()
    {
        $this->get("/api/node");
        $this->assertEquals('401', $this->response->getStatusCode());
    }

    public function testAdmin()
    {
        $this->get('/admin');
        $this->assertEquals('302', $this->response->getStatusCode());
    }

    public function testUser()
    {
        $this->get('/user');
        $this->assertEquals('302', $this->response->getStatusCode());
    }

    public function __destruct()
    {
        $this->setTestingEnv();
    }
}