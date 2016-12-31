<?php

/***
 * Pontang Framework Bootstrap
 * @author orvice
 * @email pongtan@orx.me
 * @url https://github.com/Pongtan/LightFish
 */

// @todo debug bar support
// use Tracy\Debugger;

$basePath = realpath(__DIR__ . '/../');
require_once __DIR__ . '/../vendor/autoload.php';

try {
    (new Dotenv\Dotenv(__DIR__ . '/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
}

/**
 * New App.
 */
$app = new \Pongtan\App(__DIR__ . '/../');

/*
 * Register Service Provider
 */
$app->register(\Pongtan\Providers\ConfigServiceProvider::class);
$app->register(\Pongtan\Providers\LoggerServiceProvider::class);
$app->register(\Pongtan\Providers\LangServiceProvider::class);
$app->register(\Pongtan\Providers\ViewServiceProvider::class);
$app->register(\Pongtan\Providers\EloquentServiceProvider::class);
$app->register(\Pongtan\Providers\CacheServiceProvider::class);
$app->register(\App\Providers\AuthServiceProvider::class);

require $basePath . '/routes/web.php';


// $app->getContainer()['errorHandler'] = null;
// @todo mv to framework
$c = new \Slim\Container();
$app->getContainer()['errorHandler'] = function ($c) {
    return function ($request, $response, $exception) use ($c) {
        $log = app()->make('log');
        $log->error($exception->getMessage());
        foreach ($exception->getTrace() as $key => $row) {
            if (!isset($row['function']) || !isset($row['line']) || !isset($row['file'])) {
                $log->error(sprintf("#%s %s  %s ", $key, $row['function'], $row['class']));
                continue;
            }
            $log->error(sprintf("#%s %s %s", $key, $row['file'], $row['line']));
        }
        return $c['response']->withStatus(500)
            ->withHeader('Content-Type', 'text/html')
            ->write('Something went wrong!');
    };
};

return $app;
