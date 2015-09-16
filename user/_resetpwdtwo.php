<?php
//设置编码
header("content-type:text/html;charset=utf-8");
//开启session
session_start();
require_once '../lib/config.php';
//引入AES
require_once '../lib/Ss/AES/aes.class.php';
require_once '../lib/Ss/AES/aesctr.class.php';
use Mailgun\Mailgun;
//
$code     = $_POST['code'];
$email    = $_POST['email'];
$uid      = $_POST['uid'];
$password = AesCtr::decrypt($_POST['password'], $_SESSION['randomChar'], 256);
$repasswd = AesCtr::decrypt($_POST['repasswd'], $_SESSION['randomChar'], 256);
//
$ur = new \Ss\User\UserInfo($uid);
if($ur->GetEmail() == $email){
    $rs = '1';
}else{
    $rs = '0';
}
if(!$rs){
    $a['code'] = '0';
    $a['msg']  =  "邮箱错误";
}elseif($repasswd != $password){
    $a['code'] = '0';
    $a['msg'] = "两次密码输入不符";
}elseif(strlen($password)<8){
    $a['code'] = '0';
    $a['msg'] = "密码太短";
}else{
    $rst = new \Ss\User\ResetPwd($uid);
    $u   = new \Ss\User\User($uid);
    if($rst->IsCharOK($code,$uid)){
        $NewPwd = $password;
        //邮件主题
       $Mail_title = $site_name." 提示：您的新密码重置成功！";
        //邮件内容
       $Mail_content ="您在 ".date("Y-m-d H:i:s")." 重置了密码。";
        
         //判断邮件服务
        if($Selectmailservice == "mail-smtp"){
          //mail-smtp
          require '../lib/Ss/Etc/MailSmtp.php';
          $mail = new \Ss\Etc\MailSmtp();
          
              //判断smtp服务器连接方式
              if($mail_smtp_Connection=="1"){
                  $mail->setServer($mail_smtp_Server,$mail_smtp_Account,$mail_smtp_password, $mail_smtp_Port, true); 
              }else{
                  $mail->setServer($mail_smtp_Server,$mail_smtp_Account,$mail_smtp_password); 
              }
                  //设置发件人
                  $mail->setFrom($mail_smtp_Account); 
                  //设置收件人，多个收件人，调用多次
                  $mail->setReceiver($email); 
                  //添加附件，多个附件，调用多次
                  //$mail->addAttachment("XXXX"); 
                  //设置邮件主题、内容 支持发送纯文本邮件和HTML格式的邮件
                  $mail->setMail($Mail_title,$Mail_content); 
                  //发送
                  $mail->sendMail(); //发送
            }else{
                  //mailgun
                  require '../vendor/autoload.php';
                  $mg = new Mailgun($mailgun_key);
                  $domain = $mailgun_domain;   
                   //send
                    # Now, compose and send your message.
                    $mg->sendMessage($domain, array('from'    => "no-reply@".$mailgun_domain,
                        'to'      => $email,
                        'subject' => $Mail_title,
                        'text'    => $Mail_content));
            }
        
        $u->UpdatePWd($NewPwd);
        $rst->Del($code,$uid);
        $a['code'] = '1';
        $a['ok'] = '1';
        $a['msg']  = "您的新密码重置成功！";
    }else{
        $a['code'] = '0';
        $a['msg']  = "链接无效";
    }
}
echo json_encode($a,JSON_UNESCAPED_UNICODE);
?>