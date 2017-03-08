<?php

/***
 * Pontang Framework Bootstrap
 * @author orvice
 * @email pongtan@orx.me
 * @url https://github.com/Pongtan/LightFish
 */

// define("VERSION", '4.0.0');

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
$app->register(\App\Providers\TokenStorageServiceProvider::class);

require $basePath . '/routes/web.php';

return $app;
