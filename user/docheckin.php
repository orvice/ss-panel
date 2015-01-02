<?php
/**
 * check in
 */

//引入配置文件
require_once 'user_check.php';

include_once 'lib/header.inc.php';
//权限检查
if(!$oo->is_able_to_check_in()){
    echo " <script>window.location='index.php';</script> " ;
}else{
    if($oo->unused_transfer()<2048*$tomb){
        $transfer_to_add = 2048;
    }else{
        $transfer_to_add = rand(1,100);
    }
    $oo->add_transfer($transfer_to_add*$tomb);
    $oo->update_last_check_in_time();
?>
     <script>alert("签到成功，获得了<?php echo $transfer_to_add;?> MB流量!")</script>
     <script>window.location='index.php';</script>

<?php } ?>
