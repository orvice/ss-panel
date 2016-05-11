{include file='admin/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            套餐管理
            <small>Package management</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <p> <a class="btn btn-success btn-sm" href="javascript:;">添加套餐</a> </p>
                <div class="box">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>流量套餐</th>
                                <th>套餐金额</th>
                                <th>套餐流量</th>
                                <th>套餐描述</th>
                                <th>套餐管理</th>
                            </tr>
                            <tr>
                                <td>流量套餐A</td>
                                <td>USD:2.98$</td>
                                <td>20GB</td>
                                <td>已使用锐速黑科技加速,可享1080P高清视频观看</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="javascript:;">编辑</a>
                                    <a class="btn btn-danger btn-xs" id="delete" value="1" href="javascript:;">删除</a>
                                </td>
                            </tr>

                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->


{include file='admin/footer.tpl'}
