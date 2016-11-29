<?php

namespace Tests\Mu;

use Tests\TestCase;

class NodeTest extends TestCase
{
    protected $id = 1;
    protected $load = '0 0 0';
    protected $uptime = '1024';

    protected $count = '1024';

    public function testLogInfo()
    {
        $this->post('/mu/nodes/'.$this->id.'/info', [
            'load' => $this->load,
            'uptime' => $this->uptime,
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testOnlineCount()
    {
        $this->post('/mu/nodes/'.$this->id.'/online_count', [
            'count' => $this->count,
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());
    }
}
