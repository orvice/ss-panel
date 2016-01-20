{include file='admin/main.tpl'}

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

                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">节点名字</label>
                                <input  class="form-control" id="name" value="" >
                            </div>

                            <div class="form-group">
                                <label for="server">节点地址</label>
                                <input  class="form-control" id="server" value="" >
                            </div>

                            <div class="form-group">
                                <label for="method">加密方式</label>
                                <input  class="form-control" name="method" value="" >
                            </div>

                            <div class="form-group">
                                <label for="method">是否支持用户自定义加密</label>
                                <input  class="form-control" id="custum_method" value=""  placeholder="1 支持 0不支持 ">
                            </div>


                            <div class="form-group">
                                <label for="info">节点描述</label>
                                <input  class="form-control" id="info" value="" >
                            </div>

                            <div class="form-group">
                                <label for="type">是否显示</label>
                                <input   class="form-control" id="type"  value="" placeholder="0隐藏/1显示" >
                            </div>

                            <div class="form-group">
                                <label for="status">状态</label>
                                <input   class="form-control" id="status"  value="" >
                            </div>

                            <div class="form-group">
                                <label for="order">排序</label>
                                <input   class="form-control" id="order"  value="" >
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" name="action" value="add" class="btn btn-primary">添加</button>
                        </div>

                </div>
            </div><!-- /.box -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


{include file='admin/footer.tpl'}