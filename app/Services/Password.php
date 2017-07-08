<?php

namespace App\Services;

use App\Contracts\Codes\Cfg;
use App\Models\PasswordReset;
use App\Utils\Tools;
use App\Contracts\MailService;
use Exception;

/***
 * Class Password
 * @package App\Services
 */
class Password implements Cfg
{
    /**
     * @var MailService
     */
    private $mail;

    public function __construct()
    {
        $this->mail = $this->getMailService();
    }

    /**
     * @return MailService
     */
    private function getMailService()
    {
        return app()->make(MailService::class);
    }

    /**
     * @param $email string
     *
     * @return bool
     */
    public function sendResetEmail($email)
    {
        $pwdRst = new PasswordReset();
        $pwdRst->email = $email;
        $pwdRst->init_time = time();
        $pwdRst->expire_time = time() + 3600 * 24; // @todo
        $pwdRst->token = Tools::genRandomChar(64);
        if (!$pwdRst->save()) {
            return false;
        }
        $subject = sprintf("%s   %s", db_config(self::AppName), lang('auth.reset-password'));
        $resetUrl = self::genUri($pwdRst->token);
        try {
            // @todo trans email template
            $template = 'email/password/reset';
            $this->mail->send($email, $subject, $template, [
                'subject' => $subject,
                'resetUrl' => $resetUrl
            ]);
        } catch (Exception $e) {
            throw $e;
        }

        return true;
    }

    public static function resetBy($token, $password)
    {
    }

    public static function genUri($token)
    {
        $uri = db_config(self::AppUri);
        return sprintf("%s/password/%s", rtrim($uri,'/'), $token);
    }
}
