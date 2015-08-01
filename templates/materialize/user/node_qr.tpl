<div align="center">
    <div id="qrcode"></div>
</div>
<p>ss://<{$ssurl}></p>
<p id="ssqr_text" ><{$ssqr}></p>
	<script>jQuery('#qrcode').qrcode("<{$ssqr}>");</script>
<script type="text/javascript">
var node_btn=document.getElementById('node_btn');
function _node_qr(){
    $('#node').load('../user/node_json.php?id=<{$id}>');
	open_css();
	node_btn.innerHTML='<button id="node_qr" class="btn waves-effect waves-light light-blue lighten-1 disabled" type="button">配置</button>';
}
node_btn.innerHTML='<button id="node_qr" onclick="_node_qr();" class="btn waves-effect waves-light light-blue lighten-1" type="button">配置</button>';
close_css();
</script>