<?php ob_start();?>
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
    <script src="https://apis.google.com/js/client:platform.js" async defer></script>

  </head>

  <body>

	<?php include_once("navbar.php"); ?>

    <div class="container">
			
      <div class="jumbotron">
        <?php 
          //echo $myLang;
          include_once("php/checklogin-1.php"); 
        ?>
        

        <div class="row">
          <div class="col-lg-6">
            <div class="well bs-component">
              <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?myLang='.$myLang;?>">
                <fieldset>
                  <legend><?php echo $langArray["textMamberlogin"]; ?></legend>
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label"><?php echo $langArray["textUsername"]; ?></label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" name="myusername" id="myusername" placeholder="Username">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label"><?php echo $langArray["textPass"]; ?></label>
                    <div class="col-lg-10">
                      <input type="password" class="form-control" name="mypassword" id="mypassword" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <input type="submit" name="Submit" class="btn btn-primary" value="<?php echo $langArray["textLogin"]; ?>">
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
        
        <!--<span id="signinButton">
          <span
            class="g-signin"
            data-callback="signinCallback"
            data-clientid="825831966231-rq91m17qru24g4ckn2qfmug5bcp5eegs.apps.googleusercontent.com"
            data-cookiepolicy="single_host_origin"
            data-requestvisibleactions="http://schema.org/AddAction"
            data-scope="https://www.googleapis.com/auth/plus.login">
          </span>
        </span>-->
      
      </div> <!-- End of Jumbotron -->
      
      
			
    	<!--Footer-->
			<?php include_once("php/footer-1.php");?>
    	<!--END of Footer-->
    
		</div> <!-- /container -->

    <script>
     /*function signinCallback(authResult) {
      if (authResult['status']['signed_in']) {
        // Update the app to reflect a signed in user
        // Hide the sign-in button now that the user is authorized, for example:
        document.getElementById('signinButton').setAttribute('style', 'display: none');
      } else {
        // Update the app to reflect a signed out user
        // Possible error values:
        //   "user_signed_out" - User is signed-out
        //   "access_denied" - User denied access to your app
        //   "immediate_failed" - Could not automatically log in the user
        console.log('Sign-in state: ' + authResult['error']);
      }
    }*/
    </script>

<?php ob_end_flush();?>
  </body>
</html>

