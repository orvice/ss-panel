<?php

namespace App\Services\Config;

use App\Services\Factories\Redis;

class DbConfig
{
    /**
     * @var \Predis\Client
     */
    private $redis;

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
    }

    /**
     * @param $key
     *
     * @return string
     */
    public function get($key)
    {
        $v = $this->redis->get($this->genKey($key));
        if ($v) {
            return $v;
        }
        $value = $this->db->get($key);
        $this->redis->set($this->genKey($key), $value);

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
