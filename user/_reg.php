<?php
//开启session
session_start();
require_once '../lib/config.php';
//引入AES
require_once '../lib/Ss/AES/aes.class.php';
require_once '../lib/Ss/AES/aesctr.class.php';
$email = $_POST['email'];
$email = strtolower($email);
$passwd = AesCtr::decrypt($_POST['passwd'], $_SESSION['randomChar'], 256);
$name = $_POST['name'];
$repasswd = AesCtr::decrypt($_POST['repasswd'], $_SESSION['randomChar'], 256);
$agree = $_POST['agree'];
$code = $_POST['code'];

$c = new \Ss\User\UserCheck();
$code = new \Ss\User\InviteCode($code);
if(!$code->IsCodeOk()){
    $a['msg'] = "邀请码无效";
}elseif(!$c->IsEmailLegal($email)){
    $a['msg'] = "邮箱无效";
}elseif($c->IsEmailUsed($email)){
    $a['msg'] = "邮箱已被使用";
}elseif($repasswd != $passwd){
    $a['msg'] = "两次密码输入不符";
}elseif(strlen($passwd)<8){
    $a['msg'] = "密码太短";
}elseif(strlen($name)<7){
    $a['msg'] = "用户名太短";
}elseif($c->IsUsernameUsed($name)){
    $a['msg'] = "用户名已经被使用";
}else{
    // get value
    $ref_by = $code->GetCodeUser();
    $passwd = \Ss\User\Comm::SsPW($passwd);
    $plan = "A";
    $transfer = $a_transfer;
    $invite_num = rand($user_invite_min,$user_invite_max);
    //do reg
    $reg = new \Ss\User\Reg();
    $reg->Reg($name,$email,$passwd,$plan,$transfer,$invite_num,$ref_by);
    $code->Del();
    $a['ok'] = '1';
    $a['msg'] = "注册成功";
}
echo json_encode($a,JSON_UNESCAPED_UNICODE);
