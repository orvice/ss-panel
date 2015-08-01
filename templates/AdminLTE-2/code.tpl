<{include file='header.tpl'}>
<body>
<div class="container">
<{include file='nav.tpl'}>

    <div class="jumbotron"><{$code_Announcement}><{* 提示内容：邀请码不定时发放！ *}>
    </div>

    <div class="row marketing">
        <h2 class="sub-header">邀请码</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>###</th>
                    <th>邀请码</th>
                    <th>状态</th>
                </tr>
                </thead>
                <tbody>
                <{foreach $datas as $data}>
                <tr>
                    <td><{$a++}></td>
                     <td><{$data['code']}></td>
                    <td>可用</td>
                </tr>
                <{/foreach}>
                </tbody>
            </table>
        </div>
    </div>
<{include file='footer.tpl'}>
<{$ana}>
</div> <!-- /container -->
<!-- 选择风格模板 -->
<script>
    (function() { 
    function async_load(){ 
        var arryAll = [];  
        // 异步加载的js文件
        arryAll.push("<{$resources_dir}>/asset/js/templates.js");  
        // arryAll.push("<{$resources_dir}>/asset/js/*.js"); 
        arryAll.forEach(function(e){ 
            var s = document.createElement('script'); 
            s.type = 'text/javascript'; 
            s.async = true; 
            var x = document.getElementsByTagName('script')[0];
            s.src = e; 
            x.parentNode.insertBefore(s, x); 
        })  
    } 
    if (window.attachEvent) {
    window.attachEvent('onload', async_load); 
    }else {
    window.addEventListener('load', async_load, false);
    } 
    })(); 
</script>
</body>
</html>