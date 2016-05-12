{include file='user/main.tpl'}

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            我的信息
            <small>User Profile</small>
        </h1>
    </section>
    <!-- Main content --><!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="fa fa-user"></i>

                        <h3 class="box-title">我的帐号</h3>
                    </div>
                    <div class="box-body">
                        <div class="user-panel">
                            <div class="pull-left image">
                                <img style="width: 60px;height: 60px;" src="{$user->gravatar}" class="img-circle" alt="User Image"/>
                            </div>
                            <div class="pull-left">
                                <dl class="dl-horizontal" style="margin-top: 8px;">
                                    <dt style="width: 60px;">昵称:</dt>
                                    <dd style="margin-left: 70px;">{$user->user_name}</dd>
                                    <dt style="width: 60px;">邮箱:</dt>
                                    <dd style="margin-left: 70px;">{$user->email}</dd>
                                </dl>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer">
                        <a class="btn btn-danger btn-sm" href="kill">删除我的账户</a>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="fa fa-exchange"></i>

                        <h3 class="box-title">我的购买记录</h3>
                    </div>
                    <div class="box-body">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>订单ID</th>
                                    <th>购买用户</th>
                                    <th>购买套餐</th>
                                    <th>订单状态</th>
                                    <th>服务器</th>
                                    <th>服务器状态</th>
                                    <th>订单备注</th>
                                    <th>更新时间</th>
                                </tr>
                                {foreach $buys as $buy}
                                    <tr>
                                        <td>#{$buy->id}</td>
                                        <td>{$buy->nickName}</td>
                                        <td>{$buy->packageName}</td>
                                        <td>
                                            {if $buy->status == 0}<span class="label label-default" >未支付</span>{/if}
                                            {if $buy->status == 1}<span class="label label-warning" >待发货</span>{/if}
                                            {if $buy->status == 2}<span class="label label-success" >已完成</span>{/if}
                                        </td>
                                        <td>{$buy->serverName}</td>
                                        <td>{$buy->serverStatus}</td>
                                        <td>{$buy->remark}</td>
                                        <td>{$buy->update_at|date_format:"Y-m-d H:i:s"}</td>
                                    </tr>
                                {/foreach}
                            </table>
                        </div><!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->
{include file='user/footer.tpl'}