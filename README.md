ss-panel
========

A simple front end of [Shadowsocks manyuser](https://github.com/mengskysama/shadowsocks/tree/manyuser
)  

[Demo](https://cattt.com) [中文安装文档](https://github.com/orvice/ss-panel/wiki/Install-Guide-zh_cn)

### Upgrade from 0.X

[Read this](https://github.com/orvice/ss-panel/blob/master/upgrade_to_v2.md)

### Requirements
* PHP >= 5.4
* PDO Extension

### Install
* Import sql/*.sql to your MySQL Database
* Rename lib/config-sample.php to config.php,and edit the database infomation.
* Enjoy it.

### Admin
* The user who uid is 1 is Admin by default.
* You can Add User ID into table 'ss_user_admin'

### Send mail using mail-gun
Run:

```
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar  install
```
更新内容：
添加弹窗显示二维码和配置信息

![qq 20150516102428](https://cloud.githubusercontent.com/assets/11162054/7664380/12f6a418-fbb7-11e4-90aa-d95b7c53ca86.png)

![qq 20150516102541](https://cloud.githubusercontent.com/assets/11162054/7664419/b2e55cd4-fbb8-11e4-8131-cb86d30c4ed4.png)

新添管理员中心的（网页）用户表优化 ,更新DataTables 至 1.10.7 并汉化部分中文提示

![qq 20150511101621](https://cloud.githubusercontent.com/assets/11162054/7557585/e0e0b55c-f7c6-11e4-8569-695fd7cd4785.png)

![qq 20150511102255](https://cloud.githubusercontent.com/assets/11162054/7557633/d1a2c142-f7c7-11e4-9047-99ca7fd3c3f7.png)

![qq 20150511102328](https://cloud.githubusercontent.com/assets/11162054/7557634/d5c022a6-f7c7-11e4-843c-3783ed02c3ef.png)

以上图中数据为测试的

新增smtp邮件

修改：

移动以下内容至新文件Public_javascript.php并在所有调用<?php require_once '_footer.php'; ?>的文件加入<?php include_once '../Public_javascript.php'; ?>调用。
```
<!-- jQuery 2.1.3 -->
<script src="../asset/js/jQuery.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="../asset/js/bootstrap.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="../asset/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='../asset/plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="../asset/js/app.min.js" type="text/javascript"></script>
```

如果你的提示文字已修改，请在新文件对应的提示文字修改，以防本地验证失效！
还针对按回车不放的用户优化，禁止重复提交，预防多余不必要的请求连接。
修复已知问题，改用浮动层，不会再因为弹出提示而改变页面排版。

![20150520155239](https://cloud.githubusercontent.com/assets/11162054/7721879/f294f01c-ff0d-11e4-933f-7fbf8d3a23f2.png)

![20150520160416](https://cloud.githubusercontent.com/assets/11162054/7721878/f2925a64-ff0d-11e4-96ad-7d1dd5232423.png)

![20150520163228](https://cloud.githubusercontent.com/assets/11162054/7721964/9b15854e-ff0e-11e4-85f5-fab5d43c5645.png)

![20150520163258](https://cloud.githubusercontent.com/assets/11162054/7721989/b0bac44a-ff0e-11e4-8380-a6ba47eff3aa.png)

```js
//欢迎回来 是服务器返回的提示文字，如果你的已经修改，请在新文件对应的提示文字修改，以防本地验证失效！
if($("#msg-success-p").eq(0)[0].innerHTML=="欢迎回来" 
                    || $("#msg-success-p").eq(0)[0].innerHTML=="你已成功登录"){
                      // 这里第一个是提示文字，如果要改，上面判断的也要一起改。
                      //第二个是显示的样式，分两个： 出错了（error）成功（success ）
                        msg_out("你已成功登录","success");
                        //msg_id=1 不执行（提）登（交）录
                        msg_id=1;
                         $("#msg-error-p").html("");
                }
                if($("#msg-error-p").eq(0)[0].innerHTML=="邮箱或者密码错误" 
                    || $("#msg-error-p").eq(0)[0].innerHTML=="邮箱或者密码错误，请重新输入！"){
                     if($("#passwd").val()==inpasswd && $("#email").val()==inemail){
                        msg_out("邮箱或者密码错误，请重新输入！","error");
                        msg_id=1;
                        return false;
                    }
                }
```

### Thanks to

* [AdminLTE](https://github.com/almasaeed2010/AdminLTE)
* [Medoo](https://github.com/catfan/Medoo)

