<?php

namespace App\Controllers;

use App\Services\Auth;
use App\Services\View;

use Slim\Http\Response;
use Slim\Http\Request;

/**
 * BaseController
 */
class BaseController
{

    protected $view;

    protected $smarty;

    protected $app;


    /**
     * @return \Smarty
     */
    public function smarty()
    {
        $this->smarty = View::getSmarty();
        return $this->smarty;
    }

    /**
     * @return \Smarty
     */
    public function view()
    {
        return $this->smarty();
    }

    /**
     * @param $response
     * @param $res
     * @param int $statusCode
     * @return mixed
     */
    public function echoJson(Response $response, $res, $statusCode = 200)
    {
        $newResponse = $response->withJson($res, $statusCode);
        return $newResponse;
    }

    /**
     * @param $response
     * @param $to
     * @return mixed
     */
    public function redirect(Response $response, $to)
    {
        $newResponse = $response->withStatus(302)->withHeader('Location', $to);
        return $newResponse;
    }
}