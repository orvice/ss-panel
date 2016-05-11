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
                            {foreach $packages as $package}
                            <tr>
                                <td>{$package->name}</td>
                                <td>{$package->money_type}:{$package->money}$</td>
                                <td>{$package->flow}GB</td>
                                <td>{$package->desc}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="/admin/package/{$package->id}/edit">编辑</a>
                                    <a class="btn btn-danger btn-xs" id="delete" value="{$package->id}" href="/admin/package/{$package->id}/delete">删除</a>
                                </td>
                            </tr>
                            {/foreach}
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->


{include file='admin/footer.tpl'}
