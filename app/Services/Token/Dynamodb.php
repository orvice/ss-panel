<?php

namespace App\Services\Token;

use App\Models\User;
use App\Services\Aws\Factory;
class Dynamodb extends Base
{
    protected $client;

    protected $tableName = 'token';

    /**
     * @codeCoverageIgnore
     */
    public function __construct()
    {
        $this->client = Factory::createDynamodb();
        $this->tableName = 'token';
    }

    /**
     * @codeCoverageIgnore
     */
    public function store($token, User $user, $expireTime)
    {
        $result = $this->client->putItem(array(
            'TableName' => $this->tableName,
            'Item' => array(
                'token'      => array('S' => $token),
                'user_id'    => array('N' => (string)$user->id),
                'create_time'   => array('N' => (string)time()),
                'expire_time' => array('N' => (string)$expireTime)
            )
        ));
        return true;
    }

    /**
     * @codeCoverageIgnore
     */
    public function delete($token)
    {
        $this->client->deleteItem(array(
            'TableName' => $this->tableName,
            'Key' => array(
                'token'   => array('S' => $token),
            )
        ));
    }

    /**
     * @codeCoverageIgnore
     */
    public function get($token)
    {
        $result = $this->client->getItem(array(
            'ConsistentRead' => true,
            'TableName' => $this->tableName,
            'Key'       => array(
                'token'   => array('S' => $token),
            )
        ));
        $token = new Token();
        $token->token = $result['Item']['token']['S'];
        $token->userId = $result['Item']['user_id']['N'];
        $token->createTime = $result['Item']['create_time']['N'];
        $token->expireTime = $result['Item']['expire_time']['N'];
        return $token;
    }
}