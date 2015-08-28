<{if $oo->get_enable()}>
    <div align="center">
        <div id="qrcode"></div>
    </div>
    <p>ss://<{$ssurl}></p>
    <p id="ssqr_text" ><{$ssqr}></p>
    	<script>
    		jQuery('#qrcode').qrcode(
    			{
    			    // render method: 'canvas', 'image' or 'div'
    			    // 不建议设置为image，因为可以直接另存为图片，不安全。
    			    render: 'canvas',
    
    			    // version range somewhere in 1 .. 40
    			    minVersion: 10,
    			    maxVersion: 40,
    
    			    // error correction level: 'L', 'M', 'Q' or 'H'
    			    ecLevel: 'H',
    
    			    // offset in pixel if drawn onto existing canvas
    			    // left: 0,
    			    // top: 0,
    
    			    // size in pixel
    			    size: 200,
    
    			    // code color or image element
    			    fill: '#000',
    
    			    // background color or image element, null for transparent background
    			    background: 'white',
    
    			    // content
    			    text: '<{$ssqr}>',
    
    			    // corner radius relative to module width: 0.0 .. 0.5
    			    radius: 0.5,
    
    			    // quiet zone in modules
    			    quiet: 0,
    
    			    // modes
    			    // 0: normal
    			    // 1: label strip
    			    // 2: label box
    			    // 3: image strip
    			    // 4: image box
    			    mode: 2,
    
    			    mSize: 0.1,
    			    mPosX: 0.5,
    			    mPosY: 0.5,
    
    			    label: '<{$site_name}>',
    			    fontname: 'GillSans, Calibri, Trebuchet, sans-serif',
    			    fontcolor: 'dodgerblue',
    
    			    image: null
    			}
    		 );
    	</script>
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
<{else}>
    <p>你的SS服务已被停止，你不能连接和查看节点。</p>
    <script type="text/javascript">close_css();</script>
<{/if}>