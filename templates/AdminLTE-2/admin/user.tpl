<{include file='admin/main.tpl'}>
    <!-- 加载dataTables样式文件 dataTables.bootstrap.css -->
    <link href="<{$resources_dir}>/asset/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户管理
                <small>User Manage</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>用户名</th>
                                    <th>邮箱</th>
                                    <th>端口</th>
                                    <th>总流量</th>
                                    <th>剩余<br />流量</th>
                                    <th>已用<br />流量</th>
                                    <th>最后签到</th>
                                    <th>邀请码</th>
                                    <th>操作</th>
                                </tr>
                              </thead>
                              <tbody>
                                <{foreach $us as $rs}>
                                    <tr>
                                        <td><{$rs['uid']}></td>
                                        <td><{$rs['user_name']}></td>
                                        <td><{$rs['email']}></td>
                                        <td><{$rs['port']}></td>
                                        <td><{\Ss\Etc\Comm::flowAutoShow($rs['transfer_enable'])}></td>
                                        <td><{\Ss\Etc\Comm::flowAutoShow(($rs['transfer_enable']-$rs['u']-$rs['d']))}></td>
                                        <td><{\Ss\Etc\Comm::flowAutoShow(($rs['u']+$rs['d']))}></td>
                                        <td><{date('Y-m-d H:i:s',$rs['last_check_in_time'])}></td>
                                        <td><{$rs['invite_num']}></td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="user_edit.php?uid=<{$rs['uid']}>">查看</a>
                                            <a class="btn btn-danger btn-sm" href="user_del.php?uid=<{$rs['uid']}>" onclick="JavaScript:return confirm('确定删除吗？')">删除</a>
                                        </td>
                                    </tr>
                                <{/foreach}>
                              </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<{include file='Public_javascript.tpl'}>
<!-- 在下面添加功能引用的js -->

<!-- 下面加载 dataTables 要用的 js 文件 -->
<script src="<{$resources_dir}>/asset/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<{$resources_dir}>/asset/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<script type="text/javascript">
  $(function () {
    $("#example1").dataTable();
  });
</script>

<{include file='user/footer.tpl'}>