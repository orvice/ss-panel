<?php


namespace App\Controllers\Api\Admin;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\BaseController;

class ConfigController extends BaseController
{
    private $cfgs = [
        "appName",
        'checkinMin',
        'checkinMax',
    ];

    public function index(Request $request, Response $response, $args)
    {
        $data = [];
        foreach ($this->cfgs as $cfg) {
            $data[$cfg] = db_config($cfg);
        }
        return $this->echoJsonWithData($response, $data);
    }

    public function update(Request $request, Response $response, $args)
    {

    }
}