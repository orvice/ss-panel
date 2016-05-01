<?php

namespace Tests;

use PHPUnit_Framework_TestCase;
use App\Services\Config;
use Slim\Http\Environment;
use Slim\HTTP\Request;
use Slim\Http\Response;

class TestCase extends PHPUnit_Framework_TestCase
{
    public $app;

    public $request, $response;


    public function requestFactory($method, $path, $options)
    {
        $query = [];
        if (isset($options['query'])) {
            $query = $options['query'];
        }
        $environment = Environment::mock([
                'REQUEST_METHOD' => $method,
                'REQUEST_URI' => $path,
                'QUERY_STRING' => http_build_query($query)
            ]
        );
        $request = Request::createFromEnvironment($environment);
        $request->withMethod($method);
        $request->withQueryParams($query);
        if (isset($options['header'])) {
            foreach ($options['header'] as $key => $value) {
                $request->withHeader($key, $value);
            }
        }
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