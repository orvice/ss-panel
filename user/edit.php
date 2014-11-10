<?php
include_once 'header.inc.php';
//get post value
if(!empty($_POST)){
    $now_pwd = mysqli_real_escape_string($dbc,trim($_POST['nowpassword']));
    $pwd = mysqli_real_escape_string($dbc,trim($_POST['password']));
    $email = mysqli_real_escape_string($dbc,trim($_POST['email']));
    //验证当前密码
    if(!pwd_verify($uid,$now_pwd)){
        echo ' <script>alert("当前密码错误!")</script> ';
        echo " <script>window.location='edit.php';</script> " ;
    }else{
        //更新密码
        if(!empty($_POST['password'])){
            if(change_pwd($uid,$pwd)){
                echo ' <script>alert("修改成功!")</script> ';
                echo " <script>window.location='edit.php';</script> " ;
            }else{
                echo ' <script>alert("出错了!")</script> ';
                echo " <script>window.location='edit.php';</script> " ;
            }
        }
        //更新邮箱
        if(!empty($_POST['email'])){
            if(change_email($uid,$email)){
                echo ' <script>alert("修改成功!")</script> ';
                echo " <script>window.location='edit.php';</script> " ;
            }else{
                echo ' <script>alert("出错了!")</script> ';
                echo " <script>window.location='edit.php';</script> " ;
            }
         }
    }
}
?>
<body>
    <?php include_once 'nav.php'; ?>
        <div class="container-fluid">
          <div class="row">  <?php  include_once 'seliderbar_left.inc.php'; ?>
              <div class="my-profile col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main " >
                  <h2 class="sub-header">修改</h2>
                  <div class="table-responsive">
                      <form role="form" name="edit" method="post" action="edit.php" onsubmit="return check()">

                          <div class="form-group">
                              <label for="inputPassword">当前密码</label>
                              <input type="password" class="form-control" name="nowpassword">
                          </div>

                          <div class="form-group">
                              <label class="pull-right" >*留空则不修改密码</label>
                              <label for="inputPassword">密码</label>
                              <input type="password" class="form-control" name="password">
                          </div>

                          <div class="form-group">
                              <label for="inputPassword">确认密码</label>
                              <input type="password" class="form-control" name="repassword">
                          </div>

                          <div class="form-group">
                              <label for="inputPassword">邮箱</label>
                              <label class="pull-right" >*留空则不修改</label>
                              <input type="text" class="form-control" name="email">
                          </div>

                          <button type="submit" class="btn btn btn-primary">
                              修改
                          </button>
                      </form>

                  </div>
              </div>
          </div>
      </div> <!-- #container -->
  <?php include_once 'footer.inc.php'; ?>
    <script LANGUAGE="javascript">

        function check()
        {

            if(document.edit.nowpassword.value.length==0){
                alert("请输入当前密码!");
                document.edit.nowpassword.focus();
                return false;
            }
            if(document.edit.password.value.length != 0){
                if(document.edit.password.value.length < 8){
                    alert("密码至少8位");
                    document.edit.password.focus();
                    return false;
                }
                if(document.edit.repassword.value != document.edit.password.value ){
                    alert("两次密码输入不符!");
                    document.edit.repassword.focus();
                    return false;
                }
            }
            if(document.edit.email.length != 0){
                //对电子邮件的验证
                //定义email正则表达式
                var email_reg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;

                if(!email_reg.test(document.reg.email.value)) {
                    alert('提示\n\n请输入有效的E-mail！');
                    document.reg.email.focus();
                    return false;
                }
            }

        }

    </script>

  </body>
</html>
