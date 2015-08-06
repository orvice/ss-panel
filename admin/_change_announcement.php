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
				change($announcement_name,$index_Announcement);
			}elseif ($announcement_name=='index_button') {
				change($announcement_name,$index_button);
			}elseif ($announcement_name=='footer_Announcement') {
				change($announcement_name,$footer_Announcement);
			}elseif ($announcement_name=='tos_content') {
				change($announcement_name,$tos_content);
			}elseif ($announcement_name=='code_Announcement') {
				change($announcement_name,$code_Announcement);
			}elseif ($announcement_name=='user_index_Announcement') {
				change($announcement_name,$user_index_Announcement);
			}elseif ($announcement_name=='user_node_Announcement_node') {
				change($announcement_name,$user_node_Announcement_node);
			}elseif ($announcement_name=='user_node_Announcement_node_pro') {
				change($announcement_name,$user_node_Announcement_node_pro);
			}elseif ($announcement_name=='user_invite_Announcement_color_orange') {
				change($announcement_name,$user_invite_Announcement_color_orange);
			}elseif ($announcement_name=='user_invite_Announcement_color_blue') {
				change($announcement_name,$user_invite_Announcement_color_blue);
			}
		}else{
			$a['code'] = '0';
        	$a['msg']  =  "没有这个公告名称";
        	echo json_encode($a);
			exit();
		}
}else{
		header("Location: change_announcement.php"); 
}

function change($announcement_name){
	// 接收提交的内容
	$new_content=$_POST['new_content'];
	// 判断是否有这个文件 
	$file_path="../lib/announcement.php"; 
	if(file_exists($file_path)){ 
		if($fp=fopen($file_path,"a+")){ 
			// 读取文件 
			$conn=fread($fp,filesize($file_path)); 
			// 把' 换成 \'
			$new_content=preg_replace('/\'/',"\'",$new_content); 
			// 替换字符串,把$original_content的内容替换成$new_content的内容。
			$conn=preg_replace('/\$'.$announcement_name.'=\'[\w\W]*?\';/im',
				'\$'.$announcement_name.'=\''.$new_content.'\';',
				$conn);
			// 保存修改结果。
			file_put_contents($file_path, $conn);			
			$a['ok'] = '1';
        	$a['msg']  = "修改成功！";
		}else{ 
			$a['code'] = '0';
        	$a['msg']  =  "文件打不开";
		} 
	}else{ 
		$a['code'] = '0';
        $a['msg']  =  "没有这个文件";
	} 
	// 关闭资源
	fclose($fp);
	echo json_encode($a);
}
?>