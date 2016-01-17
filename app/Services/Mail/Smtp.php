<?php


namespace App\Services\Mail;

use PHPMailer;
use App\Services\Config;

class Smtp
{

    private $mail,$config;

    public function __construct(){
        $this->config = $this->getConfig();
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = $this->config['host'];  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $this->config['username'];                 // SMTP username
        $mail->Password = 'secret';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = $this->config['port'];                                    // TCP port to connect to
        $mail->setFrom($this->config['sender'], $this->config['name']);
        $this->mail = $mail;
    }

    public function getConfig(){
        return [
            "host" => Config::get('smtp_host'),
            "username" => Config::get('smtp_username'),
            "port" => Config::get('smtp_port'),
            "sender" => Config::get('smtp_sender'),
            "name" => Config::get('smtp_name')
        ];
    }

    public function send($to,$subject,$text){
        $mail = $this->mail;
        $mail->addAddress($to);     // Add a recipient
        // $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $text;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        if(!$mail->send()) {
            // @TODO
        } else {
            // @TODO
        }
    }

}