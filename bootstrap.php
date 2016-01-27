<?php

/***
 * ss-panel v3 Bootstrap
 * @author orvice
 * @email sspanel@orx.me
 * @url https://github.com/orvice/ss-panel
 */

use Illuminate\Database\Capsule\Manager as Capsule;
use Dotenv\Dotenv;
use App\Services\Config;

//  BASE_PATH
define('BASE_PATH', __DIR__);

// Vendor Autoload
require BASE_PATH.'/vendor/autoload.php';

// Env
$env = new Dotenv(__DIR__);
$env->load();

// config time zone
date_default_timezone_set($_ENV['timeZone']);

// debug
if ($_ENV['debug'] == "true" ){
    define("DEBUG",true);
}

$_ENV['version'] = '3.0.3';

// db config
$dbConfig = [
    'driver'    => Config::get('db_driver'),
    'host'      => Config::get('db_host'),
    'database'  => Config::get('db_database'),
    'username'  => Config::get('db_username'),
    'password'  => Config::get('db_password'),
    'charset'   => Config::get('db_charset'),
    'collation' => Config::get('db_collation'),
    'prefix'    => Config::get('db_prefix')
];

// Init Eloquent ORM Connection
$capsule = new Capsule;
$capsule->addConnection($dbConfig);
$capsule->bootEloquent();
