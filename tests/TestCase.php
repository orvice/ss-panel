<?php

use Slim\Http\Environment;
use Slim\HTTP\Request;
use Slim\Http\Response;

class TestCase extends PHPUnit_Framework_TestCase
{
    public $app;

    public $request, $response;

    public function requestFactory($method, $path)
    {
        $environment = Environment::mock([
                'REQUEST_METHOD' => $method,
                'REQUEST_URI' => $path,
                'QUERY_STRING' => 'foo=bar'
            ]
        );
        $request = Request::createFromEnvironment($environment);
        $request->withMethod('GET');
        return $request;
    }

    public function createApp()
    {
        // Build App
        $app = require __DIR__ . '/../app/routes.php';
        $app->run(true);
        return $app;
    }


    public function request($method, $path, $options = array())
    {
        // Build App
        $app = $this->createApp();
        $this->app = $app;
        // Build Req,Res
        $response = new Response();
        $request = $this->requestFactory($method, $path);

        // send Req
        $this->response = $app($request, $response);
    }

    public function get($path, $options = [])
    {
        $this->request('GET', $path, $options);
    }

    public function post($path, $options = [])
    {
        $this->request('POST', $path, $options);
    }

    public function put($path, $options = [])
    {
        $this->request('PUT', $path, $options);
    }

    public function delete($path, $options = [])
    {
        $this->request('DELETE', $path, $options);
    }

}