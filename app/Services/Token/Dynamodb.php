<?php

namespace App\Services\Token;

use App\Models\User;
use App\Services\Aws\Factory;
class Dynamodb extends Base
{
    protected $client;

    protected $tableName = 'token';

    public function __construct()
    {
        $this->client = Factory::createDynamodb();
        $this->tableName = 'token';
    }

    public function store($token, User $user, $expireTime)
    {
        $result = $this->client->putItem(array(
            'TableName' => $this->tableName,
            'Item' => array(
                'token'      => array('S' => $token),
                //'user_id'    => array('S' => $user->id),
                //'create_time'   => array('N' => time()),
                //'expire_time' => array('N' => (int)$expireTime)
            )
        ));
        return true;
    }

    public function delete($token)
    {
        $this->client->deleteItem(array(
            'TableName' => $this->tableName,
            'Key' => array(
                'token'   => array('S' => $token),
            )
        ));
    }

    public function get($token)
    {
        // TODO: Implement get() method.
    }
}