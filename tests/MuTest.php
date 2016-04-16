<?php

use App\Services\Config;

class MuTest extends TestCase
{

    protected $muKey = 'muKey';

    protected function setMuKey()
    {
        Config::set('muKey', $this->muKey);
    }

    public function testUnauthorized()
    {
        $this->setProdEnv();
        $this->get("/mu/users");
        $this->assertEquals('401', $this->response->getStatusCode());
        $this->setTestingEnv();
    }

    public function testUsers()
    {
        $this->get('/mu/users', [
            'query' => [
                'key' => $this->muKey
            ],
            'header' => [
                'Key'  => $this->muKey
            ]
        ]);
    }
}