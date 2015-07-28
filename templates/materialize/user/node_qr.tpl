<div id="node">
	<div align="center">
	    <div id="qrcode"></div>
	</div>
	<p>ss://<{$ssurl}></p>
	<p id="ssqr_text" ><{$ssqr}></p>
		<script>jQuery('#qrcode').qrcode("<{$ssqr}>");</script>
	<button id="node_qr" class="btn waves-effect waves-light light-blue lighten-1" type="button">查看配置信息</button>
</div>
<script type="text/javascript">
$(document).ready(function(){
	off();
  $("#node_qr").click(function(){
  	open();
    $('#node').load('../user/node_json.php?id=<{$id}>');
  })
})
</script>