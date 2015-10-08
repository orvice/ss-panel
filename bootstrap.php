<?php

use Illuminate\Database\Capsule\Manager as Capsule;

//  BASE_PATH
define('BASE_PATH', __DIR__);

// Vendor Autoload
require BASE_PATH.'/vendor/autoload.php';

// Init App Config
$config = require BASE_PATH.'/config/app.php';
// config time zone
date_default_timezone_set($config['timeZone']);

// Init Eloquent ORM Connection
$capsule = new Capsule;
$capsule->addConnection(require BASE_PATH.'/config/db.php');
$capsule->bootEloquent();