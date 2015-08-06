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
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-edit"></i> <span>修改公告</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                    <li><a href="change_announcement.php?ca=index_Announcement"><i class="fa fa-circle-o"></i><span>首页</span></a></li>
                    <li><a href="change_announcement.php?ca=index_button"><i class="fa fa-circle-o"></i><span>首页按钮</span></a></li>
                    <li><a href="change_announcement.php?ca=footer_Announcement"><i class="fa fa-circle-o"></i><span>用户建议</span></a></li>
                    <li><a href="change_announcement.php?ca=tos_content"><i class="fa fa-circle-o"></i><span>用户协议</span></a></li>
                    <li><a href="change_announcement.php?ca=code_Announcement"><i class="fa fa-circle-o"></i><span>邀请码</span></a></li>
                    <li><a href="change_announcement.php?ca=user_index_Announcement"><i class="fa fa-circle-o"></i><span>用户中心</span></a></li>
                    <li><a href="change_announcement.php?ca=user_node_Announcement_node"><i class="fa fa-circle-o"></i><span>节点列表普通节点</span></a></li>
                    <li><a href="change_announcement.php?ca=user_node_Announcement_node_pro"><i class="fa fa-circle-o"></i><span>节点列表pro节点</span></a></li>
                    <li><a href="change_announcement.php?ca=user_invite_Announcement_color_orange"><i class="fa fa-circle-o"></i><span>邀请好友橙色</span></a></li>
                    <li><a href="change_announcement.php?ca=user_invite_Announcement_color_blue"><i class="fa fa-circle-o"></i><span>邀请好友蓝色</span></a></li>
                  </ul>
                </li>
            </ul>
<{/block}>