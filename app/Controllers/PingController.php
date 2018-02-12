<?php

namespace App\Controllers;

use App\Models\Node;
use App\Services\Auth;
use App\Services\DbConfig;

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

    public function view()
    {
        $userFooter = DbConfig::get('user-footer');
        return parent::view()->assign('userFooter', $userFooter);
    }

    public function index($request, $response, $args)
    {
        $active = $this->user->enable;
        $nodes = Node::where('type', 1)->orderBy('sort')->get();
        return $this->view()->assign('nodes', $nodes)->assign('active', $active)->display('user/ping.tpl');
    }

    public function launch($request, $response, $args)
    {
        $node_server = $request->getParam("node");
        $node = Node::where('server', $node_server)->first();
        $ary['server'] = $node->server;
        $ary['server_port'] = $this->user->port;
        $ary['password'] = $this->user->passwd;
        $ary['method'] = $node->method;
        if ($node->custom_method) {
            $ary['method'] = $this->user->method;
        }
        $json = json_encode($ary);
        $url = "https://stat.2645net.work/api/task";
        $post_data = array(
            "class" =>"tester",
            "server_name" => $node->name,
            "ip_ver" => 6,
            "ss_json" => $json,
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // post数据
        curl_setopt($ch, CURLOPT_POST, 1);
        // post的变量
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));

        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

}
