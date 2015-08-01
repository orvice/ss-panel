<{config_load file='Announcement.conf' section='user_node'}><{* 加载模板公告内容配置 *}>
<{include file='user/main.tpl'}>
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                节点列表
                <small>Node List</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- START PROGRESS BARS -->
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <i class="fa fa-th-list"></i>
                            <h3 class="box-title">节点</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="callout callout-warning">
                                <{#Announcement_node#}><{* 普通节点公告内容 *}>
                            </div>
                            <{foreach $node0 as $row}>
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs pull-right">
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                操作 <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#myModal" href="javascript:void(0)" data-url="node_json.php?id=<{$row['id']}>" title="<{$row['node_name']}>" >配置文件</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#myModal" href="javascript:void(0)" data-url="node_qr.php?id=<{$row['id']}>" title="<{$row['node_name']}>" >二维码</a></li>
                                            </ul>
                                        </li>
                                        <li class="pull-left header"><i class="fa fa-angle-right"></i> <{$row['node_name']}></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1-1">
                                            <p> <a class="btn btn-xs bg-purple btn-flat margin" href="#">地址:</a> <code><{$row['node_server']}></code>
                                                <a class="btn btn-xs bg-orange btn-flat margin" href="#"><{$row['node_status']}></a>
                                                <a class="btn btn-xs bg-green btn-flat margin" href="#"><{$row['node_method']}></a>
                                            </p>
                                            <p> <{$row['node_info']}></p>
                                        </div><!-- /.tab-pane -->
                                    </div><!-- /.tab-content -->
                                </div><!-- nav-tabs-custom -->
                            <{/foreach}>
                        </div><!-- /.box-body -->


                    </div><!-- /.box -->
                </div><!-- /.col (left) -->

                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <i class="fa fa-code"></i>
                            <h3 class="box-title">Pro节点</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="callout callout-warning">
                                <{#Announcement_node_pro#}><{* pro节点公告内容 *}>
                            </div>
                            <{foreach $node1 as $row}>
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs pull-right">
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                操作 <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#myModal" href="javascript:void(0)" data-url="node_json.php?id=<{$row['id']}>" title="<{$row['node_name']}>" >配置文件</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#myModal" href="javascript:void(0)" data-url="node_qr.php?id=<{$row['id']}>" title="<{$row['node_name']}>" >二维码</a></li>
                                            </ul>
                                        </li>
                                        <li class="pull-left header"><i class="fa fa-angle-right"></i> <{$row['node_name']}></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1-1">
                                            <p> <a class="btn btn-xs bg-purple btn-flat margin" href="#">地址:</a> <code><{$row['node_server']}></code>
                                                <a class="btn btn-xs bg-orange btn-flat margin" href="#"><{$row['node_status']}></a>
                                                <a class="btn btn-xs bg-green btn-flat margin" href="#"><{$row['node_method']}></a>
                                            </p>
                                            <p><{$row['node_info']}></p>
                                        </div><!-- /.tab-pane -->
                                    </div><!-- /.tab-content -->
                                </div><!-- nav-tabs-custom -->
                            <{/foreach}>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (right) -->
                 
            </div><!-- /.row -->
            <!-- END PROGRESS BARS -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

<{include file='Public_javascript.tpl'}>
<!-- 在下面添加功能引用的js -->

<script src="<{$resources_dir}>/asset/js/modal.js" type="text/javascript"></script>
<{include file='user/footer.tpl'}>