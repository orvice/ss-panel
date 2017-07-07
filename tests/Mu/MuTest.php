<?php

namespace Tests\Mu;

use App\Services\Config;
use Tests\TestCase;
use App\Contracts\Codes\Cfg;
use App\Services\Config\DbConfig;

class MuTest extends TestCase implements Cfg
{
    protected $muKey = 'muKey';

    protected $uid = '1';
    protected $nodeId = '1';
    protected $u = '1024';
    protected $d = '1024';

    public function setUp()
    {
        $this->markTestIncomplete();
    }

    /**
     * @return DbConfig
     */
    public function getCfg()
    {
        return app()->make(DbConfig::class);
    }

    protected function setMuKey()
    {
        $this->getCfg()->set(self::MuKey,$this->muKey);
    }

    public function testUsers()
    {
        $this->get('/mu/users', [
            'query' => [
                'key' => $this->muKey,
            ],
            'header' => [
                'Key' => $this->muKey,
            ],
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());

        $this->get('/mu/v2/users', [
            'query' => [
                'key' => $this->muKey,
            ],
            'header' => [
                'Key' => $this->muKey,
            ],
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testLogTraffic()
    {
        $this->post('/mu/users/'.$this->uid.'/traffic', [
            'u' => $this->u,
            'd' => $this->d,
            'node_id' => $this->nodeId,
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());

        $this->post('/mu/v2/users/'.$this->uid.'/traffic', [
            'u' => $this->u,
            'd' => $this->d,
            'node_id' => $this->nodeId,
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());
    }
}
