<?php

namespace Tests\Admin;

use App\Models\Node;
use Tests\TestCase;

class NodeTest extends TestCase
{
    protected $name = 'name';
    protected $server = 'server.me';
    protected $method = 'rc4-md5';
    protected $customMethod = '1';
    protected $rate = '1';
    protected $info = 'info';
    protected $type = '1';
    protected $status = '1';
    protected $sort = '1';

    protected function getFirstNode()
    {
        return Node::first();
    }

    protected function getLastNode()
    {
        return Node::orderBy('id', 'DESC')->first();
    }

    public function testNodeList()
    {
        $this->get('/admin/node');
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testNodeCreate()
    {
        $this->get('/admin/node/create');
        $this->assertEquals('200', $this->response->getStatusCode());

        $this->post('/admin/node', [
            'name' => $this->name,
            'server' => $this->server,
            'method' => $this->method,
            'custom_method' => $this->customMethod,
            'rate' => $this->rate,
            'info' => $this->info,
            'type' => $this->type,
            'status' => $this->status,
            'sort' => $this->sort,
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testNodeEdit()
    {
        $this->get('/admin/node/'.$this->getFirstNode()->id.'/edit');
        $this->assertEquals('200', $this->response->getStatusCode());

        $this->put('/admin/node/'.$this->getFirstNode()->id, [
            'name' => $this->name,
            'server' => $this->server,
            'method' => $this->method,
            'custom_method' => $this->customMethod,
            'rate' => $this->rate,
            'info' => $this->info,
            'type' => $this->type,
            'status' => $this->status,
            'sort' => $this->sort,
        ]);
        $this->assertEquals('200', $this->response->getStatusCode());
    }

    public function testDelete()
    {
        $this->testNodeCreate();
        $this->get('/admin/node/'.$this->getLastNode()->id.'/delete');
        $this->assertEquals('302', $this->response->getStatusCode());

        $this->testNodeCreate();
        $this->delete('/admin/node/'.$this->getLastNode()->id);
        $this->assertEquals('200', $this->response->getStatusCode());
    }
}
