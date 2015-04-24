<?php
require_once '../lib/config.php';
require_once '_check.php';
$pwd = $_POST['pwd'];
$pwd = \Ss\User\Comm::SsPW($pwd);
if($U->GetPasswd() != $pwd) {
    $a['error'] = '1';
    $a['msg'] = "密码错误";
}else {
    $a['ok'] = '1';
    $a['msg'] = "再见，您已经安全的从我们的数据库中移除。";
    //remove
    $U->DelMe();

}
echo json_encode($a);