<?php

namespace App\Controllers;

//use Psr\Http\Message\ServerRequestInterface as Request;
//use Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Support\Facades\Redirect;
use Slim\Http\Request;
use Slim\Http\Response;

use App\Models\InviteCode;
use App\Models\Node;
use App\Services\Auth;
use App\Services\Config;
use App\Services\DbConfig;
use App\Services\Logger;
use App\Utils\Check;
use App\Utils\Http;

/**
 *  HomeController
 */
class HomeController extends BaseController
{
    public function reCaptcha()
    {
        return $this->view()->display('reCaptcha.tpl');
    }

    public function handleReCaptcha(Request $request,Response $response, $args)
    {
        $params = $request->getParams();
        $g_res = $params['g-recaptcha-response'];
        $data = [];
        $data['secret'] = Config::get('reCaptchaKey');
        $data['response'] = $g_res;
        $data['remoteip'] = Http::getClientIP();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://recaptcha.net/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
//set cacert.pem verisign certificate path in curl using 'CURLOPT_CAINFO' field here,
//if your server does not bundled with default verisign certificates.
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: recaptcha.net"));
        $res = curl_exec($ch);
        curl_close($ch);
        $res = json_decode($res);
        //return $this->echoJson($response, json_encode([$data, $res]));
        if($res->success) {
            $time = 15 * 60;
            Auth::authReCaptcha(Http::getClientIP(), $time);
            Logger::info("ip" . Http::getClientIP() . " passed reCaptcha");
        }
        return $response->withStatus(302)->withHeader('Location', '/');
    }

    public function index()
    {
        $homeIndexMsg = DbConfig::get('home-index');
        return $this->view()->assign('homeIndexMsg', $homeIndexMsg)->display('index.tpl');
    }

    public function code()
    {
        $msg = DbConfig::get('home-code');
        $codes = InviteCode::where('user_id', '=', '0')->take(10)->get();
        return $this->view()->assign('codes', $codes)->assign('msg', $msg)->display('code.tpl');
    }

    public function node()
    {
        $nodes = Node::where('type', 1)->orderBy('sort')->get();
        return $this->view()->assign('nodes', $nodes)->display('node.tpl');
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

    public function scs()
    {
        return $this->view()->display('scs.tpl');
    }

    public function start()
    {
        return $this->view()->display('start.tpl');
    }

    public function client()
    {
        return $this->view()->display('client.tpl');
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