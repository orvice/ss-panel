<div id="node">
<pre>{
"server":"<{$server}>",
"server_port":<{$port}>,
"local_port":1080,
"password":"<{$pass}>",
"timeout":600,
"method":"<{$method}>"
}</pre>
	<button id="node_json" class="btn waves-effect waves-light light-blue lighten-1" type="button">查看二维码</button>
</div>
<script type="text/javascript">

$(document).ready(function(){
	off();
  $("#node_json").click(function(){
  	 open();
    $('#node').load('../user/node_qr.php?id=<{$id}>');   
  })
})
</script>