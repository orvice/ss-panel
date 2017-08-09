{include file='header.tpl'}

<style>
    img {
        max-width: 100%;
    }
</style>

<!-- Begin page content -->
<div class="section no-pad-bot" id="index-banner">
<div class="container">
    <div class="page-header">
        <h1>服务介绍</h1>
    </div>

    <p>{$config["appName"]}，以下简称本站。</p>
    <p>我们目前共有日本、美国共五个节点。</p>
    <p>所有节点均提供 ipv6-ipv4 双向支持。</p>
    <p>有关节点的详细信息，查看<a href="/node">节点列表</a>。 </p>

    <h3>收费标准</h3>
    <p>价格：15元/月 25元/两个月 30/三个月。</p>
    <p>流量：每月免费 100G 流量。叠加 ￥1/10G。部分海外节点有流量比例优惠，详见<a href="/node">节点列表</a>。</p>
    <p>使用本站服务您须同意<a href="/tos">本站服务条款</a>。 </p>

    <h3>如何开始</h3>
    <p>
        首先注册。<a href="/code">找邀请码戳这里</a>
    </p>
    <p>
        然后按照用户中心的公告付费，开通服务即可。
    </p>

    <h3>实现原理和使用说明</h3>
    <p>
        本服务提供 ipv4 – ipv6 双向的 shadowsocks 代理。即，你可以在只可以使用 ipv6 的网络环境（通常校园网的 ipv6 是免费提供的）通过本服务访问 ipv4 的网站。反之亦然。或因其他原因需要使用代理加速的，都可适用于本服务。进行这种代理的服务器会产生一定的流量和相应的费用，因此我们的服务也是付费提供的。
    </p>
    <p>
        Shadowsocks 客户端在本地创建 sock5 代理服务器，并通过与远程服务器的加密 TCP 隧道来实现加速和科学上网。如果你对这一过程有不理解的地方，可以参考<a href="http://vc2tea.com/whats-shadowsocks/">写给非专业人士看的 Shadowsocks 简介</a>或<a href="https://shadowsocks.org/">官方网站</a>。
    </p>
    <p>
        程序配置中的服务器地址（server）、服务器端口（server_port）您付费后由我们提供，密码（password）和加密方式（method）则可以您在用户中心设置。请注意，您在客户端中填入的以上信息必须和服务器上配置的一致。在节点列表中您可以看到专门为您生成的配置信息，通常您只需要扫描二维码或是复制配置地址即可将客户端正确配置。如果您手动配置客户端，您务必使用正确的配置才能让客户端工作。
    </p>
    <p>
        程序配置中的代理端口（local_port）为本地 socks5 代理的监听端口。Shadowsocks 客户端服务启动后会在这个端口开启 socks5 代理。你的应用程序必须通过本地代理端口的 sock5 代理才能够使用代理来连接上网。下面的客户端简介会介绍不同平台和客户端下应用程序通过代理上网的方法。
    </p>

    <h3>适用范围和局限性</h3>
    <p>
    <ul>
        <li>需要访问国外受限网站或加速访问国外网站的用户。</li>
        <li>能够免费接入 ipv6 却需要付费访问 ipv4 的校园网用户，包括但不限于东北大学南湖校区，东北大学浑南校区。或能够访问 ipv4 同时需要接入 ipv6 的用户。</li>
    </ul>
    </p>

    <h4>我能访问 ipv6 吗</h4>
    <p>一般来讲，接入校园网即可访问 ipv6。如果你连接的是“NEU”的无线网络连接，则理论上你已经可以访问 ipv6。如果你是在寝室使用校园网，你还需要一个支持 ipv6 的路由器/交换机。</p>
    <p>要验证是否已经接入 ipv6，打开终端/命令提示符，输入</p>
    <p><code>ping neu6.edu.cn</code></p>
    <p>如果收到类似这样的返回，则已接入 ipv6。</p>
    <p>64 bytes from www.neu6.edu.cn (2001:da8:9000::7): icmp_seq=1 ttl=61 time=7.02 ms<br/>
        64 bytes from www.neu6.edu.cn (2001:da8:9000::7): icmp_seq=2 ttl=61 time=2.24 ms
    </p>

    <h4>局限性</h4>
    <p>服务器都分布在海外，因此你无法使用它访问只在中国大陆有版权的资源，例如一些音乐、视频网站。你可以通过一些其他渠道（如Y\o\u\T\u\b\e）来获取这些资源。</p>
    <p>不能代理访问只在中国能够访问的 ipv6 资源（如东北大学六维空间站），如果你使用的目的不包括通过 ipv4 和代理来访问这些资源则不受此影响。</p>
    <p>服务可能会不定时做出一些调整（如使用协议、节点、收费标准的调整），但是我们基本会以提供一个流量基本没有限制、速度尽可能好（没有人为限速）的长期服务为目标。</p>

    <h3>客户端简介</h3>
    <p><a href="/client">客户端下载戳这里</a></p>

    <h4>Windows 客户端</h4>
    <p>Windows 客户端为绿色版程序，下载后选择一个解压位置，程序会在运行目录释放配置文件。</p>
    <img src="/img/1.png" alt="1">
    <p>要导入配置文件，点击「节点列表」中的节点，打开节点详细信息。在客户端中点击「扫描屏幕上的二维码」；或点击「配置地址」中的蓝色按钮复制配置地址，然后点击「从剪贴板导入URL」。</p>
    <img src="/img/2.png" alt="2">
    <p>勾选上服务器中要设置代理的服务器，则 Sock5 代理已经在运行。</p>

    <p>Qt 版本的客户端的使用方法类似，不具备下面将要介绍的，即，启动 IE 代理的功能，你需要手动设置 IE 或应用程序代理，或使用 Proxyfier 等代理工具来代理。因 Qt 版本的客户端已经停止维护而不做详细介绍，不推荐使用。</p>

    <p>点击启用系统代理，客户端将会帮你启动 IE 代理。请注意，IE 代理并不是全局系统代理，只有跟随 IE 代理的应用程序才能够被代理。通常情况下浏览器是会跟随 IE 代理的，而有些程序可以设置跟随 IE 代理。以 QQ 为例：</p>
    <img src="/img/3.png" alt="3">
    <p>网络设置中选择使用浏览器代理来跟随 IE 代理。或选择 socks5 代理，配置地址为 127.0.0.1（本地回环地址），端口为「编辑服务器」中的代理端口（local_port）。</p>
    <img src="/img/4.png" alt="4">

    <p>要让所有的应用程序通过 sock5 代理上网，一种方法是通过 Proxyfier 进行代理。如果你要使用可能需要为购买 Proxyfier 支付一定的费用，本服务所收取的费用中不包含此费用。</p>
    <img src="/img/5.png" alt="5">
    <p>Proxyfier 中首先配置 Proxy Servers，添加一个地址为 127.0.0.1（本地回环地址），端口为「编辑服务器」中的代理端口（local_port）的 socks5「Proxy Server」。</p>
    <img src="/img/6.png" alt="6">
    <p>然后在「Proxyfication Rules」中设置除了本地地址以外都通过上面添加的 server 代理。</p>
    <img src="/img/7.png" alt="7">
    <p>这样就可以让全局都代理了。当然，你可以进行更多自定义的设置，例如只有某些地址才使用代理。</p>
    <img src="/img/8.png" alt="8">
    <p>设置完成后你可以保存当前配置。这样你可以保存多个配置来方便在不同配置中切换。例如，你可以配置“除了本地地址都通过代理”和“全部直连”，然后可以在托盘菜单中方便地切换它们。</p>
    <img src="/img/9.png" alt="9">

    <p>如果你是 Windows8、Windows8.1、Windows10 用户，需要通过代理连接使用 Metro App、Windows Modern App、UWP App 的话，由于系统默认将他们在沙箱中运行，你需要先将他们解锁。一种解锁方法是使用 fiddler 抓包工具：</p>
    <img src="/img/10.png" alt="10">
    <p>点击 WinConfig，然后勾上想要解锁的 App 即可。尽管如此，在经验上通过代理使用这些程序依然体验不佳。</p>

    <h4>安卓客户端</h4>
    <p>安卓客户端亦可以通过扫描节点列表的「配置二维码」（截图在上面 Windows 客户端一节）、复制节点列表的「配置地址」来导入配置。导入完成后选择相应的配置，点击小飞机按钮来启动全局系统代理。安卓客户端通过激活系统的虚拟（V）专用（P）网络（N）来进行全局 socks5 代理。</p>
    <img src="/img/11.png" alt="11">

    <h4>iOS 客户端</h4>
    <p>iOS 有很多客户端，其中不乏一些付费的客户端。同样，所支付的费用是由客户端的开发者收取的，本服务所收取的费用中不包含此费用。</p>
    <p>不同 iOS 客户端操作界面不尽相同，操作流程则大体和安卓客户端相同。</p>

    <h4>其他客户端</h4>
    <p>Linux 用户推荐使用 Python 版客户端。使用方法可以查阅帮助或 README，因为此平台用户多有使用经验故不赘述。需要注意在 Linux 下客户端不激活系统代理，而通常的桌面环境（如 Gnome、KDE 等）的网络配置中都可以配置全局 socks5 代理，终端中可以使用代理工具如 Proxychains 进行代理。</p>
    <p>基于 libev 版的 Openwrt 客户端可以运行在路由器上，为路由器下的用户提供透明代理。安装方法参照 Openwrt 指南进行即可。</p>

    <h3>故障诊断和售后支持</h3>
    <p>当你的使用发生故障时，请先检查</p>
    <ul>
        <li>用户中心是否欠费</li>
        <li>客户端配置的是否正确</li>
    </ul>
    <p>80% 以上的故障是由于以上问题造成的。你也可以参考页面底部的「节点状态监控」来确定是否是节点网络故障，也可以通过「服务可用性测试」来诊断是否确实是服务出现了问题。</p>
    <p>主要的售后服务渠道是 QQ 群和邮件，重要的通知会发送邮件，通常的通知都是在 QQ 群中通知。你可以在 QQ 群中来获取支持，不过，希望在那之前能够自己进行上述诊断来确认没有上述问题，十分感谢。</p>

</div>
</div>
{include file='footer.tpl'}
