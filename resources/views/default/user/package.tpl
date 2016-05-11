{include file='user/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            购买流量
            <small>Buy traffic</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>套餐名称</th>
                                <th>套餐类型</th>
                                <th>套餐金额</th>
                                <th>套餐流量</th>
                                <th>套餐描述</th>
                                <th>套餐购买</th>
                            </tr>
                            {foreach $packages as $package}
                            <tr>
                                <td>{$package->name}</td>
                                <td>{if $package->server == '0'}独立专线服务器{else}共享流量服务器{/if}</td>
                                <td>{$package->money_type}:{$package->money}$</td>
                                <td>{$package->flow}GB</td>
                                <td>{$package->desc}</td>
                                <td>
                                    <a class="btn btn-danger btn-xs" id="delete" value="{$package->id}" href="./buy/{$package->id}">购买</a>
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


{include file='user/footer.tpl'}
