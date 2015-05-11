<?php
//设置编码
header("content-type:text/html;charset=utf-8");
require_once '../lib/config.php';
use Mailgun\Mailgun;
//
$code     = $_GET['code'];
$email    = $_GET['email'];
$uid      = $_GET['uid'];
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
}else{
    $rst = new \Ss\User\ResetPwd($uid);
    $u   = new \Ss\User\User($uid);
    if($rst->IsCharOK($code,$uid)){
        $NewPwd = md5(time().$uid.$email);
        //邮件主题
       $Mail_title = $site_name."您的新密码";
        //邮件内容
       $Mail_content ="您的新密码为:".$NewPwd;
        
         //判断邮件服务
        if($Selectmailservice == "mail-smtp"){
          //mail-smtp
          require '../lib/Ss/mail-smtp.php';
          $mail = new MySendMail();
          
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
        $a['msg']  =  "新密码已经发送到您的邮箱！如果找不到，<br />请到“垃圾箱”找！";
    }else{
        $a['code'] = '0';
        $a['msg']  =  "链接无效";
    }
}
echo json_encode($a);





