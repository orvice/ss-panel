<?php

namespace App\Services\Mail;

use App\Contracts\Codes\Cfg;
use Mailgun\Mailgun as MailgunService;

class Mailgun extends Base implements Cfg
{
    private $config, $mg, $domain, $sender;

    /**
     * @codeCoverageIgnore
     */
    public function __construct()
    {
        $this->config = $this->getConfig();
        $this->mg = new MailgunService($this->config['key']);
        $this->domain = $this->config['domain'];
        $this->sender = $this->config['sender'];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getConfig()
    {
        return [
            'key' => db_config(self::MailgunKey),
            'domain' => db_config(self::MailgunDomain),
            'sender' => db_config(self::MailgunSender),
        ];
    }

    /**
     * @codeCoverageIgnore
     */
    public function send($to, $subject, $text, $file)
    {
        $this->mg->sendMessage($this->domain,
            [
                'from' => $this->sender,
                'to' => $to,
                'subject' => $subject,
                'html' => $text,
            ],
            [
                'inline' => $file,
            ]
        );
    }
}
