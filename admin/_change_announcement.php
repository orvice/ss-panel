<?php
/*
$announcement_name 公告名称
$new_content 新内容
*/
//设置编码
header("content-type:text/html;charset=utf-8");
require_once '../lib/config.php';
require_once '_check.php';
	if (count($_POST)!=null) {
		if (@$_POST['announcement_name']!=null) {
			$announcement_name=$_POST['announcement_name'];
			if ($announcement_name=='index_Announcement') {
				change($announcement_name);
			}elseif ($announcement_name=='index_button') {
				change($announcement_name);
			}elseif ($announcement_name=='index_Custom') {
				change($announcement_name);
			}elseif ($announcement_name=='footer_Announcement') {
				change($announcement_name);
			}elseif ($announcement_name=='tos_content') {
				change($announcement_name);
			}elseif ($announcement_name=='code_Announcement') {
				change($announcement_name);
			}elseif ($announcement_name=='user_index_Announcement') {
				change($announcement_name);
			}elseif ($announcement_name=='user_node_Announcement_node') {
				change($announcement_name);
			}elseif ($announcement_name=='user_node_Announcement_node_pro') {
				change($announcement_name);
			}elseif ($announcement_name=='user_invite_Announcement_color_orange') {
				change($announcement_name);
			}elseif ($announcement_name=='user_invite_Announcement_color_blue') {
				change($announcement_name);
			}
		}else{
			$a['code'] = '0';
        	$a['msg']  =  "没有这个公告名称";
        	echo json_encode($a,JSON_UNESCAPED_UNICODE);
			exit();
		}
}else{
		header("Location: change_announcement.php"); 
}

function change($announcement_name){
global $sqlitedates;
	if (empty($_POST['new_content'])) {
		$a['code'] = '0';
        $a['msg']  =  "内容不能为空！";
	}else{
		$db=$sqlitedates->update_content("announcement",$announcement_name,$_POST['new_content']);
		if ($db) {
			$a['ok'] = '1';
	    	$a['msg']  = "修改成功！";
		}
	}
	echo json_encode($a,JSON_UNESCAPED_UNICODE);
}
?>