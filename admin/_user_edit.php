<?php
require_once '../lib/config.php';
require_once '_check.php';

if(!empty($_POST)){
    $user_uid = $_POST['user_uid'];
    $user_name = $_POST['user_name'];
    if(!empty($_POST['user_pass'])) {
      $user_pass = md5($_POST['user_pass']);
    }else{
      $user_pass = $_POST['user_pass_hidden'];
    }
    if(!empty($_POST['user_email'])) {
      $user_email = $_POST['user_email'];
    }else{
      $user_email = $_POST['user_email_hidden'];
    }
    $user_passwd = $_POST['user_passwd'];
    if(!empty($_POST['transfer_enable'])) {
      $transfer_enable = $togb*$_POST['transfer_enable'];
    }else{
      $transfer_enable = $_POST['transfer_enable_hidden'];
    }
    if(!empty($_POST['invite_num'])) {
      $invite_num = $_POST['invite_num'];
    }else{
      $invite_num = $_POST['invite_num_hidden'];
    }
      
    //更新
    $User = new Ss\User\User($user_uid);
    $query = $User->updateUser($user_name,$user_email,$user_pass,$user_passwd,$transfer_enable,$invite_num);
    if($query){
                $ue['code'] = '1';
                $ue['ok'] = '1';
                $ue['msg'] = "修改成功！即将跳转到用户管理列表！";
    }else{
                $ue['code'] = '0';
                $ue['msg'] = "出现错误:".$query;
    }
}
echo json_encode($ue);
