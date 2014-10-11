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
    <link rel="icon" href="img/favicon.ico" sizes="16x16 32x32 64x64 110x110 114x114" type="image/vnd.microsoft.icon">

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
        <h4><?php echo $langArray["textMakeCustomDic"]; ?></h4>

			<form name="formIndex" method="post" action="newdict-1.php?myLang=<?php echo $myLang; ?>">
					<p>
        	  <div class="row form-group">
        	    <div class="col-xs-6 col-sm-5 col-md-4 col-lg-3">
						<?php include_once("php/languagedropdown-1.php");?>
        	      <!--<select class="form-control" id="langId">
									<?php //include_once("php/languagedropdown-1.php");?>
        	      </select>-->
        	    </div>
        	  </div>
					</p>
        			<p>
						<textarea class="form-control" rows="9" name="textArea" id="textArea" 
											placeholder="<?php echo $langArray["textTextArea"]; ?>"></textarea>
					</p>
        			<p>
						<!--<button type="button" class="btn btn-default btn-lg">
						  <span class="glyphicon glyphicon-book"></span> <?php //echo $langArray["textButtonMakeDict"]; ?>
						</button>-->
						<!--<a class="btn btn-default btn-md" href="#">
						  <span class="glyphicon glyphicon-book"></span> <?php //echo $langArray["textButtonMakeDict"]; ?>
						</a>-->
           	  <input class="btn btn-default btn-md" type="submit" 
											value="<?php echo $langArray["textButtonMakeDict"]; ?>">
        	</p>
				</form>

      </div>
			
    	<!--Footer-->
			<?php include_once("php/footer-1.php");?>
    	<!--END of Footer-->
    
		</div> <!-- /container -->


  </body>
</html>

