<?php

//  PUBLIC_PATH
define('PUBLIC_PATH', __DIR__);

// Bootstrap
$app = require PUBLIC_PATH.'/../bootstrap/app.php';

// Run ButterFly!
$app->run();
