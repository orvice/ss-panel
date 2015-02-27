<?php
//引入配置文件
require_once 'user_check.php';
//include_once 'lib/header.inc.php';
$id = $_GET['id'];
$sql ="SELECT * FROM `ss_node` WHERE `id` = '$id'  ";
$query =  $dbc->query($sql);
$rs = $query->fetch_array();
$server =  $rs['node_server'];
$method = $rs['node_method'];
$pass = $oo->get_pass();
$port = $oo->get_port();

//for qr
require_once '../lib/func/phpqrcode.php';
$ssurl =  $method.":".$pass."@".$server.":".$port;
$ssqr = "ss://".base64_encode($ssurl);
?>
<p>ss://<?php echo $ssurl;?></p>
<p id="ssqr_text" ><?php echo $ssqr;?></p>
<div id="qrcode"></div>
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.qrcode.min.js"></script>
<script>
    jQuery('#qrcode').qrcode("<?php echo $ssqr;?>");
</script>