<?php

use Slim\App;
use App\Controllers;
use App\Middleware\Auth;
use App\Middleware\Guest;

/***
 * The slim documents: http://www.slimframework.com/docs/objects/router.html
 */

$app = new App();

// Home
$app->get('/', 'App\Controllers\HomeController:home');
$app->get('/code', 'App\Controllers\HomeController:code');

// User Center
$app->group('/user', function () {
    $this->get('/', 'App\Controllers\UserController:home');
    $this->get('/node', 'App\Controllers\UserController:node');
    $this->get('/profile', 'App\Controllers\UserController:profile');
    $this->get('/invite', 'App\Controllers\UserController:invite');
    $this->get('/sys', 'App\Controllers\UserController:sys');
    $this->get('/logout', 'App\Controllers\UserController:logout');
})->add(new Auth());

// Auth
$app->group('/auth', function () {
    $this->get('/login', 'App\Controllers\AuthController:login');
    $this->post('/login', 'App\Controllers\AuthController:loginHandle');
    $this->get('/register', 'App\Controllers\AuthController:register');
    $this->post('/register', 'App\Controllers\AuthController:registerHandle');
    $this->get('/logout', 'App\Controllers\AuthController:logout');
})->add(new Guest());

// Run Slim Routes for App
$app->run();