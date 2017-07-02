<?php

namespace App\Services\Config;

use App\Services\Factories\Redis;
use App\Services\Factory as F;

class DbConfig
{
    /**
     * @var \Predis\Client
     */
    private $redis;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    public $logger;

    /**
     * @var ModelConfigInterface
     */
    private $db;

    private $keyPrefix = 'db_config_';

    /**
     * @param $key
     *
     * @return string
     */
    private function genKey($key)
    {
        return $this->keyPrefix . $key;
    }

    public function __construct()
    {
        $this->redis = Redis::getConfigRedis();
        $this->db = Factory::newMysqlConfig();
        $this->logger = F::getLogger();
    }

    /**
     * @param $key
     * @param $default
     * @return string
     */
    public function get($key, $default = '')
    {
        if ($this->redis->exists($this->genKey($key)) > 0) {
            $v = $this->redis->get($this->genKey($key));
            $this->logger->info("get config $key from cache $v");
            if (!$v) {
                return $default;
            }
            return $v;
        }

        $value = $this->db->get($key);
        $this->logger->info("get config $key from db $value");
        $this->redis->set($this->genKey($key), $value);
        if (!$value) {
            return $default;
        }

        return $value;
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->db->set($key, $value);
        $this->redis->set($this->genKey($key), $value);
    }

    public function flushAll()
    {
    }
}
