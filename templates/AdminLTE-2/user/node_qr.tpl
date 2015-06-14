<script type="text/javascript">
$(document).ready(function(){
  $("#node_qr").click(function(){
    $('#node').load('../user/node_json.php?id=<{$id}>');
  })
})
</script>
<div id="node">
	<div align="center">
	    <div id="qrcode"></div>
	</div>
	<p>ss://<{$ssurl}></p>
	<p id="ssqr_text" ><{$ssqr}></p>
		<script src="<{$resources_dir}>/asset/js/jquery.qrcode.min.js"></script>
		<script>jQuery('#qrcode').qrcode("<{$ssqr}>");</script>
	<button id="node_qr" class="btn btn-primary btn-block btn-flat" type="button">查看配置信息</button>
</div>