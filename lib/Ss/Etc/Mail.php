<?php


namespace Ss\Etc;


class Mail {

    private $sender;


    function __construct(){
        global $sender;
        $this->sender = $sender;
    }

    function sendByMailgun(){

    }

    function sendBySmtp(){
        $mail = new MailSmtp();
        $mail->setFrom($this->sender); //设置发件人
        $mail->setReceiver("xxxx@gmail.com"); //设置收件人，多个收件人，调用多次
        //$mail->addAttachment("XXXX"); //添加附件，多个附件，调用多次
        $mail->setMail("test主题","test内容"); //设置邮件主题、内容 支持发送纯文本邮件和HTML格式的邮件
        $mail->sendMail(); //发送
    }

}