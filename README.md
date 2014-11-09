ss-panel
========

A simple front end of Shadowsocks  https://github.com/mengskysama/shadowsocks/tree/manyuser

### Install
* Import sql/user.sql to your MySQL Database
* Rename lib/config-sample.php to config.php,and edit the database infomation.
* Enjoy it.

### Enable Invite Mod
* Import sql/invite_code.sql to your database first.
* Edit lib/config.php,set $invite_only to true.
* You can view invite code on code.php,you can rename this file.
* Visit tools/code_add.php to add invite code.

