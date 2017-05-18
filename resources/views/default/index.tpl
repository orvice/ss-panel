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
            <a href="/code" id="download-button" class="btn-large waves-effect waves-light orange">立即注册</a>
        </div>
        <div class="row center">
                <div class="section">
        <div class="row">
                <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-qrcode"></i>
                        <h5 class="box-title">新加坡-测试节点1</h5>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="text-center">
                            <div id="ss-qr"></div>
                        </div>
                    </div>
                    <!-- /.box-body -->
            </div>
        </div>
    </div>
            <h5 class="header col s12 light">测试账号每天00:00更换配置，注册即可拥有永久免费账号</h5>
            <p>本服务仅供实验和测试用途，请遵守当地国家或者地区的相关法律。服务已屏蔽了绝大多数非法信息，</br>如有任何违法行为，我们将配合当地相关部门协助调查。</p>
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
                    <!-- To be compatible with some old browsers(especially mobile browsers), use &#xE3E7 instead of flash_on. For more information visit the link below.
                    http://google.github.io/material-design-icons/#using-the-icons-in-html
                    -->
                    <h2 class="center light-blue-text"><i class="material-icons">&#xE3E7</i></h2>
                    <h5 class="center">Super Fast</h5>

                    <p class="light">
                        Bleeding edge techniques using Asynchronous I/O and Event-driven programming.
                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <!-- To be compatible with some old browsers(especially mobile browsers), use &#xE7EF instead of group. For more information visit the link below.
                    http://google.github.io/material-design-icons/#using-the-icons-in-html
                    -->
                    <h2 class="center light-blue-text"><i class="material-icons">&#xE7EF</i></h2>
                    <h5 class="center">Open Source</h5>

                    <p class="light">
                        Totally free and open source. A worldwide community devoted to deliver bug-free code and long-term support.
                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <!-- To be compatible with some old browsers(especially mobile browsers), use &#xE8B8 instead of settings. For more information visit the link below.
                    http://google.github.io/material-design-icons/#using-the-icons-in-html
                    -->
                    <h2 class="center light-blue-text"><i class="material-icons">&#xE8B8</i></h2>
                    <h5 class="center">Easy to work with</h5>

                    <p class="light">
                        Avaliable on multiple platforms, including PC, MAC, Mobile (Android and iOS) and Routers (OpenWRT).
                    </p>
                </div>
            </div>
        </div>

    </div>
    <br><br>

    <script src="/assets/public/js/jquery.min.js"></script>
    <script src=" /assets/public/js/jquery.qrcode.min.js "></script>
    <script>
         jQuery('#ss-qr').qrcode({
           "text": "{$ssqr}"
         });
    </script>
</div>
{include file='footer.tpl'}
