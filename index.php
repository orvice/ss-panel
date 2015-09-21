<?php
include_once 'lib/config.php';
$varsarray = get_defined_vars();
$smarty->assign("index_Announcement",Ss\ac::get('index_Announcement',$varsarray));// 首页公告内容
$smarty->assign("index_button",Ss\ac::get('index_button',$varsarray));// 首页公告按钮
$smarty->assign("index_Custom",Ss\ac::get('index_Custom',$varsarray));// 首页自定义内容
$smarty->display("index.tpl");