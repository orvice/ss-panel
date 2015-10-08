<?php

use Slim\App;
use App\Controllers;

/***
 * The slim documents: http://www.slimframework.com/docs/objects/router.html
 */

$app = new App();
$app->get('/', 'App\Controllers\HomeController:home');
$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

// Run Slim Routes for App
$app->run();