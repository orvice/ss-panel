<?php

namespace App\Services\Aws;

use Aws\Sdk;

class Client
{
    /**
     * @codeCoverageIgnore
     */
    public function getClient()
    {
        $sdk = new Sdk([
            'region' => 'us-west-2',
            'version' => 'latest',
            'DynamoDb' => [
                'region' => 'eu-central-1',
            ],
        ]);
    }
}
