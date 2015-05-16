<?php
//设置编码
header("content-type:text/html;charset=utf-8");
require_once '../lib/config.php';
require_once '_check.php';
$id = $_GET['id'];
$node = new \Ss\Node\NodeInfo($id);
$server =  $node->
Server();
$method = $node->Method();
$pass = $oo->get_pass();
$port = $oo->get_port();

$ssurl = "ss://".$method.":".$pass."@".$server.":".$port;
$ssqr = "ss://".base64_encode($ssurl);
?>
<html>
<head></head>
<body>
	<div id="node">
		<p id="ssqr_text" ></p>
		<div align="center">
			<div id="qrcode"></div>
		</div>
		<script src="../asset/js/jquery.qrcode.min.js"></script>
		<script>
jQuery('#qrcode').qrcode("<?php echo $ssqr;?>");</script>
		<div id="qrcode" style="text-align: center;"></div>
		<br>
		<a class="collapsed" data-toggle="collapse" href="#collapse-node-more-info" aria-expanded="false" aria-controls="collapse-node-more-info"> <i class="fa fa-chevron-circle-up"></i>
			配置信息
		</a>
		<div id="node">
			<style type="text/css">
.collapsed>.fa-chevron-circle-up:BEFORE{
content: "\f13a";
}
</style>
			<div style="margin-top: 6px; height: 0px;" class="collapse" id="collapse-node-more-info" aria-expanded="false">
				<p>
					连接字符串：
					<code><?php echo $ssurl;?></code>
				</p>
				<p>
					Base64加密：
					<code><?php echo $ssqr;?></code>
				</p>
				<p>配置文件：</p>
				<pre>{
"server":"<?php echo $server; ?>",
"server_port":<?php echo $port; ?>,
"local_port":1080,
"password":"<?php echo $pass; ?>",
"timeout":600,
"method":"<?php echo $method; ?>"
}</pre>
			</div>
		</div>
	</div>
</body>
</html>