<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo get_gravatar($user_email);?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>欢迎, <?php echo $_COOKIE[user_name];?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="active">
                    <a href="index.php">
                        <i class="fa fa-dashboard"></i> <span>用户中心</span>
                    </a>
                </li>

                <li >
                    <a href="node.php">
                        <i class="fa fa-sitemap"></i> <span>节点列表</span>
                    </a>
                </li>

                <li >
                    <a href="my.php">
                        <i class="fa fa-user"></i> <span>我的信息</span>
                    </a>
                </li>

                <li >
                    <a href="profile_update.php">
                        <i class="fa  fa-pencil"></i> <span>修改资料</span>
                    </a>
                </li>

                <li  >
                    <a href="invite.php">
                        <i class="fa fa-users"></i> <span>邀请好友</span>
                    </a>
                </li>

                <li  >
                    <a href="code.php">
                        <i class="fa fa-user"></i> <span>公共邀请</span>
                    </a>
                </li>
 
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
