<?php


namespace App\Services\Auth;

use App\Services\Config, App\Services\Mail;
use App\Models\EmailVerify as EmailVerifyModel;
use App\Utils\Tools;

class EmailVerify
{
    /**
     * @param $email string
     * @return bool
     */
    public static function sendVerification($email)
    {
        $ttl = Config::get('emailVerifyTTL');
        $verification = EmailVerifyModel::where('email', '=', $email)->first();
        if ($verification == null) {
            $verification = new EmailVerifyModel();
            $verification->email = $email;
        }
        $verification->token = Tools::genRandomChar(Config::get('emailVerifyCodeLength'));
        $verification->expire_at = time() + $ttl * 60;
        if (!$verification->save()) {
            return false;
        }
        $appname = Config::get('appName');
        $subject = $appname . ' 邮箱验证';
        $text = <<<EOT
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>
  <p>尊敬的用户：</p>
  <p>您的邮箱验证代码为: <b>{$verification->token}</b>，请在网页中填写，完成验证。<br>(本验证代码有效期 $ttl 分钟)</p><br>
  <p>$appname</p>
</body>
</html>
EOT;
        try {
            Mail::send($email, $subject, $text, true);
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
    public static function checkVerifyCode($email, $verify_code)
    {
        $verification = EmailVerifyModel::where('email', '=', $email)->first();
        if ($verification == null || $verification->expire_at < time() || $verification->token !== $verify_code) {
            return false;
        }
        $verification->delete();
        return true;
    }
}