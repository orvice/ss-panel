<?php

namespace Tests;

class ApiTest extends TestCase
{
    public function testIndex()
    {
        $this->get('/api');
        $this->assertEquals('404', $this->response->getStatusCode());
    }

    public function testNode()
    {
        $this->get('/api/node');
        $this->assertEquals('200', $this->response->getStatusCode());
    }
}