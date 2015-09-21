<?php
/*
$announcement_name 公告名称
$original_content 原内容
*/
require_once '_main.php';
$announcement_name="";
	if (@$_GET['ca']!=null) {
		$announcement_name=$_GET['ca'];
		if ($announcement_name=='index_Announcement') {
			out($smarty,$announcement_name,"首页公告内容");
		}elseif ($announcement_name=='index_button') {
			out($smarty,$announcement_name,"首页公告按钮");
		}elseif ($announcement_name=='index_Custom') {
			out($smarty,$announcement_name,"首页自定义内容");
		}elseif ($announcement_name=='footer_Announcement') {
			out($smarty,$announcement_name,"用户建议内容");
		}elseif ($announcement_name=='tos_content') {
			out($smarty,$announcement_name,"用户协议内容");
		}elseif ($announcement_name=='code_Announcement') {
			out($smarty,$announcement_name,"邀请码公告内容");
		}elseif ($announcement_name=='user_index_Announcement') {
			out($smarty,$announcement_name,"用户中心公告内容");
		}elseif ($announcement_name=='user_node_Announcement_node') {
			out($smarty,$announcement_name,"普通节点公告内容");
		}elseif ($announcement_name=='user_node_Announcement_node_pro') {
			out($smarty,$announcement_name,"pro节点公告内容");
		}elseif ($announcement_name=='user_invite_Announcement_color_orange') {
			out($smarty,$announcement_name,"橙色公告内容");
		}elseif ($announcement_name=='user_invite_Announcement_color_blue') {
			out($smarty,$announcement_name,"蓝色公告内容");
		}else{
			$announcement_name=null;
			out($smarty,$announcement_name,"","");
			exit();
		}
	}else{
		out($smarty,"index_Announcement","首页公告内容");
	}

function out($smarty,$announcement_name,$announcement_title){
		$original_content = Ss\ac::adminget($announcement_name);
		$smarty->assign('announcement_name',$announcement_name);
		$smarty->assign('original_content',$original_content);
		$smarty->assign('announcement_title',$announcement_title);
		$smarty->display('admin/change_announcement.tpl');
}
?>