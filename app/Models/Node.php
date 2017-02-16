<?php

namespace App\Models;

/**
 * Node Model
 */

use App\Utils\Tools;

class Node extends Model

{
    protected $table = "ss_node";


    public function getLastNodeInfoLog()
    {
        $id = $this->attributes['id'];
        $log = NodeInfoLog::where('node_id', $id)->orderBy('id', 'desc')->first();
        if ($log == null) {
            return null;
        }
        return $log;
    }

    public function getNodeUptime()
    {
        $log = $this->getLastNodeInfoLog();
        if ($log == null) {
            return "暂无数据";
        }
        return Tools::secondsToTime((int)$log->uptime);
    }

    public function getNodeLoad()
    {
        $log = $this->getLastNodeInfoLog();
        if ($log == null) {
            return "暂无数据";
        }
        return $log->load;
    }

    public function getLastNodeOnlineLog()
    {
        $id = $this->attributes['id'];
        $log = NodeOnlineLog::where('node_id', $id)->orderBy('id', 'desc')->first();
        if ($log == null) {
            return null;
        }
        return $log;
    }

    function getOnlineUserCount()
    {
        $log = $this->getLastNodeOnlineLog();
        if ($log == null) {
            return "暂无数据";
        }
        return $log->online_user;
    }

    function getTrafficFromLogs()
    {
        $id = $this->attributes['id'];
        $traffic = TrafficLog::where('node_id', $id)->sum('u') + TrafficLog::where('node_id', $id)->sum('d');
        if ($traffic == 0) {
            return "暂无数据";
        }
        return Tools::flowAutoShow($traffic);
    }

    public static function getCustomerMethod()
    {
        return [
            "rc4-md5" => "rc4-md5",
            "aes-128-cfb" => "aes-128-cfb",
            "aes-192-cfb" => "aes-192-cfb",
            "aes-256-cfb" => "aes-256-cfb",
            "des-cfb" => "des-cfb",
            "bf-cfb" => "bf-cfb",
            "cast5-cfb" => "cast5-cfb",
            "chacha20" => "chacha20",
            "salsa20" => "salsa20",
        ];
    }

    public static function getProtocol()
    {
        return [
		"origin" => "origin",
		"verify_sha1" => "verify_sha1",
		"auth_sha1_v2" => "auth_sha1_v2",
		"auth_sha1_v4" => "auth_sha1_v4",
		"auth_aes128_md5" => "auth_aes128_md5",
		"auth_aes128_sha1" => "auth_aes128_sha1"
        ];
    }

    public static function getObfs()
    {
        return [
                "plain" => "plain",
                "tls1.2_ticket_auth" => "tls1.2_ticket_auth",
                "tls1.2_ticket_auth_compatible" => "tls1.2_ticket_auth_compatible"
        ];

    }
}
