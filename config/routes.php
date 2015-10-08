<?php

use Slim\App;
use App\Controllers;
use App\Middleware\Auth;

/***
 * The slim documents: http://www.slimframework.com/docs/objects/router.html
 */

$app = new App();
$app->get('/', 'App\Controllers\HomeController:home');
$app->group('/user', function () {
    $this->get('/', 'App\Controllers\UserController:home');
})->add(new Auth());
// Run Slim Routes for App
$app->run();