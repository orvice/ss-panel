<?php

namespace App\Services\Mail;

use App\Services\Config;
use Mailgun\Mailgun as MailgunService;

class Mailgun
{
    private $config,$mg,$domain,$sender;

    public function __construct(){
        $this->config = $this->getConfig();
        $this->mg = new MailgunService($this->config["key"]);
        $this->domain = $this->config["domain"];
        $this->sender = $this->config["sender"];
    }

    public function getConfig(){
        return [
            "key" => Config::get('mailgun_key'),
            "domain" => Config::get('mailgun_domain'),
            "sender" => Config::get('mailgun_sender')
        ];
    }

    public function send($to,$subject,$text){
        $this->mg->sendMessage($this->domain, array('from'    => $this->sender,
            'to'      => $to,
            'subject' => $subject,
            'text'    => $text));
    }
}