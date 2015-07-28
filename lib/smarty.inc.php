<?php
header("Content-type:text/html;charset=utf-8"); //指定编码
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
// session_start(); //开启session
require_once 'Ss/smarty/Smarty.class.php'; //引用Smarty.class.php
// define("_ROOT_",str_replace("\\","/",dirname(__FILE__)).'/'); //设置路径
define("__ROOT__",str_replace("lib/smarty.inc.php","",str_replace("\\","/",__FILE__))); //设置路径
// echo __ROOT__."<br />";
// echo _ROOT_;
// $templates_dir = "AdminLTE-2"; //模板目录
// $templates_dir = "materialize"; //模板目录
// 读取客户端的cookie templates 
// empty($_COOKIE["templates"]) ? setrawcookie("templates",$templates_dir,time()+3600*24*7,"/") : $templates_dir = $_COOKIE["templates"] ;
// // print_r ($_COOKIE["templates"]);
if (!empty($_COOKIE["templates"])) {
	if ($_COOKIE["templates"] === "materialize") {
		$templates_dir = "materialize";
	}
	if ($_COOKIE["templates"] === "AdminLTE-2") {
		$templates_dir = "AdminLTE-2";
	}else{
		$templates_dir = "materialize";
		setrawcookie("templates",$templates_dir,time()+3600*24*365,"/");
	}
}else{
	$templates_dir = "materialize";
	setrawcookie("templates",$templates_dir,time()+3600*24*365,"/");
}
$smarty=new smarty(); //实例化smarty
$smarty->settemplatedir(__ROOT__."templates/".$templates_dir); //设置模板文件存放目录
$smarty->setcompiledir(__ROOT__."templates_c/".$templates_dir); //设置生成文件存放目录
$smarty->setcachedir(__ROOT__."cache/".$templates_dir); //设置缓存文件存放目录
$smarty->assign('resources_dir',"../templates/".$templates_dir); //设置模板资源(css/js/font/png/gif...)目录
$smarty->addPluginsDir(__ROOT__."myPlugins/"); //自定义插件目录
$smarty->left_delimiter = "<{"; //设置左标示符
$smarty->right_delimiter = "}>"; //设置右标示符
$smarty->auto_literal = false; //是否可留空 false为可为空
// $smarty->caching = true; //是否开启缓存,0、FALSE代表关闭，非0数字、TRUE代表开启。
$smarty->cache_lifetime = -1; //单位为秒 3600 (如果填写-1为永不过期)
$smarty->assign('ana',file_get_contents(__ROOT__."/ana.php")); //读取统计代码,不建议在全局使用，可以在要用的php使用。
// 打开调试控制器
$smarty->debugging = false; // 默认
// 地址：http://localhost/script.php?foo=bar&SMARTY_DEBUG
// 设置开启调试信息的方式。 设置成NONE则不开启调试信息。 URL值意味着当URL参数中有SMARTY_DEBUG关键字则开启调试信息。 如果开启了 $debugging，则本设置将忽略。
$smarty->debugging_ctrl = 'URL';
// 调试控制器模版
$smarty->debug_tpl = __ROOT__.'lib/Ss/smarty/debug.tpl';
//将当前页面的URL(包含?后面的所有参数)进行md5加密,设置缓存文件名
// $url=md5($_SERVER['REQUEST_URI']);