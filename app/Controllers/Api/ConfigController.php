<?php


namespace App\Controllers\Api;

use Slim\Http\Request;
use App\Controllers\BaseController;

class ConfigController extends BaseController
{
    public function index(Request $request, $response, $args)
    {
        $data = [

        ];
        return $this->echoJsonWithData($response, $data);
    }
}