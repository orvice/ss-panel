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
                     <!-- msg -->
                    <div id="msg-success" class="alert alert-info alert-dismissable" style="border: 1px solid rgb(50, 163, 213); text-align: center; z-index: 9999; width: 300px; left: 50%; margin-left: -150px !important; margin-top: -60px !important; position: fixed !important; display: none;">
                        <button type="button" class="close" id="ok-close" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-info"></i> 成功!</h4>
                        <p id="msg-success-p"></p>
                    </div>
                    <div id="msg-error" class="alert alert-warning alert-dismissable"  style="border: 1px solid rgb(255, 0, 0); text-align: center; z-index: 999; width: 300px; left: 50%; margin-left: -150px !important; margin-top: -60px !important; position: fixed !important; display: none;">
                        <button type="button" class="close" id="error-close" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-warning"></i> 出错了!</h4>
                        <p id="msg-error-p"></p>
                    </div>
                    <!-- form start -->
                    <form role="form" method="post" action="javascript:submit();">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="cate_title">节点名字</label>
                                <input  class="form-control" name="node_name" id="node_name">
                            </div>

                            <div class="form-group">
                                <label for="cate_title">节点地址</label>
                                <input  class="form-control" name="node_server" id="node_server">
                            </div>

                            <div class="form-group">
                                <label for="node_method">加密方式</label> <br>
                                <select id="node_method" class="form-control" onchange="changeForm(this.value)" >
                                  <option value="custom_node_method">自定义加密方式</option>
                                  <option value="rc4-md5">rc4-md5</option>
                                  <option value="aes-256-cfb">aes-256-cfb</option>
                                  <option value="aes-192-cfb">aes-192-cfb</option>
                                  <option value="aes-128-cfb">aes-128-cfb</option>
                                  <option value="rc4">rc4</option>
                                  <option value="salsa20">salsa20</option>
                                  <option value="chacha20">chacha20</option>
                                  <option value="table">table</option>
                                </select>
                            </div>

                            <div class="form-group" id="custom_node_method_css">
                                <label for="cate_title">自定义加密方式</label>
                                <input  class="form-control" name="custom_node_method" id="custom_node_method" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">节点描述</label>
                                <input  class="form-control" name="node_info" id="node_info" >
                            </div>

                            <div class="form-group">
                                <label for="cate_order">分类(0或者1)</label>
                                <input   class="form-control" name="node_type" id="node_type">
                            </div>

                            <div class="form-group">
                                <label for="cate_order">状态</label>
                                <input   class="form-control" name="node_status" id="node_status">
                            </div>

                            <div class="form-group">
                                <label for="cate_order">排序</label>
                                <input   class="form-control" name="node_order" id="node_order">
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" name="action" value="edit" class="btn btn-primary">添加</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.box -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<{include file='Public_javascript.tpl'}>
<!-- 在下面添加功能引用的js -->
<script>
// 过滤HTML标签以及&nbsp 来自：http://www.cnblogs.com/liszt/archive/2011/08/16/2140007.html
function removeHTMLTag(str) {
        str = str.replace(/<\/?[^>]*>/g,''); //去除HTML tag
        str = str.replace(/[ | ]*\n/g,'\n'); //去除行尾空白
        str = str.replace(/\n[\s| | ]*\r/g,'\n'); //去除多余空行
        str = str.replace(/&nbsp;/ig,'');//去掉&nbsp;
        return str;
}
</script>
<script>
function submit(){
    $.ajax({
            type:"POST",
            url:"node_add.php",
            dataType:"json",
            data:{
                node_name: $("#node_name").val(),
                node_server: $("#node_server").val(),
                node_method: $("#node_method").val()=="custom_node_method" ? $("#custom_node_method").val() : $("#node_method").val(),
                node_info: $("#node_info").val(),
                node_type: $("#node_type").val(),
                node_status: $("#node_status").val(),
                node_order: $("#node_order").val()
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
                $("#msg-error-p").html("发生错误："+jqXHR.status);
                $("#msg-error").hide(10);
                $("#msg-error").show(100);
                // 在控制台输出错误信息
                console.log(removeHTMLTag(jqXHR.responseText));
        }
    })
}
$("#ok-close").click(function(){
    $("#msg-success").hide(100);
})
$("#error-close").click(function(){
    $("#msg-error").hide(100);
})
function changeForm(value){
  if(value=="custom_node_method") {
      $('#custom_node_method_css').show(200);
  }else{
      $('#custom_node_method_css').hide(200);
  }
}
</script>
<{include file='user/footer.tpl'}>