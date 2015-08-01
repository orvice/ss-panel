<{extends file="header.tpl"}> <{block name="title" prepend}>用户中心 - <{/block}><{block name="contents"}>
<div class="had-container ">
   <{include file='user/nav.tpl'}>

<div class="section no-pad-bot" id="index-banner">
    <div class="container ">
      <h5  class="white-text">
          用户中心
          <small>User Center</small>
      </h5>

        <div class="row card-panel color-panel grey lighten-4 z-depth-3">
            <div class="row">
                  <div class="col s12 m12 l6">
                    <div class="card-panel hoverable">
                      <span class="blue-text">
                        <h3 class="header center red-text">公告&FAQ</h3>
                          <div class="row black-text">
                            <p>流量不会重置，可以通过签到获取流量。</p> 
                            <p>流量可以通过签到获取，基本每天最多可以领取1G流量。</p>
                            <p>请勿在任何地方公开本站任何节点信息！</p>
                          </div>
                        </span>
                    </div>
                  </div>

                  <div class="col s12 m12 l6">
                    <div class="card-panel hoverable">
                      <span class="white-text">
                        <h5 class="header center black-text">流量使用情况</h5>
                          <div class="black-text">
                              <p> 已用流量：<{$transfers|default:0}> MB &nbsp; <span class="new badge hoverable">(<{$used_100|default:50}>%)</span></p>
                              <div class="progress z-depth-1">
                                  <div class="determinate" style="width: <{$used_100|default:50}>%"></div>
                              </div>
                              <p> 可用流量：<{$all_transfer|default:0}> GB</p>
                              <p> 剩余流量：<{$unused_transfer|default:0}> GB</p>
                          </div>
                      </span>
                    </div>
                  </div>
            </div>
        </div>

        <div class="section">
          <div class="row card-panel color-panel light-blue lighten-5 z-depth-2">
            <div class="col s12 m12 l6">
              <div class="card-panel hoverable">
                      <span class="white-text">
                      <h5 class="header center black-text">签到获取流量</h5>
                      <div class="black-text">
                        <p> 每天可以签到一次。</p>
                        <{if $oo->is_able_to_check_in()}>
                            <p id="checkin-btn"> <button id="checkin" class="btn waves-effect waves-light light-blue lighten-1 hoverable">签到</button></p>
                        <{else}>
                            <p><a class="btn waves-effect waves-light light-blue lighten-1 disabled" href="#!">已签到</a> </p>
                        <{/if}>
                        <p id="checkin-msg" ></p>
                        <p>上次签到时间：<code><{date('Y-m-d H:i:s',$oo->get_last_check_in_time())}></code></p>
                      </div>
                 </span>     
                </div>
            </div>

            <div class="col s12 m12 l6">
                <div class="card-panel hoverable">
                  <span class="blue-text">
                    <h5 class="header center black-text">连接信息</h5>
                      <div class="black-text">
                        <p> 端口：<code><{$oo->get_port()}></code> </p>
                        <p> 密码：<{$oo->get_pass()}> </p>
                        <p> 套餐：<span class="new badge hoverable"> <{$oo->get_plan()}> </span> </p>
                        <p> 最后使用时间：<code><{date('Y-m-d H:i:s',$unix_time)}></code> </p>
                      </div>
                  </span>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<{include file='footer.tpl'}> <{/block}> <{* 以上继承内容到父模板header.tpl 中的 contents *}>
<{extends file="Public_javascript.tpl" append}> <{block name="javascript"}>
<{* 请在下面加入你的 javascript *}>
<script type="text/javascript">
    $(document).ready(function(){
        $("#checkin").click(function(){
            $.ajax({
                type:"GET",
                url:"_checkin.php",
                dataType:"json",
                success:function(data){
                    $("#checkin-msg").html(data.msg);
                    $("#checkin-btn").hide();
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                }
            })
        })
    })
</script><{/block}> <{* 以上继承内容到父模板 Public_javascript.tpl 中的 javascript *}>