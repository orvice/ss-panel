ss-panel
========

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

* [AdminLTE](https://github.com/almasaeed2010/AdminLTE)
* [Medoo](https://github.com/catfan/Medoo)

