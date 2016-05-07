<?php

namespace Tests;

use App\Services\Config;
use PHPUnit_Framework_TestCase;
use Slim\Http\Body;
use Slim\Http\Environment;
use Slim\Http\Headers;
use Slim\HTTP\Request;
use Slim\Http\Response;
use Slim\Http\Uri;

class TestCase extends PHPUnit_Framework_TestCase
{
    public $app;

    public $request, $response;

    public function setUp()
    {
        $this->setTestingEnv();
    }

    /**
     * @param $method
     * @param $path
     * @param $options
     * @return Request
     */
    protected function requestFactory($method, $path, $options)
    {
        $uri = Uri::createFromString($path);
        $headers = new Headers();
        $cookies = [];
        $env = Environment::mock();
        $serverParams = $env->all();
        $body = new Body(fopen('php://temp', 'r+'));
        $request = new Request($method, $uri, $headers, $cookies, $serverParams, $body);
        return $request;
    }

    public function createApp()
    {
        // Build App
        $app = require __DIR__ . '/../app/routes.php';
        $app->run(true);
        return $app;
    }

    public function request($method, $path, $options = [])
    {
        // Build App
        $app = $this->createApp();
        $this->app = $app;
        // Build Req,Res
        $response = new Response();

        $request = $this->requestFactory($method, $path, $options);

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

    /**
     * Set env in prod
     */
    public function setProdEnv()
    {
        Config::set('env', 'prod');
    }

    /**
     * Set testing env
     */
    public function setTestingEnv()
    {
        Config::set('env', 'testing');
    }

}