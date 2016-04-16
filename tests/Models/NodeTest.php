<?php

use App\Models\Node;

class NodeTest extends TestCase
{
    public function testNodeMethod()
    {
        $node = new Node();
        $node->id = 1;

        $node->getLastNodeInfoLog();
        $node->getNodeUptime();
        $node->getNodeLoad();
        $node->getLastNodeOnlineLog();
        $node->getOnlineUserCount();
        $node->getTrafficFromLogs();
    }
}