<?php
//设置编码
header("content-type:text/html;charset=utf-8");
require_once '../lib/config.php';
require_once '_check.php';
$id = $_GET['id'];
$node = new \Ss\Node\NodeInfo($id);
$server =  $node->Server();
$method = $node->Method();
$pass = $oo->get_pass();
$port = $oo->get_port();

$ssurl =  $method.":".$pass."@".$server.":".$port;
$ssqr = "ss://".base64_encode($ssurl);
?>
<html>
<head></head>
<body>
	<script type="text/javascript">
$(document).ready(function(){
  $("#node_qr").click(function(){
    $('#node').load('../user/node_json.php?id=<?php echo $id; ?>');
  })
})
</script>
		<div id="node">
			<div align="center">
			    <div id="qrcode"></div>
			</div>
			<p>ss://<?php echo $ssurl;?></p>
			<p id="ssqr_text" ><?php echo $ssqr;?></p>
				<script src="../asset/js/jquery.qrcode.min.js"></script>
				<script>jQuery('#qrcode').qrcode("<?php echo $ssqr;?>");</script>
			<button id="node_qr" class="btn btn-primary btn-block btn-flat" type="button">查看配置信息</button>
		</div>
	</body>
</html>