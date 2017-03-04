<?php

namespace App\Controllers;

use App\Services\Factory;
use Psr\Http\Message\ServerRequestInterface;
//use Psr\Http\Message\ResponseInterface as Response;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\InviteCode;
use App\Utils\Check;
use App\Utils\Http;
use Exception;

/**
 *  HomeController.
 */
class HomeController extends BaseController
{
    public function index()
    {
        return $this->view('index');
    }

    public function code()
    {
        $codes = InviteCode::where('user_id', '=', '0')->take(10)->get();
        return $this->view('code', [
            "codes" => $codes,
        ]);
    }

    public function debug(Request $request, $response, $args)
    {
        $server = [
            'headers' => $request->getHeaders(),
            'content_type' => $request->getContentType(),
            'cookies' => $request->getCookieParams(),
        ];
        $res = [
            'server_info' => $server,
            'ip' => Http::getClientIP(),
            'version' => config('app.version'),
            'reg_count' => Check::getIpRegCount(Http::getClientIP()),
            'e' => Factory::getCache()->has('ez370Y84NT5cBkuxoGHTYR5UqGdlKaS5zwOW515hLoSBG7ogtG5MgGNBdhUprMpn'),
            // 'user' => user(),
        ];
        return $this->echoJson($response, $res);
    }

    public function tos()
    {
        return $this->view('tos');
    }

    public function serverError(){
        throw new Exception("500");
    }


}
