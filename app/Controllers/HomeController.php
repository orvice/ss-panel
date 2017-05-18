<?php

namespace App\Controllers;

//use Psr\Http\Message\ServerRequestInterface as Request;
//use Psr\Http\Message\ResponseInterface as Response;
use Slim\Http\Request;
use Slim\Http\Response;

use App\Models\InviteCode;
use App\Services\Auth;
use App\Services\Config;
use App\Services\DbConfig;
use App\Services\Logger;
use App\Utils\Check;
use App\Utils\Http;
use App\Models\Node;
use App\Models\User;

/**
 *  HomeController
 */
class HomeController extends BaseController
{

    public function index()
    {
        //新加坡
        $node = Node::find("2");
        if ($node == null) {

        }
        $user = User::find("3");

        $ary['server'] = $node->server;
        $ary['server_port'] = $user ->port;
        $ary['password'] = $user ->passwd;
        $ary['method'] = $node->method;
        if ($node->custom_method) {
            $ary['method'] = $user ->method;
        }
        $json = json_encode($ary);
        $json_show = json_encode($ary, JSON_PRETTY_PRINT);
        $ssurl = $ary['method'] . ":" . $ary['password'] . "@" . $ary['server'] . ":" . $ary['server_port'];
        $ssqr = "ss://" . base64_encode($ssurl);

        $homeIndexMsg = DbConfig::get('home-index');
        return $this->view()->assign('homeIndexMsg', $homeIndexMsg)->assign('ssqr', $ssqr)->display('index.tpl');
    }

    public function code()
    {
        $msg = DbConfig::get('home-code');
        $codes = InviteCode::where('user_id', '=', '0')->take(10)->get();
        return $this->view()->assign('codes', $codes)->assign('msg', $msg)->display('code.tpl');
    }

    public function debug($request, $response, $args)
    {
        $server = [
            "headers" => $request->getHeaders(),
            "content_type" => $request->getContentType()
        ];
        $res = [
            "server_info" => $server,
            "ip" => Http::getClientIP(),
            "version" => Config::get('version'),
            "reg_count" => Check::getIpRegCount(Http::getClientIP()),
        ];
        Logger::debug(json_encode($res));
        return $this->echoJson($response, $res);
    }

    public function tos()
    {
        return $this->view()->display('tos.tpl');
    }

    public function postDebug(Request $request,Response $response, $args)
    {
        $res = [
            "body" => $request->getBody(), 
            "params" => $request->getParams() 
        ];
        return $this->echoJson($response, $res);
    }

}
