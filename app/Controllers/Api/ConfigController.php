<?php


namespace App\Controllers\Api;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\BaseController;

class ConfigController extends BaseController
{
    public function index(Request $request, Response $response, $args)
    {
        // @todo
        $data = [
            'app' => 'ss-panel',
            'version' => get_version(),
        ];
        return $this->echoJsonWithData($response, $data);
    }
}