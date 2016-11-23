<?php

/***
 * Pontang Framework Bootstrap
 * @author orvice
 * @email pongtan@orx.me
 * @url https://github.com/Pongtan/LightFish
 */
//  BASE_PATH
// define('BASE_PATH', __DIR__ . '/../');
$basePath = realpath(__DIR__ . '/../');
require_once __DIR__.'/../vendor/autoload.php';

try {
    (new Dotenv\Dotenv(__DIR__ . '/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

/**
 * New App
 */
$app = new \Pongtan\App(__DIR__ . '/../');

/**
 * Register Config
 */
$app->registerConfig();
$app->registerLang();
$app->registerEloquent();

require $basePath . "/routes/web.php";
return $app;
