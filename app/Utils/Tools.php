<?php

namespace App\Utils;


class Tools
{
    /**
     * 根据流量值自动转换单位输出
     * @author   eaves chen<leaves615@gmail.com>
     * @param $value 流量值
     * @return $value 流量带单位
     */
    static function flowAutoShow($value){
        $kb = 1024; $mb = 1048576; $gb = 1073741824;
        if ($value > $gb) {
            return round($value/$togb, 2)."GB";
        }
        else if ($value > $mb) {
            return round($value/$tomb, 2)."MB";
        }
        else if ($value > $kb) {
            return round($value/$tokb, 2)."KB";
        } else{
            return round($value, 2);
        }
}