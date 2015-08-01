<{include file='header.tpl'}>
<body>
<div class="container">
   <{include file='nav.tpl'}>

    <div class="jumbotron">
        <h2><{$site_name}></h2>
        <p class="lead"><{$index_Announcement}><{* 每个月5G流量，美国节点。 *}></p>
        <p><{$index_button}><{* 按钮 *}></p>
    </div>

    <div class="row marketing">
        <div class="col-lg-6">
            <a href="https://play.google.com/store/apps/details?id=com.github.shadowsocks"><h4>Android</h4></a>
            <p>Android客户端</p>
            <h4><a href="http://sourceforge.net/projects/shadowsocksgui/files/dist/">Shadowsocks C#</a></h4>
            <p> Windows用户推荐此客户端。</p>
        </div>

        <div class="col-lg-6">
            <a href="https://itunes.apple.com/us/app/shadowsocks/id665729974?mt=8"><h4>iOS</h4></a>
            <p>iOS客户端</p>

            <h4><a href="https://github.com/ohdarling/GoAgentX/releases">GoAgentX</a></h4>
            <p> OS X用户推荐此客户端。</p>
        </div>
    </div>
<{include file='footer.tpl'}>
<{$ana}>
</div> <!-- /container -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<{$resources_dir}>/asset/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>