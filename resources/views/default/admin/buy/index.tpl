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
                                <th>订单ID</th>
                                <th>购买用户</th>
                                <th>购买套餐</th>
                                <th>订单状态</th>
                                <th>服务器</th>
                                <th>服务器状态</th>
                                <th>订单备注</th>
                                <th>更新时间</th>
                                <th>操作</th>
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
                                    <td>
                                        <a class="btn btn-info btn-xs" href="/admin/buy/{$buy->id}/edit">编辑</a>
                                        <a class="btn btn-danger btn-xs" id="delete" value="{$buy->id}" href="/admin/buy/{$buy->id}/delete">删除</a>
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