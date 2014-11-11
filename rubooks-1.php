<?php session_start();?> <!--Session for a signed in user-->

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
            <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/ru/idiot.html">
            <input type="hidden" name="langId" value="<?php echo $langId;?>">
            <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
            </br>
            <a target="_blank" href="http://wordcharge.com/books/ru/idiot.txt">
              <img src="bookscovers/ru_idiot.jpg" alt="Идиот" width="100" height="140">
            </a>
            </form>
            <div class="bookDesc">"Идиoт" — роман Фёдора Михайловича Достоевского, впервые опубликован с января 1868 года.
            </div>
          </div>
          <div class="bookCover">
            <form action="getbooksdict-1.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
            <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/ru/igrok.txt">
            <input type="hidden" name="langId" value="<?php echo $langId;?>">
            <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
            </br>
            <a target="_blank" href="http://wordcharge.com/books/ru/igrok.txt">
              <img src="bookscovers/ru_igrok.jpg" alt="Игрок" width="100" height="140">
            </a>
            </form>
            <div class="bookDesc">"Игрок" — роман русского писателя Фёдора Михайловича Достоевского, впервые опубликованный в 1866 году.
          </div>
          </div>
          <div class="bookCover">
            <form action="getbooksdict-1.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
            <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/ru/karams.txt">
            <input type="hidden" name="langId" value="<?php echo $langId;?>">
            <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
            </br>
            <a target="_blank" href="http://wordcharge.com/books/ru/karams.txt">
              <img src="bookscovers/ru_bratya_karamazovi.jpg" alt="Братья Карамазовы" width="100" height="140">
            </a>
            </form>
            <div class="bookDesc">"Братья Карамазовы" — последний роман Ф. М. Достоевского, который автор писал два года. Роман был окончен в ноябре 1880 года.
            </div>
          </div>
          <div class="bookCover">
            <form action="getbooksdict-1.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
            <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/ru/prestup.txt">
            <input type="hidden" name="langId" value="<?php echo $langId;?>">
            <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
            </br>
            <a target="_blank" href="http://wordcharge.com/books/ru/prestup.txt">
              <img src="bookscovers/ru_prestuplenie_i_nakazanie.jpg" alt="Преступление и наказание" width="100" height="140">
            </a>
            </form>
            <div class="bookDesc">"Преступление и наказание" — роман Фёдора Михайловича Достоевского, впервые опубликованный в 1866 году. 
            </div>
          </div>
        
            </div>  <!-- end of wrapper-content  -->
      </div> <!-- end of jumbotron -->
			
    	<!--Footer-->
			<?php include_once("php/footer-1.php");?>
    	<!--END of Footer-->
    
		</div> <!-- /container -->

  </body>
</html>
