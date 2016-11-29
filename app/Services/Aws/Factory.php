<?php

namespace App\Services\Aws;

use Aws\Sdk;
use App\Services\Config;

class Factory
{
    /**
     * @codeCoverageIgnore
     */
    public static function createAwsClient()
    {
        $sdk = new Sdk([
            'credentials' => array(
                'key' => Config::get('aws_access_key_id'),
                'secret' => Config::get('aws_secret_access_key'),
            ),
            'region' => Config::get('aws_region'),
            'version' => 'latest',
            'DynamoDb' => [
                'region' => Config::get('aws_region'),
            ],
            'Ses' => [
                'region' => Config::get('aws_ses_region'),
            ],
        ]);

        return $sdk;
    }

    /**
     * @codeCoverageIgnore
     */
    public static function createDynamodb()
    {
        return self::createAwsClient()->createDynamoDb();
    }

    /**
     * @codeCoverageIgnore
     */
    public static function createSes()
    {
        return self::createAwsClient()->createSes();
    }
}
