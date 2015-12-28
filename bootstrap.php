<?php

/***
 * ss-panel v3 Bootstrap
 * @author orvice
 * @email sspanel@orx.me
 * @url https://github.com/orvice/ss-panel
 */

use Illuminate\Database\Capsule\Manager as Capsule;
use Dotenv\Dotenv;

//  BASE_PATH
define('BASE_PATH', __DIR__);

// Vendor Autoload
require BASE_PATH.'/vendor/autoload.php';

// Env
$env = new Dotenv(__DIR__);
$env->load();

// config time zone
date_default_timezone_set($_ENV['timeZone']);

// Init Eloquent ORM Connection
$capsule = new Capsule;
$capsule->addConnection(require BASE_PATH.'/config/db.php');
$capsule->bootEloquent();
