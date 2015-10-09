<?php

use Slim\App;
use App\Controllers;
use App\Middleware\Auth;
use App\Middleware\Guest;

/***
 * The slim documents: http://www.slimframework.com/docs/objects/router.html
 */

$app = new App();
$app->get('/', 'App\Controllers\HomeController:home');
// User Center
$app->group('/user', function () {
    $this->get('/', 'App\Controllers\UserController:home');
})->add(new Auth());

// Auth
$app->group('/auth', function () {
    $this->get('/login', 'App\Controllers\AuthController:login');
    $this->get('/register', 'App\Controllers\AuthController:register');
})->add(new Guest());

// Run Slim Routes for App
$app->run();