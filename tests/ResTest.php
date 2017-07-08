<?php

namespace Tests;

class ResTest extends TestCase
{
    public function testCaptcha()
    {
        $this->get('/api/captcha/id');
        $this->assertEquals('200', $this->response->getStatusCode());
        $this->assertEquals(' image/jpeg', $this->response->getHeaderLine('Content-Type'));
    }
}
