<?php session_start();?> <!--Session for a signed in user-->
<?php include_once("php/setsitelanguage-1.php");?> <!--Script to set site language-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WordCharge is a service for learning foreign languages. Learn new wordsi.">
    <meta name="author" content="Sergey Bondarenko">
    <link rel="icon" href="img/favicon.png" type="image/png">

    <title><?php echo $langArray["projectName"]; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar-static-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
	  <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </head>

  <body>

	<?php include_once("navbar.php"); ?>

    <div class="container">
			
      <div class="jumbotron">

        <?php include("php/makesignup-1.php"); ?>
        
        <table id="mainTable">
          <tr>
          <form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?myLang='.$myLang;?>">
            <td>
            <table id="mainTableIn">
              <tr>
                <td colspan="4"><strong><?php echo $langArray["textSignup"]; ?> </strong></td>
              </tr>
              <tr>
                <td colspan="4"><i><?php echo $nameErr; ?></i></td>
              </tr>
              <tr>
                <td width="78"><?php echo $langArray["textUsername"]; ?></td>
                <td width="6">:</td>
                <td width="194"><input name="myusername" type="text" id="myusername"></td>
              </tr>
              <tr>
                 <td><?php echo $langArray["textPass"]; ?></td>
                 <td>:</td>
                 <td><input name="mypassword" type="password" id="mypassword"></td>
              </tr>
              <tr>
                 <td><?php echo $langArray["textEmail"]; ?></td>
                 <td>:</td>
                 <td><input name="myemail" type="email" id="myemail"></td>
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
                    "><?php echo $langArray["textRefresh"]; ?></a></small></p>
                    <p><input id="captcha_code" type="text" name="captcha" size="6" maxlength="5" onkeyup="this.value = this.value.replace(/[^\d]+/g, '');"> <small><?php echo $langArray["textTruring"]; ?></small></p>
                  </div>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="Submit" value="<?php echo $langArray["textSignup"]; ?>"></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td><span class="error"><i><?php echo $signupErr;?></i></span></td>
              </tr>
            </table>
            </td>
          </form>
          </tr>
        </table>  
      </div>
			
    	<!--Footer-->
			<?php include_once("php/footer-1.php");?>
    	<!--END of Footer-->
    
		</div> <!-- /container -->


  </body>
</html>

