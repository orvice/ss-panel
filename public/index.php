<?php

//  PUBLIC_PATH
define('PUBLIC_PATH', __DIR__);

// Bootstrap
require PUBLIC_PATH . '/../bootstrap/app.php';

// Build Slim App
$app = require BASE_PATH . '/app/routes.php';

// Run ButterFly!
$app->run();
