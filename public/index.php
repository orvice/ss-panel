<?php

//  PUBLIC_PATH
define('PUBLIC_PATH', __DIR__);

// Bootstrap
require PUBLIC_PATH . '/../bootstrap.php';

// Build Slim App
$app = require BASE_PATH . '/config/routes.php';

// Run ButterFly!
$app->run();
