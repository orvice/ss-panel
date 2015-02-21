<?php
/*
 * 下面别修改
 */
//medoo
require_once 'class/medoo.class.php';
$db = new medoo([
    // required
    'database_type' => DB_TYPE,
    'database_name' => DB_DBNAME,
    'server' => DB_HOST,
    'username' => DB_USER,
    'password' => DB_PWD,
    'charset' => DB_CHARSET,

    // optional
    'port' => 3306,
    // driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
    'option' => [
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);
//Define DB Table Name
$db_table['user'] = "user";

//Version
$version   ="0.3.9";

//set timezone
date_default_timezone_set('PRC');

//Using Mysqli
$dbc = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
$db_char = DB_CHARSET;
$dbc->query("SET NAMES utf8");
$dbc->query("SET time_zone = '+8:00'");

//定义流量
$tomb = 1024*1024;
$togb = $tomb*1024;

//Define system Path
$ss_path = __DIR__;
$ss_path = substr($ss_path,0,strlen($ss_path)-3);
define('SS_PATH',$ss_path);
//autoload class
spl_autoload_register('autoload');
function autoload($class){
    require_once SS_PATH.'/lib/'.str_replace('\\','/',$class).'.php';
}
