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
?>
<html>
<head>
	<script type="text/javascript">
$(document).ready(function(){
  $("#node_json").click(function(){
    $('#node').load('../user/node_qr.php?id=<?php echo $id; ?>');
  })
})
</script>

</head>
<body>
	<div id="node">
		<pre>{
"server":"<?php echo $server; ?>",
"server_port":<?php echo $port; ?>,
"local_port":1080,
"password":"<?php echo $pass; ?>",
"timeout":600,
"method":"<?php echo $method; ?>"
}</pre>
		<button id="node_json" class="btn btn-primary btn-block btn-flat" type="button">查看二维码</button>
	</div>
</body>
</html>