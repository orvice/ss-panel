<?php
/*
 * Database connection info
 * Author @orvice
 * https://orvice.org
 */

//Define DB Connection
define('DB_HOST','localhost');
define('DB_USER','shadow');
define('DB_PWD','shadow');
define('DB_DBNAME','shadow');
define('DB_CHARSET','utf8');

//Define system Path
define('SS_PATH','');

//name
$site_name = "Shadow X";

//初始化流量
$a_transfer = 30000000000;

//Version
$version   ="0.1.3";

//invite only
$invite_only = false;

//set timezone
date_default_timezone_set('PRC');

//Using Mysqli
$dbc = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
$db_char = DB_CHARSET;
$dbc->query("SET NAMES utf8");