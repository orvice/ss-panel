<?php

namespace App\Utils;

use Shadowsocks\Shadowsocks;
use Shadowsocks\ShadowsocksR;
use Shadowsocks\UtilTrait;

class Ss
{

    use UtilTrait;

    public static function genSsAry($server, $port, $pwd, $method)
    {
        $arr = [
            'server' => $server,
            'server_port' => $port,
            'password' => $pwd,
            'method' => $method,
        ];

        return $arr;
    }


    /**
     * @return array
     */
    public static function getCipher()
    {
        return Shadowsocks::Cipher;
    }

    /**
     * @return array
     */
    public static function getProtocol()
    {
        return ShadowsocksR::Protocol;
    }

    /**
     * @return array
     */
    public static function getObfs()
    {
        return ShadowsocksR::Obfs;
    }
}
