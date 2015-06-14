<{include file='admin/main.tpl'}>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            节点添加
            <small>Add Node</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">添加节点</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="node_add.php">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="cate_title">节点名字</label>
                                <input  class="form-control" name="node_name" value="" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">节点地址</label>
                                <input  class="form-control" name="node_server" value="" >
                            </div>

                            <div class="form-group">
                                <label for="cate_method">加密方式</label>
                                <input  class="form-control" name="node_method" value="" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">节点描述</label>
                                <input  class="form-control" name="node_info" value="" >
                            </div>

                            <div class="form-group">
                                <label for="cate_order">分类(0或者1)</label>
                                <input   class="form-control" name="node_type"  value="" >
                            </div>

                            <div class="form-group">
                                <label for="cate_order">状态</label>
                                <input   class="form-control" name="node_status"  value="" >
                            </div>

                            <div class="form-group">
                                <label for="cate_order">排序</label>
                                <input   class="form-control" name="node_order"  value="" >
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" name="action" value="add" class="btn btn-primary">添加</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.box -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<{include file='Public_javascript.tpl'}>
<!-- 在下面添加功能引用的js -->

<{include file='user/footer.tpl'}>