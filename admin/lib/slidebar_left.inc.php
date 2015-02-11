<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo get_gravatar($admin_email);?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>欢迎, <?php echo $_COOKIE[admin_name];?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li >
                    <a href="index.php">
                        <i class="fa fa-dashboard"></i> <span>管理中心</span>
                    </a>
                </li>

                <li >
                    <a href="node.php">
                        <i class="fa fa-sitemap"></i> <span>节点编辑</span>
                    </a>
                </li>

                <li >
                    <a href="user.php">
                        <i class="fa fa-user"></i> <span>查看用户</span>
                    </a>
                </li>

                <li  >
                    <a href="invite.php">
                        <i class="fa fa-users"></i> <span>邀请管理</span>
                    </a>
                </li>
 

                <li  >
                    <a href="sys.php">
                        <i class="fa fa-align-left"></i> <span>系统信息</span>
                    </a>
                </li>

                <?php include_once '../ana.php'; ?>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
