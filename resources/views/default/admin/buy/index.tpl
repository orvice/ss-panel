{include file='admin/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            购买记录
            <small>Buy List</small>
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
                                <th>ID</th>
                                <th>购买用户</th>
                                <th>购买套餐</th>
                                <th>支付状态</th>
                                <th>订单状态</th>
                                <th>服务器状态</th>
                                <th>更新时间</th>
                                <th>操作</th>
                            </tr>
                            {foreach $buys as $user}
                                <tr>
                                    <td>#{$user->id}</td>
                                    <td>{$user->email}</td>
                                    <td>{$user->port}</td>
                                    <td>{$user->enable}</td>
                                    <td>{$user->method}</td>
                                    <td>{$user->usedTraffic()}/{$user->enableTraffic()}</td>
                                    <td>{$user->lastSsTime()}</td>
                                    <td>
                                        <a class="btn btn-info btn-xs" href="/admin/user/{$user->id}/edit">编辑</a>
                                        <a class="btn btn-danger btn-xs" id="delete" value="{$user->id}" href="/admin/user/{$user->id}/delete">删除</a>
                                    </td>
                                </tr>
                            {/foreach}
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<script>
    $(document).ready(function(){
        function delete(){
            $.ajax({
                type:"DELETE",
                url:"/admin/user/",
                dataType:"json",
                data:{
                    name: $("#name").val()
                },
                success:function(data){
                    if(data.ret){
                        $("#msg-error").hide(100);
                        $("#msg-success").show(100);
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='/admin/user'", 2000);
                    }else{
                        $("#msg-error").hide(10);
                        $("#msg-error").show(100);
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    $("#msg-error").hide(10);
                    $("#msg-error").show(100);
                    $("#msg-error-p").html("发生错误："+jqXHR.status);
                }
            });
        }
        $("html").keydown(function(event){
            if(event.keyCode==13){
                login();
            }
        });
        $("#delete").click(function(){
            delete();
        });
        $("#ok-close").click(function(){
            $("#msg-success").hide(100);
        });
        $("#error-close").click(function(){
            $("#msg-error").hide(100);
        });
    })
</script>

{include file='admin/footer.tpl'}