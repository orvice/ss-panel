<?php


namespace App\Models;

use App\Utils\Tools;

class TrafficLog extends Model
{
    protected $table = "user_traffic_log";

    public function node()
    {
        return Node::find($this->attributes['node_id']);
    }

    public function totalUsed()
    {
        return Tools::flowAutoShow($this->attributes['u'] + $this->attributes['d']);
    }

    public function logTime()
    {
        return Tools::toDateTime($this->attributes['log_time']);
    }
}