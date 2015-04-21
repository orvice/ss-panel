<?php
/*
 * 清空流量
 */
//定义清零日期,1为每月1号
$reset_date = '1';
//日期符合就清零
$sql = "UPDATE `user` SET `u` = '0', `d` = '0' ";
if (date('d')==$reset_date){
    $dbc->query($sql);
}