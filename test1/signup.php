
<!DOCTYPE html>

<html>
<head>
    <title>WordCharge</title>
    <meta charset="utf-8">
    <link href="css/site.css" rel="stylesheet">
</head>
<body>

  <?php include("php/header.php"); ?>
  <div id="wrapper-main">
    <div id="wrapper-login">
      <?php include_once("php/wrapper-login.php");?>
    </div>
    <h2>WordCharge</h2>
    <?php include("php/makesignup.php"); ?>
    
    <table width="300" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
      <tr>
      <form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <td>
        <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
          <tr>
            <td colspan="3"><strong>Sign Up </strong></td>
          </tr>
          <tr>
            <td width="78">Username</td>
            <td width="6">:</td>
            <td width="294"><input name="myusername" type="text" id="myusername"></td>
          </tr>
          <tr>
             <td>Password</td>
             <td>:</td>
             <td><input name="mypassword" type="password" id="mypassword"></td>
          </tr>
          <tr>
             <td>E-mail</td>
             <td>:</td>
             <td><input name="myemail" type="email" id="myemail"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="Login"></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td>
<div id="captchaField">
  <p><img id="captcha" src="php/captcha.php" width="160" height="45" border="1" alt="CAPTCHA">
  <small><a href="#" onclick="
    document.getElementById('captcha').src = 'php/captcha.php?' + Math.random();
    document.getElementById('captcha_code').value = '';
    return false;
  ">refresh</a></small></p>
  <p><input id="captcha_code" type="text" name="captcha" size="6" maxlength="5" onkeyup="this.value = this.value.replace(/[^\d]+/g, '');"> <small>copy the digits from the image into this box</small></p>
</div>
            </td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td><span class="error"><?php echo $signupErr;?></span></td>
          </tr>
        </table>
        </td>
      </form>
      </tr>
    </table>  
  
    <?php include("php/footer.php"); ?>
  </div>

</body>
</html>
