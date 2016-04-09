<?php

namespace App\Utils;

use App\Models\User;
use App\Services\Config;
use DateTime;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class Tools
{

    /**
     * 根据流量值自动转换单位输出
     */
    static function flowAutoShow($value = 0)
    {
        $kb = 1024;
        $mb = 1048576;
        $gb = 1073741824;
        if (abs($value) > $gb) {
            return round($value / $gb, 2) . "GB";
        } else if (abs($value) > $mb) {
            return round($value / $mb, 2) . "MB";
        } else if (abs($value) > $kb) {
            return round($value / $kb, 2) . "KB";
        } else {
            return round($value, 2);
        }
    }


    public static function toMB($traffic)
    {
        $mb = 1048576;
        return $traffic * $mb;
    }

    public static function toGB($traffic)
    {
        $gb = 1048576 * 1024;
        return $traffic * $gb;
    }

    public static function flowToGB($traffic)
    {
        $gb = 1048576 * 1024;
        return $traffic / $gb;
    }

    //获取随机字符串
    public static function genRandomChar($length = 8)
    {
        // 密码字符集，可任意添加你需要的字符
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $char = '';
        for ($i = 0; $i < $length; $i++) {
            $char .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $char;
    }

    public static function genToken()
    {
        return self::genRandomChar(64);
    }


    // Unix time to Date Time
    public static function toDateTime($time)
    {
        return date('Y-m-d H:i:s', $time);
    }

    /**
     * @param $seconds
     * @return mixed
     */
    public static function secondsToTime($seconds)
    {
        $dtF = new DateTime("@0");
        $dtT = new DateTime("@$seconds");
        return $dtF->diff($dtT)->format('%a 天, %h 小时, %i 分 and %s 秒');
    }

    // check html
    static function checkHtml($html)
    {
        $html = stripslashes($html);
        preg_match_all("/<([^<]+)>/is", $html, $ms);
        $searchs[] = '<';
        $replaces[] = '<';
        $searchs[] = '>';
        $replaces[] = '>';
        if ($ms[1]) {
            $allowtags = 'img|a|font|div|table|tbody|caption|tr|td|th|br
						|p|b|strong|i|u|em|span|ol|ul|li|blockquote
						|object|param|embed';//允许的标签
            $ms[1] = array_unique($ms[1]);
            foreach ($ms[1] as $value) {
                $searchs[] = "<" . $value . ">";
                $value = shtmlspecialchars($value);
                $value = str_replace(array('/', '/*'), array('.', '/.'), $value);
                $skipkeys = array(
                    'onabort', 'onactivate', 'onafterprint', 'onafterupdate',
                    'onbeforeactivate', 'onbeforecopy', 'onbeforecut',
                    'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste',
                    'onbeforeprint', 'onbeforeunload', 'onbeforeupdate',
                    'onblur', 'onbounce', 'oncellchange', 'onchange',
                    'onclick', 'oncontextmenu', 'oncontrolselect',
                    'oncopy', 'oncut', 'ondataavailable',
                    'ondatasetchanged', 'ondatasetcomplete', 'ondblclick',
                    'ondeactivate', 'ondrag', 'ondragend',
                    'ondragenter', 'ondragleave', 'ondragover',
                    'ondragstart', 'ondrop', 'onerror', 'onerrorupdate',
                    'onfilterchange', 'onfinish', 'onfocus', 'onfocusin',
                    'onfocusout', 'onhelp', 'onkeydown', 'onkeypress',
                    'onkeyup', 'onlayoutcomplete', 'onload',
                    'onlosecapture', 'onmousedown', 'onmouseenter',
                    'onmouseleave', 'onmousemove', 'onmouseout',
                    'onmouseover', 'onmouseup', 'onmousewheel',
                    'onmove', 'onmoveend', 'onmovestart', 'onpaste',
                    'onpropertychange', 'onreadystatechange', 'onreset',
                    'onresize', 'onresizeend', 'onresizestart',
                    'onrowenter', 'onrowexit', 'onrowsdelete',
                    'onrowsinserted', 'onscroll', 'onselect',
                    'onselectionchange', 'onselectstart', 'onstart',
                    'onstop', 'onsubmit', 'onunload', 'javascript',
                    'script', 'eval', 'behaviour', 'expression',
                    'style', 'class'
                );
                $skipstr = implode('|', $skipkeys);
                $value = preg_replace(array("/($skipstr)/i"), '.', $value);
                if (!preg_match("/^[/|s]?($allowtags)(s+|$)/is", $value)) {
                    $value = '';
                }
                $replaces[] = empty($value) ? '' : "<" . str_replace('"', '"', $value) . ">";
            }
        }
        $html = str_replace($searchs, $replaces, $html);
        $html = addslashes($html);
        return $html;
    }

    public static function genSID()
    {
        $unid = uniqid(Config::get('key'));
        return Hash::sha256WithSalt($unid);
    }

    public static function genUUID()
    {
        try {
            $uuid4 = Uuid::uuid4();
            return $uuid4->toString();
        } catch (UnsatisfiedDependencyException $e) {
            return self::genSID();
        } catch (\Exception $e) {
            return self::genSID();
        }
    }

    public static function getLastPort()
    {
        $user = User::orderBy('port', 'desc')->first();
        if ($user == null) {
            return 1024; // @todo
        }
        return $user->port;
    }
}