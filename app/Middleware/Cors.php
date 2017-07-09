<?php


namespace App\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

class Cors
{
    use Helper;

    public function __invoke(Request $request, Response $response, $next)
    {

    }

    public function getAllowDomainsList()
    {

    }
}