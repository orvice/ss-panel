<{include file='admin/main.tpl'}>
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
            <div class="row">
                <div class="col-xs-12">
                    <p> <a class="btn btn-success btn-sm" href="node_add.php">添加</a> </p>
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>节点</th>
                                    <th>加密</th>
                                    <th>描述</th>
                                    <th>排序</th>
                                    <th>操作</th>
                                </tr>
                                <{foreach $node as $rs}>
                                    <tr>
                                        <td><{$rs['id']}></td>
                                        <td><{$rs['node_name']}></td>
                                        <td><{$rs['node_method']}></td>
                                        <td><{$rs['node_info']}></td>
                                        <td><{$rs['node_order']}></td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="node_edit.php?id=<{$rs['id']}>">编辑</a>
                                            <a class="btn btn-danger btn-sm" href="node_del.php?id=<{$rs['id']}>" onclick="JavaScript:return confirm('确定删除吗？')">删除</a>
                                        </td>
                                    </tr>
                                <{/foreach}>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<{include file='Public_javascript.tpl'}>
<!-- 在下面添加功能引用的js -->

<{include file='user/footer.tpl'}>