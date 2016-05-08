<?php

namespace Tests\Mu;

use App\Services\Config;
use Tests\TestCase;

class MuTest extends TestCase
{

    protected $muKey = 'muKey';

    protected $uid = '1';
    protected $nodeId = '1';
    protected $u = "1024";
    protected $d = "1024";

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

    public function testLogTraffic()
    {
        $this->post('/mu/users/' . $this->uid . '/traffic', [
            "u" => $this->u,
            "d" => $this->d,
            "node_id" => $this->nodeId
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());
    }
}