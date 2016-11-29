<?php

namespace App\Services\Mail;

use App\Services\Config;
use SendCloud\SendCloud as SendCloudService;

class SendCloud extends Base
{
    private $config, $sc;

    /**
     * @codeCoverageIgnore
     */
    public function __construct()
    {
        $this->config = $this->getConfig();
        $this->sc = new SendCloudService();
    }

    /**
     * @codeCoverageIgnore
     */
    public function getConfig()
    {
        return [
            'key' => Config::get('sendcloud_key'),
            'user' => Config::get('sendcloud_user'),
            'sender' => Config::get('sendcloud_sender'),
        ];
    }

    /**
     * @codeCoverageIgnore
     */
    public function send($to, $subject, $text, $file)
    {
        $req = $this->sc->prepare('mail', 'send', [
            'apiUser' => $this->config['user'],
            'apiKey' => $this->config['key'],
            'from' => $this->config['sender'],
            'to' => $to,
            'subject' => $subject,
            'html' => $text,
        ]);
        $req->send();
    }
}
