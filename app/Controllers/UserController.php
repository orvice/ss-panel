<?php

namespace App\Controllers;

use App\Models\CheckInLog;
use App\Models\InviteCode;
use App\Models\Node;
use App\Models\TrafficLog;
use App\Services\Auth;
use App\Services\Config;
use App\Services\DbConfig;
use App\Utils\Hash;
use App\Utils\Tools;

function safe_base64_encode($str)
{
    return strtr(rtrim(base64_encode($str), '='), '+/=',
        '-_,');
}

/**
 *  HomeController
 */
class UserController extends BaseController
{

    private $user;

    public function __construct()
    {
        $this->user = Auth::getUser();
    }

    public function view()
    {
        $userFooter = DbConfig::get('user-footer');
        return parent::view()->assign('userFooter', $userFooter);
    }

    public function index($request, $response, $args)
    {
        $msg = DbConfig::get('user-index');
        if ($msg == null) {
            $msg = "在后台修改用户中心公告...";
        }
        return $this->view()->assign('msg', $msg)->display('user/index.tpl');
    }

    public function node($request, $response, $args)
    {
        $msg = DbConfig::get('user-node');
        $user = Auth::getUser();
        $nodes = Node::where('type', 1)->orderBy('sort')->get();

        return $this->view()->assign('nodes', $nodes)->assign('user', $user)->assign('msg',
            $msg)->display('user/node.tpl');
    }


    public function nodeInfo($request, $response, $args)
    {
        $id = $args['id'];
        $node = Node::find($id);

        if ($node == null) {

        }
        $ary['server'] = $node->server;
        $ary['server_port'] = $this->user->port;
        $ary['password'] = $this->user->passwd;
        $ary['method'] = $node->method;
        if ($node->custom_method) {
            $ary['method'] = $this->user->method;
        }
        $json = json_encode($ary);
        $json_show = json_encode($ary, JSON_PRETTY_PRINT);
        $ssurl = $ary['method'].":".$ary['password']."@".$ary['server'].":".$ary['server_port'];
        $ssqr = "ss://".base64_encode($ssurl);

        $surge_base = Config::get('baseUrl')."/downloads/ProxyBase.conf";
        $surge_proxy = "#!PROXY-OVERRIDE:ProxyBase.conf\n";
        $surge_proxy .= "[Proxy]\n";
        $surge_proxy .= "Proxy = custom,".$ary['server'].",".$ary['server_port'].",".$ary['method'].",".$ary['password'].",".Config::get('baseUrl')."/downloads/SSEncrypt.module";

        $ss = $node->ss;
        $ssr = $node->ssr && !$node->add_port_only;
        $ssr_add = $node->ssr && $node->ssr_port != 0;
        $v2ray = $node->v2ray;
        if ($ssr) {
            $aryr['server'] = $node->server;
            $aryr['protocol'] = $node->protocol;
            $aryr['protocol_param'] = $node->protocol_param;
            $aryr['obfs'] = $node->obfs;
            $aryr['obfs_param'] = $node->obfs_param;
            if ($node->custom_rss) {
                $aryr['protocol'] = $this->user->protocol;
                $aryr['protocol_param'] = $this->user->protocol_param;
                $aryr['obfs'] = $this->user->obfs;
                $aryr['obfs_param'] = $this->user->obfs_param;
            }
            $aryr['server_port'] = $this->user->port;
            $aryr['password'] = $this->user->passwd;
            $aryr['method'] = $this->user->method;
            $jsonr = json_encode($aryr);
            $jsonr_show = json_encode($aryr, JSON_PRETTY_PRINT);
            $ssrurl = $aryr['server'].":".$aryr['server_port'].":".$aryr['protocol'].":".$aryr['method'].":".$aryr['obfs'].":".safe_base64_encode($aryr['password'])
                ."/?obfsparam=".safe_base64_encode($aryr['obfs_param'])."&protoparam=".safe_base64_encode($aryr['protocol_param'])."&udpport=1";
            $ssrqr = "ssr://".safe_base64_encode($ssrurl);
        }
        if ($ssr_add) {
            $aryrd['server'] = $node->server;
            $aryrd['server_port'] = $node->ssr_port;
            $aryrd['password'] = $node->add_passwd;
            $aryrd['method'] = $node->add_method;
            $aryrd['protocol'] = $node->protocol;
            $aryrd['protocol_param'] = strval($this->user->port).":".$this->user->passwd;
            $aryrd['obfs'] = $node->obfs;
            $aryrd['obfs_param'] = $node->obfs_param;
            $jsonrd = json_encode($aryrd);
            $jsonrd_show = json_encode($aryrd, JSON_PRETTY_PRINT);
            $ssrdurl = $aryrd['server'].":".$aryrd['server_port'].":".$aryrd['protocol'].":".$aryrd['method'].":".$aryrd['obfs'].":".safe_base64_encode($aryrd['password'])
                ."/?obfsparam=".safe_base64_encode($aryrd['obfs_param'])."&protoparam=".safe_base64_encode($aryrd['protocol_param'])."&udpport=1";
            $ssrdqr = "ssr://".safe_base64_encode($ssrdurl);
        }
		if(empty($this->user->v2ray_uuid)) $v2ray=false;
        if ($v2ray) {
            $arr = [
                "inbound" => [
                    "port" => 1080,
                    "listen" => "127.0.0.1",
                    "protocol" => "socks",
                    "domainOverride" => ["tls", "http"],
                    "settings" => [
                        "auth" => "noauth",
                        "udp" => false,
                        "ip" => "127.0.0.1",
                    ],
                ],
                "outbound" => [
                    "protocol" => "vmess",
                    "settings" => [
                        "vnext" => [
                            [
                                "address" => $node->server,
                                "port" => $node->v2ray_port,
                                "users" => [
                                    [
                                        "id" => $this->user->v2ray_uuid,
                                        "alterId" => $this->user->v2ray_alter_id,
                                    ],
                                ],
                            ],
                        ],
                    ],
                    "streamSettings" => [
                        "network" => $node->v2ray_protocol
                    ]
                ],
                "inboundDetour" => [],
                "outboundDetour" => [
                    [
                        "protocol" => "freedom",
                        "settings" => null,
                        "tag" => "direct",
                    ],
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
                                    "fe80::/10",
                                ],
                                "outboundTag" => "direct",
                            ],
                        ],
                    ],
                ],
            ];
            $ng = [
                "add" => $node->server,
                "aid" => $this->user->v2ray_alter_id,
                "id" => $this->user->v2ray_uuid,
                "net" => $node->v2ray_protocol,
                "port" => $node->v2ray_port,
                "v" => 2,
                "ps" => $node->name,
            ];
            if ($node->v2ray_protocol == 'ws') {
                $arr['outbound']['streamSettings']['wsSettings'] = [
                    'path' => $node->v2ray_path,
                ];
                $ng['path'] = $node->v2ray_path;
            }
            if ($node->v2ray_protocol == 'http') {
                $arr['outbound']['streamSettings']['httpSettings'] = [
                    'path' => $node->v2ray_path,
                ];
                $ng['path'] = $node->v2ray_path;
            }
            if ($node->v2ray_tls) {
                $arr['outbound']['streamSettings']['security'] = 'tls';
                $ng['tls'] = 'tls';
            }
            $jsonv = json_encode($arr);
            $jsonv_show = json_encode($arr, JSON_PRETTY_PRINT);
            $ngqr = "vmess://".base64_encode(json_encode($ng));
            $bfvqr = "bfv://{$node->server}:{$node->v2ray_port}/vmess/1?rtype=lanchina&dns=8.8.8.8&uid={$this->user->v2ray_uuid}&aid={$this->user->v2ray_alter_id}&sec=auto&tcp=header%3Dhttp%26req%3D#".str_replace('+','%20',urlencode($node->name));
        }

        $user = Auth::getUser();
        if ($user->enable) {
            $temp = $this->view()->assign('ss', $ss)->assign('ssr', $ssr)->assign('ssr_add', $ssr_add)->assign('v2ray', $v2ray)
                ->assign('json', $json)->assign('json_show', $json_show)->assign('ssqr', $ssqr)
                ->assign('surge_base', $surge_base)->assign('surge_proxy', $surge_proxy);
            if ($ssr) {
                $temp = $temp->assign('jsonr', $jsonr)->assign('jsonr_show', $jsonr_show)->assign('ssrqr', $ssrqr);
            }
            if ($ssr_add) {
                $temp = $temp->assign('jsonrd', $jsonrd)->assign('jsonrd_show', $jsonrd_show)->assign('ssrdqr', $ssrdqr);
            }
            if ($v2ray) {
                $temp = $temp->assign('jsonv', $jsonv)->assign('jsonv_show', $jsonv_show)->assign('ngqr', $ngqr)->assign('bfvqr', $bfvqr);
            }

            return $temp->display('user/nodeinfo.tpl');
        } else {
            return $this->redirect($response, '/user');
        }
    }

    public function profile($request, $response, $args)
    {
        return $this->view()->display('user/profile.tpl');
    }

    public function edit($request, $response, $args)
    {
        $method = Node::getCustomerMethod();
        $protocol = Node::getProtocolMethod();
        $obfs = Node::getObfsMethod();

        return $this->view()->assign('method', $method)->assign('protocol', $protocol)->assign('obfs',
            $obfs)->display('user/edit.tpl');
    }


    public function invite($request, $response, $args)
    {
        $codes = $this->user->inviteCodes();
        return $this->view()->assign('codes', $codes)->display('user/invite.tpl');
    }

    public function doInvite($request, $response, $args)
    {
        $n = $request->getParam('num');
        if ($n < 1 || $n > $this->user->invite_num) {
            $res['ret'] = 0;
            return $response->getBody()->write(json_encode($res));
        }
        for ($i = 0; $i < $n; $i++) {
            $char = Tools::genRandomChar(32);
            $code = new InviteCode();
            $code->code = $char;
            $code->user_id = $this->user->id;
            $code->save();
        }
        $this->user->invite_num = $this->user->invite_num - $request->getParam('num');
        $this->user->save();
        $res['ret'] = 1;
        return $this->echoJson($response, $res);
    }

    public function sys($request, $response, $args)
    {
        return $this->view()->assign('ana', "")->display('user/sys.tpl');
    }

    public function updatePassword($request, $response, $args)
    {
        $oldpwd = $request->getParam('oldpwd');
        $pwd = $request->getParam('pwd');
        $repwd = $request->getParam('repwd');
        $user = $this->user;
        if (!Hash::checkPassword($user->pass, $oldpwd)) {
            $res['ret'] = 0;
            $res['msg'] = "旧密码错误";
            return $response->getBody()->write(json_encode($res));
        }
        if ($pwd != $repwd) {
            $res['ret'] = 0;
            $res['msg'] = "两次输入不符合";
            return $response->getBody()->write(json_encode($res));
        }

        if (strlen($pwd) < 8) {
            $res['ret'] = 0;
            $res['msg'] = "密码太短啦";
            return $response->getBody()->write(json_encode($res));
        }
        $hashPwd = Hash::passwordHash($pwd);
        $user->pass = $hashPwd;
        $user->save();

        $res['ret'] = 1;
        $res['msg'] = "ok";
        return $this->echoJson($response, $res);
    }

    public function updateSsPwd($request, $response, $args)
    {
        $user = Auth::getUser();
        $pwd = $request->getParam('sspwd');
        if (strlen($pwd) == 0) {
            $pwd = Tools::genRandomChar(8);
        } elseif (strlen($pwd) < 5) {
            $res['ret'] = 0;
            $res['msg'] = "密码要大于4位或者留空生成随机密码";
            return $response->getBody()->write(json_encode($res));;
        }
        $user->updateSsPwd($pwd);
        $res['ret'] = 1;
        $res['msg'] = sprintf("新密码为: %s", $pwd);
        return $this->echoJson($response, $res);
    }

    public function updateMethod($request, $response, $args)
    {
        $user = Auth::getUser();
        $method = $request->getParam('method');
        $method = strtolower($method);
        $user->updateMethod($method);
        $res['ret'] = 1;

        return $this->echoJson($response, $res);
    }

    public function updateProtocol($request, $response, $args)
    {
        $user = Auth::getUser();
        $protocol = $request->getParam('protocol');
        $protocol = strtolower($protocol);
        $user->updateProtocol($protocol);
        $res['ret'] = 1;

        return $this->echoJson($response, $res);
    }

    public function updateProtocolParam($request, $response, $args)
    {
        $user = Auth::getUser();
        $param = $request->getParam('protocol-param');
        $user->updateProtocolParam($param);
        $res['ret'] = 1;

        return $this->echoJson($response, $res);
    }

    public function updateObfs($request, $response, $args)
    {
        $user = Auth::getUser();
        $obfs = $request->getParam('obfs');
        $obfs = strtolower($obfs);
        $user->updateObfs($obfs);
        $res['ret'] = 1;

        return $this->echoJson($response, $res);
    }

    public function updateObfsParam($request, $response, $args)
    {
        $user = Auth::getUser();
        $param = $request->getParam('obfs-param');
        $user->updateObfsParam($param);
        $res['ret'] = 1;

        return $this->echoJson($response, $res);
    }

    public function updateV2rayUUID($request, $response, $args)
    {
        $user = Auth::getUser();
        $user->updateV2rayUUID();
        $res['ret'] = 1;

        return $this->echoJson($response, $res);
    }

    public function updateV2rayAlterID($request, $response, $args)
    {
        $user = Auth::getUser();
        $param = $request->getParam('v2ray-alterid');
        $user->updateV2rayAlterID($param);
        $res['ret'] = 1;

        return $this->echoJson($response, $res);
    }

    public function logout($request, $response, $args)
    {
        Auth::logout();
        $newResponse = $response->withStatus(302)->withHeader('Location', '/auth/login');
        return $newResponse;
    }

    public function doCheckIn($request, $response, $args)
    {
        if (!$this->user->isAbleToCheckin()) {
            $res['msg'] = "您似乎已经签到过了...";
            $res['ret'] = 1;
            return $response->getBody()->write(json_encode($res));
        }
        $traffic = rand(Config::get('checkinMin'), Config::get('checkinMax'));
        $trafficToAdd = Tools::toMB($traffic);
        $this->user->transfer_enable = $this->user->transfer_enable + $trafficToAdd;
        $this->user->last_check_in_time = time();
        $this->user->save();
        // checkin log
        try {
            $log = new CheckInLog();
            $log->user_id = Auth::getUser()->id;
            $log->traffic = $trafficToAdd;
            $log->checkin_at = time();
            $log->save();
        } catch (\Exception $e) {
        }
        $res['msg'] = sprintf("获得了 %u MB流量.", $traffic);
        $res['ret'] = 1;
        return $this->echoJson($response, $res);
    }

    public function kill($request, $response, $args)
    {
        return $this->view()->display('user/kill.tpl');
    }

    public function handleKill($request, $response, $args)
    {
        $user = Auth::getUser();
        $passwd = $request->getParam('passwd');
        // check passwd
        $res = array();
        if (!Hash::checkPassword($user->pass, $passwd)) {
            $res['ret'] = 0;
            $res['msg'] = " 密码错误";
            return $this->echoJson($response, $res);
        }
        Auth::logout();
        $user->delete();
        $res['ret'] = 1;
        $res['msg'] = "GG!您的帐号已经从我们的系统中删除.";
        return $this->echoJson($response, $res);
    }

    public function trafficLog($request, $response, $args)
    {
        $pageNum = 1;
        if (isset($request->getQueryParams()["page"])) {
            $pageNum = $request->getQueryParams()["page"];
        }
        if (isset($args['nid']) && isset($args['nid']) > 0) {
            $node = $args['nid'];
            $traffic = TrafficLog::where('user_id', $this->user->id)->where('node_id', $node)->orderBy('id', 'desc')->paginate(15, ['*'], 'page', $pageNum);
            $traffic->setPath("/user/trafficlog/$node");
            return $this->view()->assign('logs', $traffic)->assign('seleNode', $node)->assign('nodes', Node::all())->display('user/trafficlog.tpl');
        } else {
            $traffic = TrafficLog::where('user_id', $this->user->id)->orderBy('id', 'desc')->paginate(15, ['*'], 'page', $pageNum);
            $traffic->setPath('/user/trafficlog');
            return $this->view()->assign('logs', $traffic)->assign('seleNode', -1)->assign('nodes', Node::all())->display('user/trafficlog.tpl');
        }
    }
}
