<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>
  <p>尊敬的用户：</p>
  <p>您的邮箱验证代码为: <b>{$verification->token}</b>，请在网页中填写，完成验证。<br>(本验证代码有效期 {$ttl} 分钟)</p><br>
  <p>{$config["appName"]}</p>
</body>
</html>