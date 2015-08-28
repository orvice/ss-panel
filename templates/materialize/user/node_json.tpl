<{if $oo->get_enable()}>
    <pre>{
    "server":"<{$server}>",
    "server_port":<{$port}>,
    "local_port":1080,
    "password":"<{$pass}>",
    "timeout":600,
    "method":"<{$method}>"
    }</pre>
    <script type="text/javascript">
    var node_btn=document.getElementById('node_btn');
    function _node_json(){
        $('#node').load('../user/node_qr.php?id=<{$id}>'); 
    	open_css();
    	node_btn.innerHTML='<button class="btn waves-effect waves-light light-blue lighten-1 disabled" type="button">二维码</button>';  
    }
    node_btn.innerHTML='<button id="node_json" onclick="_node_json();" class="btn waves-effect waves-light light-blue lighten-1" type="button">二维码</button>';
    close_css();
    </script>
<{else}>
    <p>你的SS服务已被停止，你不能连接和查看节点。</p>
    <script type="text/javascript">close_css();</script>
<{/if}>