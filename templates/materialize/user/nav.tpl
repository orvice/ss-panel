<div class="navbar-fixed hoverable">
	<nav class="light-blue lighten-1" role="navigation">
		<div class="nav-wrapper container"><a id="logo-container" href="<{$site_url}>" class="brand-logo"><{$site_name}></a>
			<ul class="right hide-on-med-and-down">
				<li><a class="waves-effect waves-yellow" href="index.php">用户中心</a></li>
				<li><a class="waves-effect waves-yellow" href="node.php">节点列表</a></li>
				<li><a class="waves-effect waves-yellow" href="update.php">修改资料</a></li>
				<li><a class="waves-effect waves-yellow" href="invite.php">邀请好友</a></li>
				<li><a class="waves-effect waves-yellow" href="sys.php">系统信息</a></li>
				<li class="white-text"><a class="waves-effect waves-yellow" href="my.php" title="我的信息"><img src="<{$Gravatar_Email_img}>" alt="Gravatar_Email_img" class="circle user-image"><{$GetUserName}></a></li>
				<li><a class="waves-effect waves-yellow" href="logout.php">退出</a></li>
			</ul>
			<ul id="nav-mobile" class="side-nav">	
				<li><a class="waves-effect waves-yellow" href="index.php">用户中心</a></li>
				<li><a class="waves-effect waves-yellow" href="node.php">节点列表</a></li>
				<li><a class="waves-effect waves-yellow" href="update.php">修改资料</a></li>
				<li><a class="waves-effect waves-yellow" href="invite.php">邀请好友</a></li>
				<li><a class="waves-effect waves-yellow" href="sys.php">系统信息</a></li>
				<li class="black-text"><a class="waves-effect waves-yellow" href="my.php" title="我的信息"><img src="<{$Gravatar_Email_img}>" alt="Gravatar_Email_img" class="circle user-image "><{$GetUserName}></a></li>
				<li><a class="waves-effect waves-yellow" href="logout.php">退出</a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
		</div>
	</nav>
</div>