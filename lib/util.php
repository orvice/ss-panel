<?php
/**
 * Created by IntelliJ IDEA.
 * User: leaves chen<leaves615@gmail.com>
 * Date: 15/5/4
 * Time: 14:13
 * 封装一些常用函数
 */
/**
 * 根据流量值自动转换单位输出
 * @param $value 流量值
 */
require_once "config.php";
function flowAutoShow($value){
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
        echo "Byte";
    }
}