<?php
require_once '../lib/config.php';
require_once '_check.php';

// $pwd = $_POST['sspwd'];
if($_POST['sspwd'] == ''){
    $pwd = \Ss\Etc\Comm::get_random_char(8);
}else{
    $pwd = $_POST['sspwd'];
    $pwd = htmlspecialchars($pwd, ENT_QUOTES, 'UTF-8');
    $pwd = \Ss\Etc\Comm::checkHtml($pwd);
}
$oo->update_ss_pass($pwd);
$a['ok'] = '1';
$a['msg'] = "新密码为".$pwd;
echo json_encode($a);