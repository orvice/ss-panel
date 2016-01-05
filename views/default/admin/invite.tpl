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

                        <div class="box-body">

                            <div id="msg-success" class="alert alert-info alert-dismissable" style="display: none;">
                                <button type="button" class="close" id="ok-close" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-info"></i> 成功!</h4>
                                <p id="msg-success-p"></p>
                            </div>

                            <div class="form-group">
                                <label for="cate_title">邀请码前缀</label>
                                <input  class="form-control" id="prefix" placeholder="小于8个字符"  >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">邀请码类别</label>
                                <input  class="form-control" id="uid"  placeholder="0为公开，其他数字为对应用户的UID" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">邀请码数量</label>
                                <input  class="form-control" id="num" placeholder="要生成的邀请码数量"  >
                            </div>


                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button id="invite" type="submit" name="action" value="add" class="btn btn-primary">添加</button>
                        </div>

                        <div class="box-footer">
                            <p>邀请码类别0的<a href="/code">在这里查看</a> </p>
                        </div>



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
                url:"/admin/invite",
                dataType:"json",
                data:{
                    prefix: $("#prefix").val(),
                    uid: $("#uid").val(),
                    num: $("#num").val()
                },
                success:function(data){
                    if(data.ret){
                        $("#msg-success").show(100);
                        $("#msg-success-p").html(data.msg);
                        //window.setTimeout("location.href='/admin/invite'", 2000);
                    }
                    // window.location.reload();
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                }
            })
        })
    })
</script>

{include file='admin/footer.tpl'}