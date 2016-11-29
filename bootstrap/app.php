<?php

/***
 * Pontang Framework Bootstrap
 * @author orvice
 * @email pongtan@orx.me
 * @url https://github.com/Pongtan/LightFish
 */
//  BASE_PATH
// define('BASE_PATH', __DIR__ . '/../');
$basePath = realpath(__DIR__.'/../');
require_once __DIR__.'/../vendor/autoload.php';

try {
    (new Dotenv\Dotenv(__DIR__.'/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
}

/**
 * New App.
 */
$app = new \Pongtan\App(__DIR__.'/../');

/*
 * Register Service Provider
 */
$app->register(\Pongtan\Providers\ConfigServiceProvider::class);
$app->register(\Pongtan\Providers\LoggerServiceProvider::class);
$app->register(\Pongtan\Providers\LangServiceProvider::class);
$app->register(\Pongtan\Providers\ViewServiceProvider::class);
$app->register(\Pongtan\Providers\EloquentServiceProvider::class);

require $basePath.'/routes/web.php';

return $app;
