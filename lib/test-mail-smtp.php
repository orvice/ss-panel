<?php
//设置编码
header("content-type:text/html;charset=utf-8");
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'config.php';
require 'Ss/mail-smtp.php';

/*
echo "smtp服务器连接方式:". $mail_smtp_Connection."<br />";
echo "smtp服务器端口:".$mail_smtp_Port."<br />";
echo "smtp服务器:".$mail_smtp_Server."<br />";
echo "邮件帐号:".$mail_smtp_Account."<br />";
echo "邮件密码:".$mail_smtp_password."<br />";
*/

$mail = new MySendMail();
if($mail_smtp_Connection=="1"){
  $mail->setServer($mail_smtp_Server,$mail_smtp_Account,$mail_smtp_password, $mail_smtp_Port, true); 
}else{
  $mail->setServer($mail_smtp_Server,$mail_smtp_Account,$mail_smtp_password); 
}
$mail->setFrom($mail_smtp_Account); //设置发件人
$mail->setReceiver("xxxx@gmail.com"); //设置收件人，多个收件人，调用多次
//$mail->addAttachment("XXXX"); //添加附件，多个附件，调用多次
$mail->setMail("test主题","test内容"); //设置邮件主题、内容 支持发送纯文本邮件和HTML格式的邮件
$mail->sendMail(); //发送
?>
