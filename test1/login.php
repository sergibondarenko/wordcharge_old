<!DOCTYPE html>

<html>
<head>
    <title>WordCharge</title>
    <meta charset="utf-8">
    <link href="css/site.css" rel="stylesheet">
</head>
<body>
  <?php include_once("php/setsitelanguage.php");?>
  <?php include("php/header.php"); ?>
  <div id="wrapper-main">
    <div id="wrapper-login">
      <?php include_once("php/wrapper-login.php");?>
    </div>

    <h2>WordCharge</h2>
    <?php 
      //echo $myLang;
      include_once("php/checklogin.php"); 
    ?>
    
    <table width="300" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
      <tr>
      <form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?myLang='.$myLang;?>">
        <td><!--<span id=""></span>-->
        <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
          <tr>
            <td colspan="3"><strong><?php echo $langArray["textMamberlogin"]; ?> </strong></td>
          </tr>
          <tr>
            <td width="78"><?php echo $langArray["textUsername"]; ?></td>
            <td width="6">:</td>
            <td width="294"><input name="myusername" type="text" id="myusername"></td>
          </tr>
          <tr>
             <td><?php echo $langArray["textPass"]; ?></td>
             <td>:</td>
             <td><input name="mypassword" type="password" id="mypassword"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="<?php echo $langArray["textLogin"]; ?>"></td>
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
