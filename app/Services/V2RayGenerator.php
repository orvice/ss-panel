<?php
namespace App\Services;
use App\Utils\EmptyClass;

class V2rayGenerator
{
    private $arr = [
        "log" => [
            "access" => "/var/log/access.log",
            "error" => "/var/log/error.log",
            "loglevel" => "warning"
        ],
        "inbound" => [
            "port" => 8300,
            "protocol" => "vmess",
            "settings" => [
                "clients" => [
                ]
            ]
        ],
        "outbound" => [
            "protocol" => "freedom",
            // "settings" => ,
        ],
        "inboundDetour" => [],
        "outboundDetour" => [
            [
                "protocol" => "blackhole",
                // "settings" => [],
                "tag" => "blocked"
            ]
        ],
        "routing" => [
            "strategy" => "rules",
            "settings" => [
                "rules" => [
                    [
                        "type" => "field",
                        "ip" => [
                            "0.0.0.0/8",
                            "10.0.0.0/8",
                            "100.64.0.0/10",
                            "127.0.0.0/8",
                            "169.254.0.0/16",
                            "172.16.0.0/12",
                            "192.0.0.0/24",
                            "192.0.2.0/24",
                            "192.168.0.0/16",
                            "198.18.0.0/15",
                            "198.51.100.0/24",
                            "203.0.113.0/24",
                            "::1/128",
                            "fc00::/7",
                            "fe80::/10"
                        ],
                        "outboundTag" => "blocked"
                    ]
                ]
            ]
        ]
    ];
    public function addUser($uuid, $level, $alertId, $email)
    {
        $user = [
            "id" => $uuid,
            "level" => $level,
            "alterId" => $alertId,
            "email" => $email
        ];
        array_push($this->arr["inbound"]['settings']['clients'], $user);
    }
    public function setPort($port)
    {
        $this->arr['inbound']['port'] = $port;
    }
    public function getArr()
    {
        return $this->arr;
    }
    public function __construct()
    {
        $this->arr["outbound"]["settings"] = new EmptyClass();
        $this->arr["outboundDetour"][0]["settings"] = new EmptyClass();
    }
}