<?php


class ResTest extends TestCase
{
    public function testCaptcha()
    {
        $this->get('/res/captcha/id');
        $this->assertEquals('200', $this->response->getStatusCode());
        $this->assertEquals(' image/jpeg', $this->response->getHeaderLine('Content-Type'));
    }
}