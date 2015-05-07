<?php
require_once '../lib/config.php';
require_once '_check.php';
$id = $_GET['id'];
$node = new \Ss\Node\NodeInfo($id);
$server =  $node->Server();
$method = $node->Method();
$pass = $oo->get_pass();
$port = $oo->get_port();
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta charset="utf-8" /> 
<title>配置文件</title> 
</head> 
<body style="text-align:center"> 
<h1>请复制下面内容！</h1>
<textarea name="node_json" rows="9" cols="22" readonly style="resize:none" />
{
"server":"<?php echo $server; ?>",
"server_port":<?php echo $port; ?>,
"local_port":1080,
"password":"<?php echo $pass; ?>",
"timeout":600,
"method":"<?php echo $method; ?>"
}
</textarea>
</body> 
</html> 
