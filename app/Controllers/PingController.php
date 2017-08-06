<?php

namespace App\Controllers;

use App\Models\CheckInLog;
use App\Models\InviteCode;
use App\Models\TrafficLog;
use App\Models\User;
use App\Models\Node;
use App\Models\NodeInfoLog;
use App\Models\NodeOnlineLog;
use App\Services\Analytics;
use App\Services\Config;
use App\Utils\Tools;
use App\Services\Mail;
use App\Services\Auth;
use App\Services\Factory;

/**
 *  Ping Controller
 */
class PingController extends BaseController
{
    private $user;

    public function __construct()
    {
        $this->user = Auth::getUser();
    }

    public function index($request, $response, $args)
    {
        $nodes = Node::where('type', 1)->orderBy('sort')->get();
        return $this->view()->assign('nodes', $nodes)->display('ping/index.tpl');
    }

    public function launch($request, $response, $args)
    {
        $tokenStr = Tools::genToken();
        $storage = Factory::createTokenStorage();
        $expireTime = time() + 3600 * 24 * 7;
        $node_server = $request->getParam("node");
        $node_data = Node::where('server', $node_server)->first();
        if ($storage->store($tokenStr, $this->user, $expireTime)) {
            $url = "http://127.0.0.1:801/api/jobs";
            $post_data = array(
                "config" => "mu_api_v2_token",
                "website" => Config::getPublicConfig()['baseUrl'] . "/api",
                "token" => $tokenStr,
                "docker" => "cool2645/shadowsocks-pip",
                "node" => $node_server . ":" . ($node_data['custom_method'] ? "custom_method" : $node_data['method']),
                "user_id" => $this->user->id
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // post数据
            curl_setopt($ch, CURLOPT_POST, 1);
            // post的变量
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

            $output = curl_exec($ch);
            return $output;
        } else {
            return json_encode(['ret' => false], true);
        }
    }

    public function status($request, $response, $args)
    {
        $nodes = Node::where('type', 1)->orderBy('sort')->get();
        return $this->view()->assign('nodes', $nodes)->display('ping/status.tpl');

    }

    public function status_proxy($request, $response, $args)
    {
        $url = "http://127.0.0.1:801/api/status?page=" . $request->getParam("page");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);
        return $output;

    }

}
