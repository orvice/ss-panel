<?php


namespace App\Controllers\Api\Admin;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\BaseController;
use App\Contracts\Codes\Cfg;

class ConfigController extends BaseController implements Cfg
{
    private $cfgs = [
        self::AppName,
        self::CheckInMin,
        self::CheckInMax,
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