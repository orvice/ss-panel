{include file='admin/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			添加节点

			<small>Add Node</small>
			<small><small>(如需修改加密方式、协议及混淆插件，请至用户管理界面修改)</small></small>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div id="msg-success" class="alert alert-success alert-dismissable" style="display: none;">
					<button type="button" class="close" id="ok-close" aria-hidden="true">&times;</button>
					<h4>
					<i class="icon fa fa-info"></i> 成功!</h4>

						<p id="msg-success-p"></p>
					</div>
					<div id="msg-error" class="alert alert-warning alert-dismissable" style="display: none;">
						<button type="button" class="close" id="error-close" aria-hidden="true">&times;</button>
						<h4>
						<i class="icon fa fa-warning"></i> 出错了!</h4>

							<p id="msg-error-p"></p>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- left column -->
					<div class="col-md-12">
						<!-- general form elements -->
						<div class="box box-primary">
							<div class="box-body">
								<div class="form-horizontal">
									<div class="row">
										<fieldset class="col-sm-6">
											<legend>连接信息</legend>

											<div class="form-group">
												<label for="title" class="col-sm-3 control-label">节点名称</label>


												<div class="col-sm-9">
													<input class="form-control" id="name" value="">
												</div>
											</div>

											<div class="form-group">
												<label for="server" class="col-sm-3 control-label">节点地址</label>


												<div class="col-sm-9">
													<input class="form-control" id="server" value="">
												</div>
											</div>


											<div class="form-group">
												<label for="protocol" class="col-sm-3 control-label">默认协议插件</label>


												<div class="col-sm-9">
													<select class="form-control" id="protocol" onchange="disprotocolparam();" disabled="disabled">
														<option value="origin" selected="selected">origin</option>
														<option value="verify_simple">verify_simple</option>
														<option value="verify_deflate">verify_deflate</option>
														<option value="verify_sha1">verify_sha1</option>
														<option value="auth_simple">auth_simple</option>
														<option value="auth_sha1">auth_sha1</option>
														<option value="auth_sha1_compatible">auth_sha1_compatible</option>
														<option value="auth_sha1_v2">auth_sha1_v2</option>
														<option value="auth_sha1_v2_compatible">auth_sha1_v2_compatible</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label" for="protocol_param">默认协议参数</label>

												<div class="col-sm-9">
													<input class="form-control" id="protocol_param" type="text" value="" readonly="true">
												</div>
											</div>

											<div class="form-group">
												<label for="obfs" class="col-sm-3 control-label">默认混淆插件</label>


												<div class="col-sm-9">
													<select class="form-control" id="obfs" onchange="disobfsparam();" disabled="disabled">
														<option value="plain" selected="selected">plain</option>
														<option value="http_post">http_post</option>
														<option value="http_post_compatible">http_post_compatible</option>
														<option value="http_simple">http_simple</option>
														<option value="http_simple_compatible">http_simple_compatible</option>
														<option value="tls_simple">tls_simple</option>
														<option value="random_head">random_head</option>
														<option value="tls1.0_session_auth">tls1.0_session_auth</option>
														<option value="tls1.0_session_auth_compatible">tls1.0_session_auth_compatible</option>
														<option value="tls1.2_ticket_auth">tls1.2_ticket_auth</option>
														<option value="tls1.2_ticket_auth_compatible">tls1.2_ticket_auth_compatible</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label" for="obfs_param">默认混淆参数</label>

												<div class="col-sm-9">
													<input class="form-control" id="obfs_param" type="text" value="" readonly="true">
												</div>
											</div>

											<div class="form-group">
												<label for="method" class="col-sm-3 control-label">默认加密方式</label>


												<div class="col-sm-9">
													<select class="form-control" id="method" disabled="disabled">
														<option value="aes-256-cfb">aes-256-cfb</option>
                            <option value="aes-256-ctr">aes-256-ctr</option>
                            <option value="camellia-256-cfb">camellia-256-cfb</option>
                            <option value="bf-cfb">bf-cfb</option>
                            <option value="cast5-cfb">cast5-cfb</option>
                            <option value="des-cfb">des-cfb</option>
                            <option value="des-ede3-cfb">des-ede3-cfb</option>
                            <option value="rc4-md5" selected="selected">rc4-md5</option>
                            <option value="rc4-md5-6">rc4-md5-6</option>
                            <option value="salsa20">salsa20</option>
                            <option value="chacha20">chacha20</option>
                            <option value="chacha20-ietf">chacha20-ietf</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label for="rate" class="col-sm-3 control-label">流量比例</label>


												<div class="col-sm-9">
													<input class="form-control" id="rate" value="1">
												</div>

											</div>

<!--											<div class="form-group">
												<label for="method" class="col-sm-3 control-label">自定义加密</label>


												<div class="col-sm-9">
													<select class="form-control" id="custom_method">
														<option value="0" selected="selected">
															不支持

														</option>
														<option value="1">
															支持

														</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label for="custom_rss" class="col-sm-3 control-label">自定义协议&混淆</label>

													<div class="col-sm-9">
														<select class="form-control" id="custom_rss">
															<option value="0" selected="selected">
																不支持

															</option>
															<option value="1">
																支持

															</option>
														</select>
													</div>
												</div>-->

											</fieldset>
											<fieldset class="col-sm-6">
												<legend>描述信息</legend>
												
												<div class="form-group">
													<label for="class" class="col-sm-3 control-label">节点类别</label>


													<div class="col-sm-9">
														<input class="form-control" id="node_class" type="number" value="" placeholder="分类为数字，不分类请填0">
													</div>
												</div>
												
												<div class="form-group">
													<label for="group" class="col-sm-3 control-label">节点群组</label>


													<div class="col-sm-9">
														<input class="form-control" id="node_group" type="number" value="" placeholder="分组为数字，不分组请填0">
													</div>
												</div>

												<div class="form-group">
													<label for="type" class="col-sm-3 control-label">是否显示</label>


													<div class="col-sm-9">
														<select class="form-control" id="type">
															<option value="1" selected="selected">显示</option>

															<option value="0">隐藏</option>

														</select>
													</div>
												</div>

												<div class="form-group">
													<label for="status" class="col-sm-3 control-label">节点状态</label>


													<div class="col-sm-9">
														<select class="form-control" id="status">
															<option value=""></option>
															<option value="可用">可用</option>
															<option value="不可用">不可用</option>
														</select>
													</div>
												</div>

												<div class="form-group">
													<label for="sort" class="col-sm-3 control-label">排序</label>

													<div class="col-sm-9">
														<input class="form-control" id="sort" type="number" value="">
													</div>
												</div>
												<div class="form-group">
													<label for="info" class="col-sm-3 control-label">节点描述</label>


													<div class="col-sm-9">
														<textarea class="form-control" id="info" rows="3"></textarea>
													</div>
												</div>
											</fieldset>
										</div>
									</div>
								</div>
								<!-- /.box-body -->
								<div class="box-footer">
									<button type="submit" id="submit" name="action" value="add" class="btn btn-primary">添加</button>

								</div>
							</div>
							<!-- /.box -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.row -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

			<script>
				$(document).ready(function () {
					function submit() {
						$.ajax({
							type: "POST",
							url: "/admin/node",
							dataType: "json",
							data: {
								name: $("#name").val(),
								server: $("#server").val(),
/*								method: $("#method").val(),
								protocol: $("#protocol").val(),
								protocol_param: $("#protocol_param").val(),
								obfs: $("#obfs").val(),
								obfs_param: $("#obfs_param").val(),
								custom_method: $("#custom_method").val(),
								custom_rss: $("#custom_rss").val(),*/
								node_class: $("#node_class").val(),
								node_group: $("#node_group").val(),
								rate: $("#rate").val(),
								info: $("#info").val(),
								type: $("#type").val(),
								status: $("#status").val(),
								sort: $("#sort").val()
							},
							success: function (data) {
								if (data.ret) {
									$("#msg-error").hide(100);
									$("#msg-success").show(100);
									$("#msg-success-p").html(data.msg);
									window.setTimeout("location.href='/admin/node'", 2000);
								} else {
									$("#msg-error").hide(10);
									$("#msg-error").show(100);
									$("#msg-error-p").html(data.msg);
								}
							},
							error: function (jqXHR) {
								$("#msg-error").hide(10);
								$("#msg-error").show(100);
								$("#msg-error-p").html("发生错误：" + jqXHR.status);

							}
						});
					}

					$("html").keydown(function (event) {
						if (event.keyCode == 13) {
							login();
						}
					});
					$("#submit").click(function () {
						submit();
					});
					$("#ok-close").click(function () {
						$("#msg-success").hide(100);
					});
					$("#error-close").click(function () {
						$("#msg-error").hide(100);
					});
				})
			</script>

			<script>
				function disprotocolparam()
				{
					var protocol = document.getElementById("protocol");
					if (protocol.value == "auth_simple" || protocol.value == "auth_sha1" || protocol.value == "auth_sha1_v2"){
						document.getElementById("protocol_param").disabled=false
					} else {
						document.getElementById("protocol_param").disabled=true
					}
				}
			</script>

			<script>
				function disobfsparam()
				{
					var protocol = document.getElementById("obfs");
					if (obfs.value == "http_simple" || obfs.value == "http_post" || obfs.value == "tls1.2_ticket_auth"){
						document.getElementById("obfs_param").disabled=false
					} else {
						document.getElementById("obfs_param").disabled=true
					}
				}
			</script>

			{include file='admin/footer.tpl'}
