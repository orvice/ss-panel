{include file='header.tpl'}
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center orange-text">{$config["appName"]}</h1>
        <div class="row center">
            <h5 class="header col s12 light">轻松科学上网   保护个人隐私</h5>
            {$homeIndexMsg}
        </div>
        {if $user->isLogin}
            <div class="row center">
                <a href="/user" id="download-button" class="btn-large waves-effect waves-light orange">进入用户中心</a>
            </div>
        {else}
        <div class="row center">
            <a href="/start" id="download-button" class="btn-large waves-effect waves-light orange">服务介绍</a>
            <a href="/auth/register" id="download-button" class="btn-large waves-effect waves-light orange">立即注册</a>
        </div>
        {/if}
        <br><br>
    </div>
</div>


<div class="container">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">
		    <!-- attach_money e227 -->
                    <h2 class="center light-blue-text"><i class="material-icons">&#xE227</i></h2>
                    <h5 class="center">价格低廉</h5>

                    <p class="light">
                        校园网外网服务每月 15 元 25GiB 流量，而我们的服务每月 100GiB 流量最低只需 10 元。同时，我们还提供比校园网更多的附加服务。
                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
		    <!-- vpn_key e0da -->
                    <h2 class="center light-blue-text"><i class="material-icons">&#xE0DA</i></h2>
                    <h5 class="center">科学上网</h5>

                    <p class="light">
                        基于 Shadowsocks、ShadowsocksR 的科学上网服务，轻松加速访问国外网站。影梭特有的加密技术，全局加密连接，让数据无法被审查，同时你的隐私也能有效地被保护。
                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
		    <!-- settings e8b8 -->
                    <h2 class="center light-blue-text"><i class="material-icons">&#xE8B8</i></h2>
                    <h5 class="center">易于使用</h5>

                    <p class="light">
                        你将不再需要每切换一次网络就重新登录校园网关，只要 Shadowsocks 后台服务在运行，你就一直可以通过它访问外网。我们不限制设备数量，你可以使用任意多的设备连接。
                    </p>
                </div>
            </div>
        </div>

    </div>
    <br><br>

    <div class="section">

    </div>
</div>
{include file='footer.tpl'}
