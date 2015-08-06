<?php
/*
 使 用 说 明 
 如果在内容中要使用单引号，必须在单引号前面加“\”,才不会报错。
 */

// 首页公告内容
$index_Announcement='<p>每个月5G流量，美国节点。</p>';
// 首页公告按钮
$index_button='<a href="user/register.php" class="btn-large waves-effect waves-light light-blue lighten-1 btn btn-lg btn-success">立即注册</a>';

// 用户建议内容
$footer_Announcement='当前网页要在支持Html5较新版本的浏览器才能正常使用，如果你的当前浏览显示不正常，请更新浏览器，推荐使用谷歌浏览器（Chrome）、OPERA、Firefox ...<br/>
	          安卓版本4.4.4以下手机用户不推荐使用系统浏览器来访问。<br/>
	          如果你正在使用XXX公司的任何与网络相关的硬件和软件，请不要使用本站服务，根据网上反映的情况，该公司的产品会后台上报VPN，SS(shadowsocks)，SSH等等的ip信息，导致很多的VPN，SS(shadowsocks)，SSH服务不能正常使用。<br/><b style="color:red;">站长可以在后台任意修改这里的内容！</b>';

// 邀请码公告内容
$code_Announcement='<p> 邀请码不定时发放！</p>
            	<p>如遇到无邀请码请找已经注册的用户获取。</p>';

// 用户中心公告内容
$user_index_Announcement='<p>流量不会重置，可以通过签到获取流量。</p> 
                            <p>流量可以通过签到获取，基本每天最多可以领取1G流量。</p>
                            <p>请勿在任何地方公开本站任何节点信息！</p>';

// 普通节点公告内容
$user_node_Announcement_node='<h4>注意!</h4>
                       <p>请勿在任何地方公开节点任何信息！</p>';
// pro节点公告内容
$user_node_Announcement_node_pro='<h4>注意!</h4>
                       <p>请勿公开节点任何信息！</p>';

// 橙色公告内容
$user_invite_Announcement_color_orange='<h4>注意！</h4>
                              <p>邀请码请给认识的需要的人。</p>
                              <p>邀请有记录，若被邀请的人违反用户协议，您将会有连带责任。</p>';
// 蓝色公告内容
$user_invite_Announcement_color_blue='<h4>说明</h4>
                              <p>用户注册48小时后，才可以生成邀请码。</p>
                              <p>邀请码暂时无法购买，请珍惜。</p>
                              <p>公共页面不定期发放邀请码，如果用完邀请码可以关注公共邀请。</p>';
// 用户协议
$tos_content='以下简称本站。
    <h3>隐私</h3>
    <p>
        <ul>
            <li>用户注册时候需要提供邮箱以及密码，并自行保管。邮箱为用户的唯一凭证。</li>
            <li>本站会加密存储用户密码，尽量保证数据安全，但并不保证这些信息的绝对安全。</li>
        </ul>
    </p>

    <h3>使用条款</h3>
    <p>
        <ul>
            <li>禁止使用本站服务进行任何违法恶意活动。</li>
            <li>使用任何节点，需遵循节点所属国家的相关法律以及中国法律。</li>
            <li>禁止滥用本站提供的服务。</li>
            <li>对于免费用户，我们有权在不通知的情况下删除账户。</li>
            <li>任何违法使用条款的用户，我们将会删除违规账户并没收使用本站服务的权利。</li>
       </ul>
    </p>

    <h3>其它</h3>
    <p>
    <ul>
        <li>本站仅限人类及猫注册使用。</li>
        <li>TOS更新时用户需要遵守最新TOS。</li>
    </ul>';

//传递变量到smarty数组
$smarty->assign("index_Announcement",$index_Announcement);// 首页公告内容
$smarty->assign("index_button",$index_button);// 首页公告按钮
$smarty->assign("footer_Announcement",$footer_Announcement);
$smarty->assign("code_Announcement",$code_Announcement);// 邀请码公告内容
$smarty->assign("user_index_Announcement",$user_index_Announcement);// 用户中心公告内容
$smarty->assign("user_node_Announcement_node",$user_node_Announcement_node);// 普通节点公告内容
$smarty->assign("user_node_Announcement_node_pro",$user_node_Announcement_node_pro);// pro节点公告内容
$smarty->assign("user_invite_Announcement_color_orange",$user_invite_Announcement_color_orange);// 橙色公告内容
$smarty->assign("user_invite_Announcement_color_blue",$user_invite_Announcement_color_blue);// 蓝色公告内容
$smarty->assign("tos_content",$tos_content);// 用户协议 