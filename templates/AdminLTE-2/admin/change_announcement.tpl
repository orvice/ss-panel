<{include file='admin/main.tpl'}>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
        <h1>
            修改公告
            <small>Change announcement</small>
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
                        <h3 class="box-title">修改<{$announcement_title}></h3>
                    </div><!-- /.box-header -->
                        <div class="box-body">

                        <form role="form" method="post" action="javascript:void(0);">
                            <div class="form-group">
                                <input type="text" class="form-control"  id="announcement_name" value="<{$announcement_name}>" style="display:none" >
                            </div>

                            <div class="form-group">
                                <textarea id="new_content" type="text" name="new_content" class="textarea" placeholder="请输入内容" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><{$original_content}></textarea>
                            </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="Submit" id="Submit" name="action" value="edit" class="btn btn-primary">修改</button>
                        </div>
                        </form>
                        <div id="msg-success" class="alert alert-info alert-dismissable" style="display: none;">
                            <button type="button" class="close" id="ok-close" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-info"></i> 成功!</h4>
                            <p id="msg-success-p"></p>
                        </div>
                        <div id="msg-error" class="alert alert-warning alert-dismissable" style="display: none;">
                            <button type="button" class="close" id="error-close" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> 出错了!</h4>
                            <p id="msg-error-p"></p>
                        </div>
                </div>
            </div><!-- /.box -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<{include file='Public_javascript.tpl'}>
<!-- 在下面添加功能引用的js -->

<script>
    $(document).ready(function(){
        $("#Submit").click(function(){
            $.ajax({
                    type:"POST",
                    url:"_change_announcement.php",
                    dataType:"json",
                    data:{
                        announcement_name: $("#announcement_name").val(),
                        new_content: $("#new_content").val()
                    },
                success:function(data){
                    if(data.ok){
                        $("#msg-error").hide(10);
                        $("#msg-success").hide(10);
                        $("#msg-success").show(100);
                        $("#msg-success-p").html(data.msg);
                    }else{
                        $("#msg-error").show(100);
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    $("#msg-error").hide(10);
                    $("#msg-error").show(100);
                    $("#msg-error-p").html("发生错误："+jqXHR.status);
                }
            })
        })
        $("#ok-close").click(function(){
            $("#msg-success").hide(100);
        })
        $("#error-close").click(function(){
            $("#msg-error").hide(100);
        })
    })
</script>

<{include file='user/footer.tpl'}>