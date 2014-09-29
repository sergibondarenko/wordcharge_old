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
    <link rel="icon" href="favicon.ico">

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
  </head>

  <body>

    <!-- Static navbar -->
<!--    <div class="navbar navbar-default navbar-static-top" role="navigation">-->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $langArray["projectName"]; ?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
						<?php include("php/header-1.php"); ?>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" 
									id="themes"><?php echo $langArray["textLanguage"]; ?><span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <?php include_once("php/wrapper-languages-1.php"); ?>
              </ul>
            </li>
          </ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><?php echo $langArray["textLogin"]; ?></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><?php echo $langArray["textSignup"]; ?></a></li>
					</ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <div class="container">
			
      <div class="jumbotron">
        <h4><?php echo $langArray["textMakeCustomDic"]; ?></h4>
				<p>
          <div class="row form-group">
            <div class="col-xs-5 col-sm-4 col-md-3 col-lg-2">
              <!--<select class="form-control" id="langId">-->
              <select class="form-control" id="langId">
								<?php include_once("php/languagedropdown-1.php");?>
              </select>
            </div>
          </div>
				</p>
        <p>
					<textarea class="form-control" rows="9" id="textArea" 
										placeholder="<?php echo $langArray["textTextArea"]; ?>"></textarea>
				</p>
        <p>
					<!--<button type="button" class="btn btn-default btn-lg">
					  <span class="glyphicon glyphicon-book"></span> <?php echo $langArray["textButtonMakeDict"]; ?>
					</button>-->
					<a class="btn btn-default btn-md" href="#">
					  <span class="glyphicon glyphicon-book"></span> <?php echo $langArray["textButtonMakeDict"]; ?>
					</a>
        </p>
      </div>
			
    	<!--Footer-->
			<?php include_once("php/footer-1.php");?>
    	<!--END of Footer-->
    
		</div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

