{include file='header.tpl'}
<!-- Begin page content -->
<div class="section no-pad-bot" id="index-banner">
<div class="container">
    <div class="page-header">
        <h1>服务介绍</h1>
    </div>
    <p>{$config["appName"]}，以下简称本站。</p>
    <h3>适用人群</h3>
    <p>
        <ul>
            <li>有访问国外受限网站或加速访问国外网站需求的用户。</li>
            <li>能够免费接入 ipv6 却需要付费访问 ipv4 的校园网用户，包括但不限于东北大学南湖校区，东北大学浑南校区。</li>
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

    <h3>服务介绍</h3>
    <p>我们目前共有日本、美国共五个节点。</p>
    <p>所有节点均提供 ipv6-ipv4 双向支持。</p>
    <p>有关节点的详细信息，查看<a href="/node">节点列表</a>。 </p>

    <h3>收费标准</h3>
    <p>价格：15元/月 25元/两个月 30/三个月。</p>
    <p>流量：每月免费 100G 流量。叠加 ￥1/10G。部分海外节点有流量比例优惠，详见<a href="/node">节点列表</a>。</p>
    <p>使用本站服务您须同意<a href="/tos">本站服务条款</a>。 </p>

    <h3>实现原理</h3>
    <p>
        本站根据校园网 ipv6 协议免费，同时服务器流量比校园网网费便宜而实现。
    </p>
    <p>本站支持 Shadowsocks 代理传输，有关 Shadowsocks 的详细信息，前往 <a href="https://github.com/shadowsocks/shadowsocks">Shadowsocks 开源项目</a> 和 <a href="https://shadowsocks.org/en/index.html">Shadowsocks 官方网站</a> </p>
    <p><a href="http://vc2tea.com/whats-shadowsocks/">写给非专业人士看的 Shadowsocks 简介</a></p>
    <h3>如何开始</h3>
    <p>
        首先注册。<a href="/code">找邀请码戳这里</a>
    </p>
    <p>
        然后按照用户中心的公告付费，开通服务即可。
    </p>

    <h3>客户端使用</h3>
    <p><a href="/client">客户端下载戳这里</a></p>
    <p>给小白的教程日后再写吧</p>

</div>
</div>
{include file='footer.tpl'}
