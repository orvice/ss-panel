<?php


namespace App\Services;

use App\Services\Config;
use App\Models\EmailVerify;
use App\Utils\Tools;

/***
 * Class Email
 * @package App\Services
 */

class Email
{
    /**
     * @param $email string
     * @return bool
     */
    public static function sendVerification($email) {
        $ttl = Config::get('emailVerifyTTL');
        $verification = EmailVerify::where('email', '=', $email)->first();
        if($verification == null) {
            $verification = new EmailVerify();
            $verification->email = $email;
        }
        $verification->token = Tools::genRandomChar(Config::get('emailVerifyCodeLength'));
        $verification->expire_at = time() + $ttl * 60;
        if(!$verification->save()) {
            return false;
        }
        $appname = Config::get('appName');
        $subject = $appname.' 邮箱验证';
        $text    = "尊敬的用户：\n您的邮箱验证代码为: {$verification->token}，请在网页中填写，完成验证。\n(本验证代码有效期 $ttl 分钟)\n\n$appname";
        try {
            Mail::send($email, $subject, $text);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * @param string $email
     * @param string $verify_code
     * @return bool
     */
    public static function checkVerifyCode($email, $verify_code) {
        $verification = EmailVerify::where('email', '=', $email)->first();
        if($verification == null || $verification->expire_at < time() || $verification->token !== $verify_code) {
            return false;
        }
        $verification->delete();
        return true;
    }

}