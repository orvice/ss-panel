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
            "aes-128-gcm" => "aes-128-gcm",
            "aes-192-gcm" => "aes-192-gcm",
            "aes-256-gcm" => "aes-256-gcm",
            "chacha20-ietf-poly1305" => "chacha20-ietf-poly1305",
            "chacha20-ietf" => "chacha20-ietf",
            "salsa20" => "salsa20",
            "chacha20" => "chacha20",
            "aes-128-cfb" => "aes-128-cfb",
            "aes-192-cfb" => "aes-192-cfb",
            "aes-256-cfb" => "aes-256-cfb",
            "aes-128-ctr" => "aes-128-ctr",
            "aes-192-ctr" => "aes-192-ctr",
            "aes-256-ctr" => "aes-256-ctr",
            "camellia-128-cfb" => "camellia-128-cfb",
            "camellia-192-cfb" => "camellia-192-cfb",
            "camellia-256-cfb" => "camellia-256-cfb",
            "bf-cfb" => "bf-cfb",
            "rc4-md5" => "rc4-md5",
            "rc4" => "rc4",
            "table" => "table",
            "none" => "none",
        ];
    }

    public static function getSSRMethod()
    {
        return [
            "none" => "none",
            "table" => "table",
            "rc4" => "rc4",
            "rc4-md5" => "rc4-md5",
            "aes-128-cfb" => "aes-128-cfb",
            "aes-192-cfb" => "aes-192-cfb",
            "aes-256-cfb" => "aes-256-cfb",
            "aes-128-ctr" => "aes-128-ctr",
            "aes-192-ctr" => "aes-192-ctr",
            "aes-256-ctr" => "aes-256-ctr",
            "bf-cfb" => "bf-cfb",
            "camellia-128-cfb" => "camellia-128-cfb",
            "camellia-192-cfb" => "camellia-192-cfb",
            "camellia-256-cfb" => "camellia-256-cfb",
            "chacha20" => "chacha20",
            "salsa20" => "salsa20",
            "chacha20-ietf" => "chacha20-ietf",
        ];
    }

    public static function getProtocolMethod()
    {
        return [
            "origin" => "origin",
            "verify_sha1" => "verify_sha1",
            "auth_sha1" => "auth_sha1",
            "auth_sha1_v2" => "auth_sha1_v2",
            "auth_sha1_v4" => "auth_sha1_v4",
            "auth_aes128_sha1" => "auth_aes128_sha1",
            "auth_aes128_md5" => "auth_aes128_md5",
            "auth_chain_a" => "auth_chain_a",
            "auth_chain_b" => "auth_chain_b",
            "auth_chain_c" => "auth_chain_c",
            "auth_chain_d" => "auth_chain_d",
            "auth_chain_e" => "auth_chain_e",
            "auth_chain_f" => "auth_chain_f"
        ];
    }

    public static function getObfsMethod()
    {
        return [
            "plain" => "plain",
            "http_simple" => "http_simple",
            "http_post" => "http_post",
            "random_head" => "random_head",
            "tls1.2_ticket_auth" => "tls1.2_ticket_auth"
        ];
    }

    public static function getV2rayProtocol()
    {
        return [
            "TCP" => "tcp",
            "mKCP" => "kcp",
            "WebSocket" => "ws",
            "HTTP/2" => "http",
            "DomainSocket" => "domainsocket",
        ];
    }
}
