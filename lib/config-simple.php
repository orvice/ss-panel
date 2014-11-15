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

//Version
$version   ="0.1.6";

//invite only
$invite_only = true;

//set timezone
date_default_timezone_set('PRC');

//Using Mysqli
$dbc = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
$db_char = DB_CHARSET;
//设置编码和时区
$dbc->query("SET NAMES utf8");
$dbc->query("SET time_zone = ‘+8:00′");

//定义流量
$tomb = 1024*1024;
$togb = $tomb*1024;

//define Plan
$a_transfer = $togb*30 ;
