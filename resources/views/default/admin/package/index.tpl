{include file='admin/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            套餐管理
            <small>Package management</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div id="msg-success" class="alert alert-success alert-dismissable" style="display: none;">
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
        </div>
        <div class="row">
            <div class="col-xs-12">
                <p> <a class="btn btn-success btn-sm" href="/admin/package/create">添加套餐</a> </p>
                <div class="box">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>套餐名称</th>
                                <th>套餐类型</th>
                                <th>套餐金额</th>
                                <th>套餐流量</th>
                                <th>套餐描述</th>
                                <th>套餐管理</th>
                            </tr>
                            {foreach $packages as $package}
                            <tr>
                                <td>{$package->name}</td>
                                <td>{if $package->server == '0'}共享流量服务器{else}独立专线服务器{/if}</td>
                                <td>{$package->money_type}:{$package->money}$</td>
                                <td>{$package->flow}GB</td>
                                <td>{$package->desc}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="/admin/package/{$package->id}/edit">编辑</a>
                                    <a class="btn btn-danger btn-xs" id="delete" value="{$package->id}" href="javascript:deletePackage({$package->id});">删除</a>
                                </td>
                            </tr>
                            {/foreach}
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    function deletePackage(id){
        $.ajax({
            type:"DELETE",
            url:"/admin/package/"+id,
            dataType:"json",
            data:null,
            success:function(data){
                if(data.ret){
                    $("#msg-error").hide(100);
                    $("#msg-success").show(100);
                    $("#msg-success-p").html(data.msg);
                    window.setTimeout("location.href='/admin/package'", 2000);
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
    $(document).ready(function(){
        $("html").keydown(function(event){
            if(event.keyCode==13){
                login();
            }
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
