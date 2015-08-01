<{config_load file='Announcement.conf' section='user_invite'}><{* 加载模板公告内容配置 *}>
<{include file='user/main.tpl'}>
    <!-- =============================================== -->

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
                            <h3 class="box-title">邀请</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p>当前您可以生成<code><{$InviteNum}></code>个邀请码。  </p>
                            <{if $InviteNum !=0}>
                                <button id="invite" class="btn btn-sm btn-info">生成我的邀请码</button>
                            <{/if}>

                            <div id="msg-error" class="alert alert-warning alert-dismissable" style="display:none">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-warning"></i> 出错了!</h4>
                                <p id="msg-error-p"></p>
                            </div>

                        </div><!-- /.box -->

                        <div class="box-header">
                            <h3 class="box-title">我的邀请码</h3>
                        </div><!-- /.box-header -->

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>###</th>
                                    <th>邀请码</th>
                                    <th>状态</th>
                                </tr>
                                </thead>

                                <tbody>
                                <{foreach $code as $data}>
                                    <tr>
                                        <td><{$a++}></td>
                                        <td><{$data['code']}></td>
                                        <td>可用</td>
                                    </tr>
                                <{/foreach}>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-body">

                            <div class="callout callout-warning">
                                <{#Announcement_color_orange#}><{* 橙色公告内容 *}>
                            </div>

                            <div class="callout callout-info">
                                <{#Announcement_color_blue#}><{* 蓝色公告内容 *}>
                            </div>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (right) -->
                
                </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<{include file='Public_javascript.tpl'}>
<!-- 在下面添加功能引用的js -->

<{include file='user/footer.tpl'}>

<script>
    $(document).ready(function(){
        $("#invite").click(function(){
            $.ajax({
                type:"GET",
                url:"_invite.php",
                dataType:"json",
                success:function(data){
                    if(data.ok){
                        window.location.reload();
                    }else{
                        $("#msg-error").show();
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                }
            })
        })
    })
</script>
