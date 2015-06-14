<{extends file='user/main.tpl'}> <{* 继承父模板 *}>
<{block name=menu}> <{* 覆盖父模板块的内容为自己的内容 *}>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li>
                    <a href="index.php">
                        <i class="fa fa-dashboard"></i> <span>管理中心</span>
                    </a>
                </li>

                <li>
                    <a href="node.php">
                        <i class="fa fa-sitemap"></i> <span>节点编辑</span>
                    </a>
                </li>

                <li>
                    <a href="user.php">
                        <i class="fa fa-user"></i> <span>查看用户</span>
                    </a>
                </li>

                <li>
                    <a href="invite.php">
                        <i class="fa fa-users"></i> <span>邀请管理</span>
                    </a>
                </li>

            </ul>
<{/block}>