{include file='admin/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            邀请
            <small>Invite</small>
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
                        <h3 class="box-title">添加邀请码</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="/admin/invite" target="_blank">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="cate_title">邀请码前缀</label>
                                <input  class="form-control" name="code_sub" placeholder="小于8个字符"  >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">邀请码类别</label>
                                <input  class="form-control" name="code_type"  placeholder="0为公开，其他数字为对应用户的UID" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">邀请码数量</label>
                                <input  class="form-control" name="code_num" placeholder="要生成的邀请码数量"  >
                            </div>


                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" name="action" value="add" class="btn btn-primary">添加</button>
                        </div>

                        <div class="box-footer">
                            <p>邀请码类别0的<a href="../code.php">在这里查看</a> </p>
                        </div>
                    </form>
                </div>
            </div><!-- /.box -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function(){
        $("#invite").click(function(){
            $.ajax({
                type:"POST",
                url:"/user/invite",
                dataType:"json",
                success:function(data){
                    window.location.reload();
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                }
            })
        })
    })
</script>

{include file='admin/footer.tpl'}