<?php session_start();?> <!--Session for a signed in user-->

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
    <?php 
      include_once("php/functions.php");
      $myLang=sanitize_input($_GET["myLang"]);
      $langId="en"."-".$myLang;
    ?>
    <?php include_once("php/setsitelanguage-1.php");?> <!--Script to set site language-->
  </head>

  <body>

	<?php include_once("navbar.php"); ?>

    <div class="container">
			
      <div class="jumbotron">
        <div id="wrapper-content">

          <div class="bookCover">
            <form action="getbooksdict-1.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
            <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/it/decamerone.txt">
            <input type="hidden" name="langId" value="<?php echo $langId;?>">
            <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
            </br>
            <a target="_blank" href="http://wordcharge.com/books/it/decamerone.txt">
              <img src="bookscovers/ildecameron.jpg" alt="Il Decamerone" width="100" height="140">
            </a>
            </form>
            <div class="bookDesc">Il Decamerone o Decameron è una raccolta di cento novelle scritta nel XIV secolo, probabilmente tra il 1349 da Giovanni Boccaccio. 
            </div>
          </div>
          <div class="bookCover">
            <form action="getbooksdict-1.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
            <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/it/ladivinacommedia.txt">
            <input type="hidden" name="langId" value="<?php echo $langId;?>">
            <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
            </br>
            <a target="_blank" href="http://wordcharge.com/books/it/ladivinacommedia.txt">
              <img src="bookscovers/ladivinacommedia.jpg" alt="La Comedìa" width="100" height="140">
            </a>
            </form>
            <div class="bookDesc">La Comedìa è un poema di Dante Alighieri, scritto in terzine incatenate di versi endecasillabi, in lingua volgare fiorentina. Composta secondo i critici tra il 1304 e il 1321.
          </div>
          </div>
          <div class="bookCover">
            <form action="getbooksdict-1.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
            <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/it/ilnomedellarosa.txt">
            <input type="hidden" name="langId" value="<?php echo $langId;?>">
            <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
            </br>
            <a target="_blank" href="http://wordcharge.com/books/it/ilnomedellarosa.txt">
              <img src="bookscovers/ilnomedellarosa.jpg" alt="l nome della rosa" width="100" height="140">
            </a>
            </form>
            <div class="bookDesc">l nome della rosa è un romanzo scritto da Umberto Eco ed edito per la prima volta da Bompiani nel 1980.
            </div>
          </div>
          <div class="bookCover">
            <form action="getbooksdict-1.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
            <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/it/i_viaggi_e_la_carta_dei_fratelli_zeno_veneziani.txt">
            <input type="hidden" name="langId" value="<?php echo $langId;?>">
            <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
            </br>
            <a target="_blank" href="http://wordcharge.com/books/it/i_viaggi_e_la_carta_dei_fratelli_zeno_veneziani.txt">
              <img src="bookscovers/i_viaggi_e_la_carta_dei_fratelli_zeno_veneziani.jpg" alt="I fratelli Nicolò Zeno" width="100" height="140">
            </a>
            </form>
            <div class="bookDesc">I fratelli Nicolò Zeno furono due navigatori veneziani del XIV secolo, impegnati nell'esplorazione dell'Atlantico del nord e dei mari artici attorno al 1390.
            </div>
          </div>
        
            </div>
      </div> <!-- end of jumbotron -->
			
    	<!--Footer-->
			<?php include_once("php/footer-1.php");?>
    	<!--END of Footer-->
    
		</div> <!-- /container -->


  </body>
</html>

