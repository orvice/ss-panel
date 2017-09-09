{include file='user/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            支付
            <small>Payment</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div id="msg-info" class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>
                        <i class="icon fa fa-info"></i>
                        你知道吗？被你介绍的朋友在第一次充值的时候可以获得15天的额外时长，你自己也可以获得15天的时长返利！
                    </h4>
                </div>
            </div>
        </div>
        <!-- START PROGRESS BARS -->
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <div class="callout callout-warning">
                    <h4>说明</h4>

                    <p>你可以使用 PayPal 来付款（美元结算），也可以加群 490544191 联系群内管理员付款（软妹币结算）。</p>

                    <p>软妹币结算的价格为：15/月，25/两个月，30/三个月。</p>

                    <p>加群请注明注册邮箱。</p>
                </div>

                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="fa fa-rocket"></i>

                        <h3 class="box-title">PayPal 付款</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="HTG2LX3SCCAZ8">
                            <table>
                                <tr><td><input type="hidden" name="on0" value="时长">时长</td></tr><tr><td><select name="os0">
                                            <option value="1 Mo">1 Mo $ 2.99 USD</option>
                                            <option value="2 Mo">2 Mo $ 4.19 USD</option>
                                            <option value="3 Mo">3 Mo $ 4.99 USD</option>
                                        </select> </td></tr>
                            </table>
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="image" src="https://www.paypalobjects.com/zh_XC/C2/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal——最安全便捷的在线支付方式！">
                            <img alt="" border="0" src="https://www.paypalobjects.com/zh_XC/i/scr/pixel.gif" width="1" height="1">
                        </form>

                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header">
                        <i class="fa fa-users"></i>
                        <h3 class="box-title">自助缴费记录</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>##</th>
                                <th>用户名</th>
                                <th>状态</th>
                                <th>注册时间</th>
                                <th>上次续费时间</th>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div>
            </div>
            <!-- /.col (right) -->
        </div>
        <!-- /.row --><!-- END PROGRESS BARS -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function () {
        $("#checkin").click(function () {
            $.ajax({
                type: "POST",
                url: "/user/checkin",
                dataType: "json",
                success: function (data) {
                    $("#checkin-msg").html(data.msg);
                    $("#checkin-btn").hide();
                },
                error: function (jqXHR) {
                    alert("发生错误：" + jqXHR.status);
                }
            })
        })
    })
</script>


{include file='user/footer.tpl'}