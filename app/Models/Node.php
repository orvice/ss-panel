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
            "chacha20" => "chacha20",
            "salsa20" => "salsa20",
            "chacha20-ietf" => "chacha20-ietf",
            "aes-128-gcm" => "aes-128-gcm",
            "aes-192-gcm" => "aes-192-gcm",
            "aes-256-gcm" => "aes-256-gcm",
            "chacha20-ietf-poly1305" => "chacha20-ietf-poly1305",
        ];
    }

    public static function getProtocolMethod()
    {
        return [
            "origin" => "origin",
            "verify_simple" => "verify_simple",
            "verify_sha1" => "verify_sha1",
            "auth_sha1" => "auth_sha1",
            "auth_sha1_v2" => "auth_sha1_v2",
            "auth_sha1_v4" => "auth_sha1_v4",
            "auth_aes128_sha1" => "auth_aes128_sha1",
            "auth_aes128_md5" => "auth_aes128_md5"
        ];
    }

    public static function getObfsMethod()
    {
        return [
            "plain" => "plain",
            "http_simple" => "http_simple",
            "http_post" => "http_post",
            "tls_simple" => "tls_simple",
            "tls1.2_ticket_auth" => "tls1.2_ticket_auth"
        ];
    }
}
