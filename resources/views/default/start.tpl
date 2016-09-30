{include file='header.tpl'}
<!-- Begin page content -->
<div class="section no-pad-bot" id="index-banner">
<div class="container">
    <div class="page-header">
        <h1>新人指南 QuickStart </h1>
    </div>
    <p>{$config["appName"]}，以下简称本站。</p>
    <h3>适用人群</h3>
    <p>
        <ul>
            <li>能够免费接入 ipv6 却需要付费访问 ipv4 的校园网用户，包括但不限于东北大学南湖校区，东北大学浑南校区。</li>
            <li>有访问国外受限网站或加速访问国外网站需求的用户。</li>
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

    <h3>实现原理</h3>
    <p>
        本站根据校园网 ipv6 协议免费，同时服务器流量比校园网网费便宜而实现。
    </p>
    <p>本站使用 Shadowsocks 代理传输，有关 Shadowsocks 的详细信息，前往 <a href="https://github.com/shadowsocks/shadowsocks">Shadowsocks 开源项目</a> <a href="https://github.com/shadowsocks">Shadowsocks 团队</a> <a href="https://shadowsocks.org/en/index.html">Shadowsocks 官方网站</a> </p>

    <h3>其它</h3>
    <p>
    <ul>
        <li>本站仅限人类及猫注册使用。</li>
        <li>TOS更新时用户需要遵守最新TOS。本站有TOS更新时不通知用户的权利。</li>
    </ul>
    </p>

</div>
</div>
{include file='footer.tpl'}