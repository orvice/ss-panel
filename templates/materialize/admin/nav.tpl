<div class="navbar-fixed hoverable">
	<style>
		a span {
			  color: orangered;
		}
	</style>
	<nav class="light-blue lighten-1" role="navigation">
		<div class="nav-wrapper container"><a id="logo-container" href="<{$site_url}>" class="brand-logo"><{$site_name}></a>
			<!-- 电脑等大屏幕显示的菜单 -->
			<ul class="right hide-on-med-and-down">
				<li><a class="waves-effect waves-yellow" href="index.php">管理中心</a></li>
				<li><a class="waves-effect waves-yellow" href="node.php">节点编辑</a></li>
				<li><a class="waves-effect waves-yellow" href="user.php">查看用户</a></li>
				<li><a class="waves-effect waves-yellow" href="invite.php">邀请管理</a></li>
			      <!-- 修改公告 Trigger -->
			    <li><a class="dropdown-button" href="#!" data-activates="change_announcement">修改公告<span class="mdi-hardware-keyboard-arrow-down"></span></a></li>
	                <ul id="change_announcement" class="dropdown-content">
						  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=index_Announcement">首页</a></li>
						  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=index_button">首页按钮</a></li>
						  <li class="divider"></li>
						  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=footer_Announcement">用户建议</a></li>
						  <li class="divider"></li>
						  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=tos_content">用户协议 </a></li>
						  <li class="divider"></li>
						  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=code_Announcement">邀请码</a></li>
						  <li class="divider"></li>
						  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=user_index_Announcement">用户中心</a></li>
						  <li class="divider"></li>
						  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=user_node_Announcement_node"><span>节点列表</span>普通节点</a></li>
						  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=user_node_Announcement_node_pro"><span>节点列表</span>pro节点</a></li>
						  <li class="divider"></li>
						  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=user_invite_Announcement_color_orange"><span>邀请好友</span>橙色</a></li>
						  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=user_invite_Announcement_color_blue"><span>邀请好友</span>蓝色</a></li>
					</ul>
				<li class="white-text"><a class="waves-effect waves-yellow" href="my.php" title="我的信息">
				<img src="<{$Gravatar_Email_img}>" alt="Gravatar_Email_img" class="circle user-image"><{$GetUserName}></a></li>
				<li><a class="waves-effect waves-yellow" href="logout.php">退出</a></li>
			</ul>
			<!-- 平板 手机等小屏幕显示的菜单 -->
			<ul id="nav-mobile" class="side-nav">	
				<li><a class="waves-effect waves-yellow" href="index.php">管理中心</a></li>
				<li><a class="waves-effect waves-yellow" href="node.php">节点编辑</a></li>
				<li><a class="waves-effect waves-yellow" href="user.php">查看用户</a></li>
				<li><a class="waves-effect waves-yellow" href="invite.php">邀请管理</a></li>
			      <!-- 修改公告 Trigger -->
			    <li class="no-padding">
			          <ul class="collapsible collapsible-accordion">
			            <li class="bold"><a class="collapsible-header waves-effect waves-yellow">修改公告<span class="mdi-hardware-keyboard-arrow-down"></span></a>
			              <div class="collapsible-body" style="display: none;">
			                <ul>
			                  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=index_Announcement">首页</a></li>
							  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=index_button">首页按钮</a></li>
							  <li class="divider"></li>
							  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=footer_Announcement">用户建议</a></li>
							  <li class="divider"></li>
							  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=tos_content">用户协议 </a></li>
						  	  <li class="divider"></li>
							  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=code_Announcement">邀请码</a></li>
							  <li class="divider"></li>
							  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=user_index_Announcement">用户中心</a></li>
							  <li class="divider"></li>
							  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=user_node_Announcement_node"><span>节点列表</span>普通节点</a></li>
							  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=user_node_Announcement_node_pro"><span>节点列表</span>pro节点</a></li>
							  <li class="divider"></li>
							  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=user_invite_Announcement_color_orange"><span>邀请好友</span>橙色</a></li>
							  <li><a class="waves-effect waves-yellow" href="change_announcement.php?ca=user_invite_Announcement_color_blue"><span>邀请好友</span>蓝色</a></li>
							  <li class="divider"></li>
			                </ul>
			              </div>
			            </li>
			          </ul>
		        </li>
				<li class="black-text"><a class="waves-effect waves-yellow" href="my.php" title="我的信息"><img src="<{$Gravatar_Email_img}>" alt="Gravatar_Email_img" class="circle user-image "><{$GetUserName}></a></li>
				<li><a class="waves-effect waves-yellow" href="logout.php">退出</a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
		</div>
	</nav>
</div>