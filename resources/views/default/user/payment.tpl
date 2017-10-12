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
                <div id="msg-error" class="alert alert-warning alert-dismissable" style="display: none;">
                    <button type="button" class="close" id="error-close" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> 出错了!</h4>

                    <p id="msg-error-p"></p>
                </div>
            </div>
        </div>
        <!-- START PROGRESS BARS -->
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <div class="callout callout-warning">
                    <h4>说明</h4>

                    <p>支付遇到问题请联系 Telegram <a href="https://t.me/network2645">@network2645</a> 。</p>

                </div>

                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="fa fa-rocket"></i>

                        <h3 class="box-title">包月服务开通/续费</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p>每月流量 100 G，计算方法是实际使用流量 * 流量比例。一个月按照 30 天计算，30 天后已用流量将重置。</p>
                        <p></p>
                        <div>
                            <p>选择套餐：</p>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">×</span>
                                    <input type="number" name="length" min="1" placeholder="输入月数" class="form-control" value="3">
                                    <span class="input-group-addon">个月</span>
                                    <span class="input-group-addon">=<span id="price1">30</span>元</span>
                                    <div class="input-group-btn">
                                        <button id="mo" class="btn btn-primary">点击开通</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="fa fa-rocket"></i>

                        <h3 class="box-title">流量包开通</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p>如果每月 100 G 的流量不能满足你的使用，可以叠加流量包。流量包只当前月有效，流量重置时流量包也随之过期。</p>
                        <p></p>
                        <div>
                            <p>选择套餐：</p>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">×</span>
                                    <input type="number" name="amount" placeholder="输入流量" min="1" class="form-control" value="100">
                                    <span class="input-group-addon">GiB</span>
                                    <span class="input-group-addon">=<span id="price2">10</span>元</span>
                                    <div class="input-group-btn">
                                        <button id="da" class="btn btn-primary">点击开通</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {*<!-- general form elements -->
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
                                <tr>
                                    <td><input type="hidden" name="on0" value="时长">时长</td>
                                </tr>
                                <tr>
                                    <td><select name="os0">
                                            <option value="1 Mo">1 Mo $ 2.99 USD</option>
                                            <option value="2 Mo">2 Mo $ 4.19 USD</option>
                                            <option value="3 Mo">3 Mo $ 4.99 USD</option>
                                        </select></td>
                                </tr>
                            </table>
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="image" src="https://www.paypalobjects.com/zh_XC/C2/i/btn/btn_buynowCC_LG.gif"
                                   border="0" name="submit" alt="PayPal——最安全便捷的在线支付方式！">
                            <img alt="" border="0" src="https://www.paypalobjects.com/zh_XC/i/scr/pixel.gif" width="1"
                                 height="1">
                        </form>

                    </div>
                </div>*}

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
    $("[name='length']").keyup(function () {
        $("#price1").text(
            Math.ceil($("[name='length']").val() * (10 + (7.5 - 2.5 * $("[name='length']").val() > 0 ? 7.5 - 2.5 * $("[name='length']").val() : 0)))
        );
        $("[name='length']").val(Math.ceil($("[name='length']").val()));
    });
    $("[name='length']").change(function () {
        $("#price1").text(
            Math.ceil($("[name='length']").val() * (10 + (7.5 - 2.5 * $("[name='length']").val() > 0 ? 7.5 - 2.5 * $("[name='length']").val() : 0)))
        );
        $("[name='length']").val(Math.ceil($("[name='length']").val()));
    });
    $("[name='amount']").keyup(function () {
        $("#price2").text(
            Math.ceil($("[name='amount']").val() / 10)
        );
    });
    $("[name='amount']").change(function () {
        $("#price2").text(
            Math.ceil($("[name='amount']").val() / 10)
        )
    });
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
        });
        $("#mo").click(function submit_prolong() {
            $.ajax({
                type: "POST",
                url: "/user/payment/eapay/mo",
                dataType: "json",
                data: {
                    length: $("[name='length']").val()
                },
                success: function (data) {
                    if (data.status) {
                        window.location.href = "https://api.eapay.cc/v1/order/pay/no/" + data.data.no;
                    } else {
                        $("#msg-error").hide(10);
                        $("#msg-error").show(100);
                        $("#msg-error-p").html("出错啦！");
                    }
                },
                error: function (jqXHR) {
                    $("#msg-error").hide(10);
                    $("#msg-error").show(100);
                    $("#msg-error-p").html("发生错误：" + jqXHR.status);
                }
            });
        });
        $("#da").click(function submit_prolong() {
            $.ajax({
                type: "POST",
                url: "/user/payment/eapay/da",
                dataType: "json",
                data: {
                    amount: $("[name='amount']").val()
                },
                success: function (data) {
                    if (data.status) {
                        window.location.href = "https://api.eapay.cc/v1/order/pay/no/" + data.data.no;
                    } else {
                        $("#msg-error").hide(10);
                        $("#msg-error").show(100);
                        $("#msg-error-p").html("出错啦！");
                    }
                },
                error: function (jqXHR) {
                    $("#msg-error").hide(10);
                    $("#msg-error").show(100);
                    $("#msg-error-p").html("发生错误：" + jqXHR.status);
                }
            });
        });
    })
</script>


{include file='user/footer.tpl'}