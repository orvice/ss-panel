<?php
//设置编码
header("content-type:text/html;charset=utf-8");
require_once '../config.php';
//mailgun
require '../Ss/Ext/mailgun-php/vendor/autoload.php';
use Mailgun\Mailgun;
$mg = new Mailgun($mailgun_key);
$domain = $mailgun_domain;
//
$code     = $_GET['code'];
$email    = $_GET['email'];
$uid      = $_GET['uid'];
//
$q  = new \Ss\User\Query();
$id = $q->GetUidByEmail($email);
if($id != $uid ){
    $a['code'] = '0';
    $a['msg']  =  "邮箱错误";
}else{
    $rst = new \Ss\User\ResetPwd($uid);
    $u   = new \Ss\User\User($uid);
    if($rst->IsCharOK($code,$uid)){
        $NewPwd = md5(time().$uid.$email);
        $mg->sendMessage($domain, array('from'    => "no-reply@".$mailgun_domain,
            'to'      => $email,
            'subject' => $site_name."您的新密码",
            'text'    => "您的新密码为:".$NewPwd));
        $u->UpdatePWd($NewPwd);
        $rst->Del($code,$uid);
        $a['code'] = '1';
        $a['msg']  =  "新密码已经发送到您的邮箱";
    }else{
        $a['code'] = '0';
        $a['msg']  =  "链接无效";
    }
}
echo json_encode($a);





