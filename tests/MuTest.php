<?php

namespace Tests;

use App\Services\Config;

class MuTest extends TestCase
{

    protected $muKey = 'muKey';

    public function setUp()
    {
        $this->setTestingEnv();
    }

    protected function setMuKey()
    {
        Config::set('muKey', $this->muKey);
    }

    public function testUsers()
    {
        $this->get('/mu/users', [
            'query' => [
                'key' => $this->muKey
            ],
            'header' => [
                'Key' => $this->muKey
            ]
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());
    }
}