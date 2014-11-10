<?php
/*
 * Database connection info
 * Author @orvice
 * https://orvice.org
 */

//Define DB Connection
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PWD','password');
define('DB_DBNAME','db');
define('DB_CHARSET','utf8');

//Define system Path
define('SS_PATH','');

//name
$site_name = "Shadow X";

//初始化流量
$a_transfer = 3*1024*1024*1024;

//Version
$version   ="0.1.4";

//invite only
$invite_only = false;

//set timezone
date_default_timezone_set('PRC');

//Using Mysqli
$dbc = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
$db_char = DB_CHARSET;
$dbc->query("SET NAMES utf8");