<?php
//设置编码
header("content-type:text/html;charset=utf-8");
require_once '../lib/config.php';
use Mailgun\Mailgun;
//
$email    = $_GET['email'];
$c = new \Ss\User\UserCheck();
$q = new \Ss\User\Query();
$a = [];
if($c->IsEmailUsed($email)){
    $uid = $q->GetUidByEmail($email);
    $rst = new \Ss\User\ResetPwd($uid);
    if($rst->IsAbleToReset()){
        $code = $rst->NewLog();
        
       //邮件标题
       $Mail_title = $site_name."重置密码";
       //邮件内容
       $Mail_content = '请访问此链接：<a href="'.$site_url."/user/resetpwd_do.php?code=".$code."&uid=".$uid.'">申请重置密码</a><br />如果不能打开，请复制下面网址到浏览器的地址栏粘贴并按回车！<br />'.$site_url.'/user/resetpwd_do.php?code='.$code.'&uid='.$uid;
       
       
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
                  $mail->sendMail(); 
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
                  'html'    => $Mail_content));
      }
        $a['code'] = '1';
        $a['ok'] = '1';
        $a['msg']  =  "已经发送到邮箱！如果找不到，<br />请到“垃圾箱”找！";
    }else{
        $a['code'] = '1';
        $a['msg']  =  "24小时内申请超过上限";
    }
}else{
    $a['code'] = '0';
    $a['msg']  =  "邮箱不存在";
}
echo json_encode($a);

