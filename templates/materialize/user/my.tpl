<{extends file="header.tpl"}><{block name="title" prepend}>我的信息 - <{/block}><{block name="contents"}>
<div class="had-container">
   <{include file='user/nav.tpl'}>

<div class="section no-pad-bot" id="index-banner">
    <div class="container ">
      <h5 class="white-text">
          我的信息
          <small>My Information</small>
      </h5>

        <div class="section">
          <div class="row card-panel color-panel light-blue lighten-5 z-depth-2">
            
            <div class="col s12">
                <div class="card-panel hoverable">
                  <div class="center black-text">
                    <img src="<{$Gravatar_Email_img}>" class="circle hoverable" alt="User Image" />
                    <p>用户名：<{$GetUserName}></p>
                    <p>邮箱：<{$user_email}></p>
                    <p>注册时间：<{$RegDate}></p>
                    <p>套餐：<span class="new badge hoverable"> <{$get_plan}> </span> </p>
                    <p>账户余额：<{$get_money}>元 </p>
                    <p><a class="btn waves-effect waves-light hoverable" href="kill.php">删除我的账户</a></p>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<{include file='footer.tpl'}> <{/block}> <{* 以上继承内容到父模板header.tpl 中的 contents *}>
<{extends file="Public_javascript.tpl" append}> <{block name="javascript"}>
<script>
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