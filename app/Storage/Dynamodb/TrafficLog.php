<?php


namespace App\Storage\Dynamodb;

use App\Services\Aws\Factory;
use App\Utils\Tools;

class TrafficLog
{
    protected $client;

    protected $tableName = 'token';

    public function __construct()
    {
        $this->client = Factory::createDynamodb();
        $this->tableName = 'traffic_log';
    }

    public function store($u, $d, $nodeId, $userId, $traffic, $rate)
    {
        $id = Tools::genUUID();
        $result = $this->client->putItem(array(
            'TableName' => $this->tableName,
            'Item' => array(
                'id' => array('S' => $id),
                'u' => array('S' => (string)$u),
                'd' => array('N' => (string)$d),
                'node_id' => array('N' => (string)$nodeId),
                'rate' => array('N' => (string)$rate),
                'traffic' => array('S' => (string)$traffic),
                'user_id' => array('N' => (string)$userId),
                'create_at' => array('N' => (string)time()),
                'create_time' => array('S' => Tools::toDateTime(time())),
            )
        ));
        return $id;
    }
}