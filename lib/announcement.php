<?php
/*
 使 用 说 明 
 如果在内容中要使用单引号，必须在单引号前面加“\”,才不会报错。
 */

// 首页公告内容
$index_Announcement='<p>每个月5G流量，美国节点。</p>';

// 首页公告按钮
$index_button='<a href="user/register.php" class="btn-large waves-effect waves-light light-blue lighten-1 btn btn-lg btn-success">立即注册</a>';

// 首页自定义内容
$index_Custom='<div class="row card-panel center transparent z-depth-2" style="padding: 5px;"><!-- 这个请不要删 -->
  <style>
   @media only screen and (max-width : 880px){
      div.slider>ul.slides>li>div>h3{
      font-size: 25px;
      }
      div.slider>ul.slides>li>div>h5{
      font-size: 22px;
      }
  } 
  </style>
  <div class="slider">
    <ul class="slides" style="background-color: #00A8FF;">
      <li style="background-image: linear-gradient(-45deg, rgba(180, 145, 224, 0.560784), rgb(47, 185, 226));">
        <img src="javascript:void(0);"> <!-- random image -->
        <div class="caption center-align">
          <h3>更安全的连接</h3>
          <h5 class="light grey-text text-lighten-3">不用像VPN那样，每次连接就会断一次网，更不会把所有数据通信都通过代理服务器！</h5>
        </div>
      </li>
      <li style="background-image: linear-gradient(178deg, rgba(180, 145, 224, 0.560784),rgba(224, 223, 145, 0.56), rgb(47, 185, 226));">
        <img src="javascript:void(0);"> <!-- random image -->
        <div class="caption left-align">
          <h3>隐私保护</h3>
          <h5 class="light grey-text text-lighten-3">我们的服务器只负责为用户转发每一个数据包到目标服务器，和从目标服务器返回数据包给用户，而这些数据包都是经过加密的，我们的服务器也不会记录任何数据包中的内容，请大家放心使用！</h5>
        </div>
      </li>
      <li style="background-image: linear-gradient(45deg, rgba(224, 223, 145, 0.56), rgb(47, 185, 226));">
        <img src="javascript:void(0);"> <!-- random image -->
        <div class="caption right-align">
          <h3>可靠的服务器</h3>
          <h5 class="light grey-text text-lighten-3">我们的服务器选用的都是经过严格测试，在网络连接的稳定要求较高，高速宽带！服务器24小时人工管理！</h5>
        </div>
      </li>
      <li style="background-image: linear-gradient(-188deg, rgba(180, 145, 224, 0.560784),rgba(39, 165, 255, 0.97),rgba(98, 221, 221, 0.96));">
        <img src="javascript:void(0);"> <!-- random image -->
        <div class="caption center-align">
          <h3>随时用，客户端全覆盖！</h3>
          <h5 class="light grey-text text-lighten-3">Shadowsocks是一个开源技术，目前已经支持各种客户端，如：Windows <br>Mac os x <br>linux <br>Android <br>iOS ...</h5>
        </div>
      </li>
    </ul>
  </div>
</div>

<br/>

<div class="row card-panel center light-blue lighten-3 z-depth-2" style="padding: 5px;"><!-- 这个请不要删 -->
  <ul class="collapsible popout collapsible-accordion" data-collapsible="accordion">
    <li>
      <div class="collapsible-header active yellow accent-1">
        <i class="mdi-image-flash-on"></i>Super Fast</div>
      <div class="collapsible-body yellow accent-3" style="display: block;">
        <p>Bleeding edge techniques using Asynchronous I/O and Event-driven programming.</p></div>
    </li>
    <li>
      <div class="collapsible-header light-green accent-3">
        <i class="mdi-social-people"></i>Open Source</div>
      <div class="collapsible-body light-green accent-2" style="display: none;">
        <p>Totally free and open source. A worldwide community devoted to deliver bug-free code and long-term support.</p>
      </div>
    </li>
    <li>
      <div class="collapsible-header cyan accent-2">
        <i class="mdi-action-settings-applications"></i>Easy to work with</div>
      <div class="collapsible-body cyan accent-1" style="display: none;">
        <p>Avaliable on multiple platforms, including PC, MAC, Mobile (Android and iOS) and Routers (OpenWRT).</p>
      </div>
    </li>
  </ul>
</div>

<!--
更多例子：
http://materializecss.com/collapsible.html
http://materializecss.com/media.html
<div class="row card-panel center transparent z-depth-2" style="padding: 5px;">
  <blockquote>
        This is an example quotation that uses the blockquote tag.
  </blockquote>
     <div class="chip center">				
        <img src="https://secure.gravatar.com/avatar/?s=80&d=mm&r=g" alt="Gravatar_Email_img" class="circle user-image">Gravatar_Email_img
      </div>
  
  <div class="col s12 m8 offset-m2 l6 offset-l3">
    <div class="card-panel grey lighten-5 z-depth-1">
      <div class="row valign-wrapper">
        <div class="col s2">
          <img src="http://materializecss.com/images/yuna.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--
        </div>
        <div class="col s10">
          <span class="black-text">
            This is a square image. Add the "circle" class to it to make it appear circular.
          </span>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col s12 m7">
      <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator circle" src="https://secure.gravatar.com/avatar/?s=80&d=mm&r=g">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
          <p><a href="#">This is a link</a></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
          <p>Here is some more information about this product that is only revealed once clicked on.</p>
        </div>
      </div>
    </div>
  
  <div class="row">
    <div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Card Title</span>
          <p>I am a very simple card. I am good at containing small bits of information.
            I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
          <a href=\'#\'>This is a link</a>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col s12 m6">
    <div class="card small">
      <div class="card-image">
        <img src="http://materializecss.com/images/sample-1.jpg">
        <span class="card-title">Card Title</span>
      </div>
      <div class="card-content">
        <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
      </div>
      <div class="card-action">
        <a href="#">This is a link</a>
        <a href="#">This is a link</a>
      </div>
    </div>
  </div>
  
  <div class="row">
      <div class="col s12 m5">
        <div class="card-panel teal">
          <span class="white-text">I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
          </span>
        </div>
      </div>
    </div>
</div>
-->';

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
$smarty->assign("index_Custom",$index_Custom);// 首页自定义内容
$smarty->assign("footer_Announcement",$footer_Announcement);
$smarty->assign("code_Announcement",$code_Announcement);// 邀请码公告内容
$smarty->assign("user_index_Announcement",$user_index_Announcement);// 用户中心公告内容
$smarty->assign("user_node_Announcement_node",$user_node_Announcement_node);// 普通节点公告内容
$smarty->assign("user_node_Announcement_node_pro",$user_node_Announcement_node_pro);// pro节点公告内容
$smarty->assign("user_invite_Announcement_color_orange",$user_invite_Announcement_color_orange);// 橙色公告内容
$smarty->assign("user_invite_Announcement_color_blue",$user_invite_Announcement_color_blue);// 蓝色公告内容
$smarty->assign("tos_content",$tos_content);// 用户协议 
