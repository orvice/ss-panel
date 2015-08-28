<{if $oo->get_enable()}>
    <script type="text/javascript">
    $(document).ready(function(){
      $("#node_json").click(function(){
        $('#node').load('../user/node_qr.php?id=<{$id}>');
      })
    })
    </script>
    <div id="node">
    <pre>{
    "server":"<{$server}>",
    "server_port":<{$port}>,
    "local_port":1080,
    "password":"<{$pass}>",
    "timeout":600,
    "method":"<{$method}>"
    }</pre>
    	<button id="node_json" class="btn btn-primary btn-block btn-flat" type="button">查看二维码</button>
    </div>
<{else}>
    <p>你的SS服务已被停止，你不能连接和查看节点。</p>
<{/if}>