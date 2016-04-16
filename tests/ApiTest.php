<?php

class ApiTest extends TestCase
{
    public function testIndex()
    {
        $this->get('/api');
        $this->assertEquals('404', $this->response->getStatusCode());
    }

    public function testUnauthorized()
    {
        $this->setProdEnv();
        $this->get("/api/node");
        $this->assertEquals('401', $this->response->getStatusCode());
        $this->setTestingEnv();
    }

    public function testNode()
    {
        $this->get('/api/node');
        $this->assertEquals('200', $this->response->getStatusCode());
    }
}