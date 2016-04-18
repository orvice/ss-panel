<?php


class ResetTest extends TestCase
{
    public function setUp()
    {
        $this->setProdEnv();
    }

    public function testRest()
    {
        $this->get('/password/reset');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testToken()
    {
        $this->get('/password/token/token');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function __destruct()
    {
        $this->setTestingEnv();
    }
}