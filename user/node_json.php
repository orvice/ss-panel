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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61550927-1', 'auto');
  ga('send', 'pageview');
</script>
</body> 
</html> 