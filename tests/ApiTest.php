<?php

class ApiTest extends TestCase
{
    public function testIndex()
    {
        $this->get('/api');
        $this->assertEquals('404', $this->response->getStatusCode());
    }
}