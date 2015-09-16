<?php 
    require 'aes.class.php';     // AES PHP implementation
    require 'aesctr.class.php';  // AES Counter Mode implementation
        
    // 生成随机字符串
      function getRandChar($length){
       $str = null;
       $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
       $max = strlen($strPol)-1;
    
       for($i=0;$i<$length;$i++){
        $str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
       }
    
       return $str;
      }
    
    $RandChar = getRandChar(32)."==";
    echo "随机字符串:".$RandChar;
    
    $timer = microtime(true);

    // initialise password & plaintext if not set in post array
    $pw = empty($_POST['pw']) ? $RandChar              : $_POST['pw'];
    $pt = empty($_POST['pt']) ? 'pssst ... đon’t tell anyøne!' : $_POST['pt'];
    $cipher = empty($_POST['cipher']) ? '' : $_POST['cipher'];
    $plain  = empty($_POST['plain'])  ? '' : $_POST['plain'];

    // perform encryption/decryption as required
    $encr = empty($_POST['encr']) ? $cipher : AesCtr::encrypt($pt, $pw, 256);
    $decr = empty($_POST['decr']) ? $plain  : AesCtr::decrypt($cipher, $pw, 256);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>AES in PHP test harness</title>
</head>
<body>
<form method="post">
    <table>
        <tr>
            <td>Password:</td>
            <td><input type="text" name="pw" size="16" value="<?= $pw ?>"></td>
        </tr>
        <tr>
            <td>Plaintext:</td>
            <td><input type="text" name="pt" size="40" value="<?= htmlspecialchars($pt) ?>"></td>
        </tr>
        <tr>
            <td><button type="submit" name="encr" value="Encrypt it">Encrypt it</button></td>
            <td><input type="text" name="cipher" size="80" value="<?= $encr ?>"></td>
        </tr>
        <tr>
            <td><button type="submit" name="decr" value="Decrypt it">Decrypt it</button></td>
            <td><input type="text" name="plain" size="40" value="<?= htmlspecialchars($decr) ?>"></td>
        </tr>
    </table>
</form>
<p><?= round(microtime(true) - $timer, 3) ?>s</p>
</body>
</html>