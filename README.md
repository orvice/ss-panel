ss-panel + smarty
========

重要提醒
========

新版要求浏览器为 IE11 以上，部分手机会出现显示不正常，请使用UC QQ OPERA 等浏览器。

支持把程序放在二级目录。

请一定要配置config.php中的$site_url为你的网址，后面一定要有一个“/”。

A simple front end of [Shadowsocks manyuser](https://github.com/mengskysama/shadowsocks/tree/manyuser
)  
[ss pane_2.2.9_ _smarty_3.1.24_=_dev_0.2界面截图](https://github.com/xuanhuan/ss-panel/wiki/ss-pane_2.2.9_-_smarty_3.1.24_=_dev_0.2%E7%95%8C%E9%9D%A2)

### 管理后台 /admin    建议修改目录名称
默认管理帐号: first@blood.com 密码 1993
(和用户中心共用)

新版密码加密方式说明
========

当使用新的加密方式「带salt的sha256」加密，由于每个站点的$salt值都不同，所以初始密码「1993」是没有用的，安装完成后，访问
```
/pwd.php?pwd=1993
```
将获得的字符串更新到数据库user表的pass字段。

注意：

* $salt 不可随意修改！
* 如果原来为2.4之前的版本，需要将pass字段的长度修改为64


* 增加 Nginx 的配置文件，用于防止直接访问模板文件。 放在当前网站Nginx 配置文件相同目录，然后打开原来的配置文件，找到当前域名的server { } 在里面粘贴：include tpl.conf;
* 增加Apache 的配置文件 .htaccess，用于防止直接访问模板文件，放在当前目录。

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


### Thanks to
* [Materialize](http://materializecss.com/)
* [AdminLTE](https://github.com/almasaeed2010/AdminLTE)
* [Medoo](https://github.com/catfan/Medoo)

