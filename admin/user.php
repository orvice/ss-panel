<?php
require_once '_main.php';
$Users = new Ss\User\User();
$us = $Users->AllUser();
$smarty->assign('us',$us);

// 注册自定义插件 获取邀请人
$smarty->registerPlugin('function','get_ref_name','get_ref_name');
function get_ref_name($rs,$content){
    if ($rs['rs'] != 0){
        $ref_u  = new \Ss\User\UserInfo($rs['rs']);
        $ref_name = $ref_u->GetUserName();
    	return $ref_name;
    }else{
    	return '<code class="hoverable">公开</code>';
    }
}
$smarty->display('admin/user.tpl');
?>