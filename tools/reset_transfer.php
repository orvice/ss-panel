<?php
/*
 * 清空流量
 */
//定义清零日期,1为每月1号
$reset_date = '1';
//日期符合就清零 
if (date('d')==$reset_date){
    $db->update("user",[
        "u" => "0",
        "d" => "0"
    ]);
}