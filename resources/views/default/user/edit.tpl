{include file='user/main.tpl'}

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			修改资料

			<small>Profile Edit</small>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div id="msg-error" class="alert alert-warning alert-dismissable" style="display:none">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4>
					<i class="icon fa fa-warning"></i> 出错了!</h4>

						<p id="msg-error-p"></p>
					</div>
					<div id="ss-msg-success" class="alert alert-success alert-dismissable" style="display:none">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4>
							<i class="icon fa fa-info"></i> 修改成功!</h4>


							<p id="ss-msg-success-p"></p>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- left column -->
					<div class="col-md-6">
						<!-- general form elements -->
						<div class="box box-primary">
							<div class="box-header">
								<i class="fa fa-key"></i>

								<h3 class="box-title">网站登录密码修改</h3>

								</div>
								<!-- /.box-header -->
								<!-- form start -->

								<div class="box-body">
									<div class="form-horizontal">

										<div id="msg-success" class="alert alert-info alert-dismissable" style="display:none">
											<button type="button" class="close" data-dismiss="alert"
											aria-hidden="true">&times;</button>
											<h4>
											<i class="icon fa fa-info"></i> Ok!</h4>

												<p id="msg-success-p"></p>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label">当前密码</label>


												<div class="col-sm-9">
													<input type="password" class="form-control" placeholder="当前密码(必填)" id="oldpwd">

												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label">新密码</label>

												<div class="col-sm-9">
													<input type="password" class="form-control" placeholder="新密码" id="pwd">

												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label">确认密码</label>


												<div class="col-sm-9">
													<input type="password" placeholder="确认密码" class="form-control" id="repwd">

												</div>
											</div>
										</div>
									</div>
									<!-- /.box-body -->

									<div class="box-footer">
										<button type="submit" id="pwd-update" class="btn btn-primary">修改</button>
									</div>

								</div>
								<!-- /.box -->
							</div>

							<div class="col-md-6">

								<div class="box box-primary">
									<div class="box-header">
										<i class="fa fa-link"></i>

										<h3 class="box-title">ShadowsocksR连接信息修改</h3>

										</div>
										<!-- /.box-header -->
										<div class="box-body">
											<div class="form-horizontal">
												<div class="form-group">
													<label class="col-sm-3 control-label">连接密码</label>


													<div class="col-sm-9">
														<div class="input-group">
															<input type="text" id="sspwd" placeholder="输入新连接密码" class="form-control">

															<div class="input-group-btn">
																<button type="submit" id="ss-pwd-update" class="btn btn-primary">修改</button>

															</div>
														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-3 control-label">协议插件</label>


													<div class="col-sm-9">
														<div class="input-group">
															<div style="width:380px">
																<select class="form-control" id="protocol" {if $user->custom_rss == 0} disabled="disabled" {/if}>
																	<option value="origin" {if $user->protocol=="origin"}selected="selected"{/if}>origin</option>
																	<option value="verify_simple" {if $user->protocol=="verify_simple"}selected="selected"{/if}>verify_simple</option>
																	<option value="verify_deflate" {if $user->protocol=="verify_deflate"}selected="selected"{/if}>verify_deflate</option>
																	<option value="verify_sha1" {if $user->protocol=="verify_sha1"}selected="selected"{/if}>verify_sha1</option>
																	<option value="auth_simple" {if $user->protocol=="auth_simple"}selected="selected"{/if}>auth_simple</option>
																	<option value="auth_sha1" {if $user->protocol=="auth_sha1"}selected="selected"{/if}>auth_sha1</option>
																	<option value="auth_sha1_compatible" {if $user->protocol=="auth_sha1_compatible"}selected="selected"{/if}>auth_sha1_compatible</option>
																	<option value="auth_sha1_v2" {if $user->protocol=="auth_sha1_v2"}selected="selected"{/if}>auth_sha1_v2</option>
																	<option value="auth_sha1_v2_compatible" {if $user->protocol=="auth_sha1_v2_compatible"}selected="selected"{/if}>auth_sha1_v2_compatible</option>
																</select>
															</div>
															<div class="input-group-btn">
																<button type="submit" id="protocol-update" class="btn btn-primary" {if $user->custom_rss == 0} disabled="disabled" {/if}>修改</button>

															</div>
														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-3 control-label">混淆插件</label>


													<div class="col-sm-9">
														<div class="input-group">
															<div style="width:380px">
																<select class="form-control" id="obfs" {if $user->custom_rss == 0} disabled="disabled" {/if}>
																	<option value="plain" {if $user->obfs=="plain"}selected="selected"{/if}>plain</option>
																	<option value="http_post" {if $user->obfs=="http_post"}selected="selected"{/if}>http_post</option>
																	<option value="http_post_compatible" {if $user->obfs=="http_post_compatible"}selected="selected"{/if}>http_post_compatible</option>
																	<option value="http_simple" {if $user->obfs=="http_simple"}selected="selected"{/if}>http_simple</option>
																	<option value="http_simple_compatible" {if $user->obfs=="http_simple_compatible"}selected="selected"{/if}>http_simple_compatible</option>
																	<option value="tls_simple" {if $user->obfs=="tls_simple"}selected="selected"{/if}>tls_simple</option>
																	<option value="random_head" {if $user->obfs=="random_head"}selected="selected"{/if}>random_head</option>
																	<option value="tls1.0_session_auth" {if $user->obfs=="tls1.0_session_auth"}selected="selected"{/if}>tls1.0_session_auth</option>
																	<option value="tls1.0_session_auth_compatible" {if $user->obfs=="tls1.0_session_auth_compatible"}selected="selected"{/if}>tls1.0_session_auth_compatible</option>
																	<option value="tls1.2_ticket_auth" {if $user->obfs=="tls1.2_ticket_auth"}selected="selected"{/if}>tls1.2_ticket_auth</option>
																	<option value="tls1.2_ticket_auth_compatible" {if $user->obfs=="tls1.2_ticket_auth_compatible"}selected="selected"{/if}>tls1.2_ticket_auth_compatible</option>
																</select>
															</div>
															<div class="input-group-btn">
																<button type="submit" id="obfs-update" class="btn btn-primary" {if $user->custom_rss == 0} disabled="disabled" {/if}>修改</button>

															</div>
														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-3 control-label">加密方法</label>

													<div class="col-sm-9">
														<div class="input-group" action="" method="get">
															<div style="width:380px">
																<select class="form-control" id="method" {if $user->custom_method == 0} disabled="disabled"{/if}>
																	<option value="rc4-md5" {if $user->method=="rc4-md5"}selected="selected"{/if}>rc4-md5</option>
																	<option value="aes-256-cfb" {if $user->method=="aes-256-cfb"}selected="selected"{/if}>aes-256-cfb</option>
																	<option value="chacha20" {if $user->method=="chacha20"}selected="selected"{/if}>chacha20</option>
																	<option value="chacha20-ietf" {if $user->method=="chacha20-ietf"}selected="selected"{/if}>chacha20-ietf</option>
																</select>
															</div>
															<div class="input-group-btn">
																<button type="submit" id="method-update" class="btn btn-primary" {if $user->custom_method == 0} disabled="disabled" {/if}>修改</button>
															</div>
														</div>
													</div>
												</div>

											</div>
											<div class="box-footer"></div>
										</div>
										<!-- /.box-body -->
									</div>
									<!-- /.box -->
								</div>
								<!-- /.col (right) -->

							</div>
						</section>
						<!-- /.content -->
					</div>
					<!-- /.content-wrapper -->

					<script>
						$("#msg-success").hide();
						$("#msg-error").hide();
						$("#ss-msg-success").hide();
					</script>

					<script>
						$(document).ready(function () {
							$("#pwd-update").click(function () {
								$.ajax({
									type: "POST",
									url: "password",
									dataType: "json",
									data: {
										oldpwd: $("#oldpwd").val(),
										pwd: $("#pwd").val(),
										repwd: $("#repwd").val()
									},
									success: function (data) {
										if (data.ret) {
											$("#msg-error").hide();
											$("#msg-success").show();
											$("#msg-success-p").html(data.msg);
										} else {
											$("#msg-error").show();
											$("#msg-error-p").html(data.msg);
										}
									},
									error: function (jqXHR) {
										alert("发生错误：" + jqXHR.status);

									}
								})
							})
						})
					</script>

					<script>
						$(document).ready(function () {
							$("#ss-pwd-update").click(function () {
								$.ajax({
									type: "POST",
									url: "sspwd",
									dataType: "json",
									data: {
										sspwd: $("#sspwd").val()
									},
									success: function (data) {
										if (data.ret) {
											$("#ss-msg-success").show();
											$("#ss-msg-success-p").html(data.msg);
										} else {
											$("#ss-msg-error").show();
											$("#ss-msg-error-p").html(data.msg);
										}
									},
									error: function (jqXHR) {
										alert("发生错误：" + jqXHR.status);

									}
								})
							})
						})
					</script>


					<script>
						$(document).ready(function () {
							$("#method-update").click(function () {
								$.ajax({
									type: "POST",
									url: "method",
									dataType: "json",
									data: {
										method: $("#method").val()
									},
									success: function (data) {
										if (data.ret) {
											$("#ss-msg-success").show();
											$("#ss-msg-success-p").html(data.msg);
										} else {
											$("#ss-msg-error").show();
											$("#ss-msg-error-p").html(data.msg);
										}
									},
									error: function (jqXHR) {
										alert("发生错误：" + jqXHR.status);

									}
								})
							})
						})
					</script>

					<script>
						$(document).ready(function () {
							$("#protocol-update").click(function () {
								$.ajax({
									type: "POST",
									url: "protocol",
									dataType: "json",
									data: {
										protocol: $("#protocol").val()
									},
									success: function (data) {
										if (data.ret) {
											$("#ss-msg-success").show();
											$("#ss-msg-success-p").html(data.msg);
										} else {
											$("#ss-msg-error").show();
											$("#ss-msg-error-p").html(data.msg);
										}
									},
									error: function (jqXHR) {
										alert("发生错误：" + jqXHR.status);

									}
								})
							})
						})
					</script>

					<script>
						$(document).ready(function () {
							$("#obfs-update").click(function () {
								$.ajax({
									type: "POST",
									url: "obfs",
									dataType: "json",
									data: {
										obfs: $("#obfs").val()
									},
									success: function (data) {
										if (data.ret) {
											$("#ss-msg-success").show();
											$("#ss-msg-success-p").html(data.msg);
										} else {
											$("#ss-msg-error").show();
											$("#ss-msg-error-p").html(data.msg);
										}
									},
									error: function (jqXHR) {
										alert("发生错误：" + jqXHR.status);

									}
								})
							})
						})
					</script>


					{include file='user/footer.tpl'}
