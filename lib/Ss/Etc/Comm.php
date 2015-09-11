<?php

namespace Ss\Etc;


class Comm {


    private $kb = 1024, $mb = 1048576, $gb = 1073741824;

    // to kb mb gb
    static function toKB($value){
        return $value/1024;
    }

    static function toMB($value){
        return $value/(1024*1024);
    }

    static function toGB($value){
        return $value/(1024*1024*1024);
    }


    //Gravatar
    static function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
        //$url = 'http://gravatar.duoshuo.com/avatar/';
        $url = 'https://cdn.css.net/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }

    //获取随机字符串
    static function get_random_char( $length = 8 ) {
        // 密码字符集，可任意添加你需要的字符
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $char = '';
        for ( $i = 0; $i < $length; $i++ )
        {
            $char .= $chars[ mt_rand(0, strlen($chars) - 1) ];
        }
        return $char;
    }

    static function ToDateTime($time){
        return date('Y-m-d H:i:s',$time);
    }

    /**
     * 根据流量值自动转换单位输出
     * @author   eaves chen<leaves615@gmail.com>
     * @param $value 流量值
     */

    static function flowAutoShow($value){
        global $tokb, $tomb, $togb;
        if ($value > $togb) {
            echo round($value/$togb, 2);
            echo "GB";
        }
        else if ($value > $tomb) {
            echo round($value/$tomb, 2);
            echo "MB";
        }
        else if ($value > $tokb) {
            echo round($value/$tokb, 2);
            echo "KB";
        } else{
            echo round($value, 2);
            echo "";
        }
    }

    static function checkHtml($html) {
        $html = stripslashes($html);

        preg_match_all("/<([^<]+)>/is", $html, $ms);
        $searchs[] = '<';
        $replaces[] = '<';
        $searchs[] = '>';
        $replaces[] = '>';
        if($ms[1]) {
            $allowtags = 'img|a|font|div|table|tbody|caption|tr|td|th|br
						|p|b|strong|i|u|em|span|ol|ul|li|blockquote
						|object|param|embed';//允许的标签
            $ms[1] = array_unique($ms[1]);
            foreach ($ms[1] as $value) {
                $searchs[] = "<".$value.">";
                $value = shtmlspecialchars($value);
                $value = str_replace(array('/','/*'), array('.','/.'), $value);
                $skipkeys = array(
                    'onabort','onactivate','onafterprint','onafterupdate',
                    'onbeforeactivate','onbeforecopy','onbeforecut',
                    'onbeforedeactivate','onbeforeeditfocus','onbeforepaste',
                    'onbeforeprint','onbeforeunload','onbeforeupdate',
                    'onblur','onbounce','oncellchange','onchange',
                    'onclick','oncontextmenu','oncontrolselect',
                    'oncopy','oncut','ondataavailable',
                    'ondatasetchanged','ondatasetcomplete','ondblclick',
                    'ondeactivate','ondrag','ondragend',
                    'ondragenter','ondragleave','ondragover',
                    'ondragstart','ondrop','onerror','onerrorupdate',
                    'onfilterchange','onfinish','onfocus','onfocusin',
                    'onfocusout','onhelp','onkeydown','onkeypress',
                    'onkeyup','onlayoutcomplete','onload',
                    'onlosecapture','onmousedown','onmouseenter',
                    'onmouseleave','onmousemove','onmouseout',
                    'onmouseover','onmouseup','onmousewheel',
                    'onmove','onmoveend','onmovestart','onpaste',
                    'onpropertychange','onreadystatechange','onreset',
                    'onresize','onresizeend','onresizestart',
                    'onrowenter','onrowexit','onrowsdelete',
                    'onrowsinserted','onscroll','onselect',
                    'onselectionchange','onselectstart','onstart',
                    'onstop','onsubmit','onunload','javascript',
                    'script','eval','behaviour','expression',
                    'style','class'
                );
                $skipstr = implode('|', $skipkeys);
                $value = preg_replace(array("/($skipstr)/i"), '.', $value);
                if(!preg_match("/^[/|s]?($allowtags)(s+|$)/is", $value)) {
                    $value = '';
                }
                $replaces[] = empty($value)?'':"<".str_replace('"', '"', $value).">";
            }
        }
        $html = str_replace($searchs, $replaces, $html);

        $html = addslashes($html);
        return $html;
    }
}
