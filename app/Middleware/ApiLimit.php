<?php


namespace App\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

class ApiLimit
{
    use Helper;

    public function __construct()
    {
        $this->init();
    }

    public function __invoke(Request $request, Response $response, $next)
    {

    }
}