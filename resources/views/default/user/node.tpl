{include file='user/main.tpl'}

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
            <div class="col-md-12">
                <div class="callout callout-warning">
                    <h4>注意!</h4>
                    <p>请勿在任何地方公开节点地址！</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-th-list"></i>
                        <h3 class="box-title">节点</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        {foreach $nodes as $node}
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs pull-right">
                                <li>
                                    <a   href="./node/{$node->id}">
                                        查看配置文件/二维码
                                    </a>
                                </li>
                                <li class="pull-left header"><i class="fa fa-angle-right"></i> {$node->name}</li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1-1">
                                    <p> <a class="btn btn-xs bg-purple btn-flat margin" href="#">地址:</a> <code>{$node->server}</code>
                                        <a class="btn btn-xs bg-orange btn-flat margin" href="#">{$node->status}</a>
                                        {if $node->custom_method == 1}
                                            <a class="btn btn-xs bg-green btn-flat margin" href="#">{$user->method}</a>
                                        {else}
                                            <a class="btn btn-xs bg-green btn-flat margin" href="#">{$node->method}</a>
                                        {/if}
                                    </p>
                                    <p> {$node->info}</p>
                                </div><!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </div><!-- nav-tabs-custom -->
                        {/foreach}
                    </div><!-- /.box-body -->


                </div><!-- /.box -->
            </div><!-- /.col (left) -->

            <div class="col-md-4">
            </div><!-- /.col (right) -->

        </div><!-- /.row -->
        <!-- END PROGRESS BARS -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


{include file='user/footer.tpl'}