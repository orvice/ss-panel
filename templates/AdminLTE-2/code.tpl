<{include file='header.tpl'}>
<body>
<div class="container">
<{include file='nav.tpl'}>

    <div class="jumbotron">
        <p class="lead"> 邀请码实时刷新</p>
        <p>如遇到无邀请码请找已经注册的用户获取。</p>
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
</body>
</html>