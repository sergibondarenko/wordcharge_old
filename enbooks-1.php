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

    <link href="css/slider.css" rel="stylesheet">

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

    <script src="js/bootstrap-slider.js"></script>
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
              <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/en/hamlet.txt">
              <input type="hidden" name="langId" value="<?php echo $langId;?>">
              <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
                <!--<div class="well">
                  <input type="text" class="span2" value="10" id="sl1" >
                </div>-->
              <?php include("php/setbookpage.php");?>
              <br>
              <br>
              <a target="_blank" href="http://wordcharge.com/books/en/hamlet.txt">
                <img src="bookscovers/hamlet.jpg" alt="The Tragedy of Hamlet, Prince of Denmark" width="100" height="140">
              </a>
              </form>
              <div class="bookDesc">The Tragedy of Hamlet, Prince of Denmark. Written by William Shakespeare at an uncertain date between 1599 and 1602.
              </div>
              <br>
              <br>
            </div>
            <div class="bookCover">
              <form action="getbooksdict-1.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
              <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/en/kinglear.txt">
              <input type="hidden" name="langId" value="<?php echo $langId;?>">
              <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
              <?php include("php/setbookpage.php");?>
              <br>
              <br>
              <a target="_blank" href="http://wordcharge.com/books/en/kinglear.txt">
                <img src="bookscovers/kinglear.jpg" alt="The Tragedy of Hamlet, Prince of Denmark" width="100" height="140">
              </a>
              </form>
              <div class="bookDesc">King Lear. The Tragedy written by William Shakespeare at an uncertain date between 1603 and 1606.
            </div>
              <br>
              <br>
            </div>
            <div class="bookCover">
              <form action="getbooksdict-1.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
              <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/en/macbeth.txt">
              <input type="hidden" name="langId" value="<?php echo $langId;?>">
              <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
              <?php include("php/setbookpage.php");?>
              <br>
              <br>
              <a target="_blank" href="http://wordcharge.com/books/en/macbeth.txt">
                <img src="bookscovers/macbeth.jpg" alt="The Tragedy of Macbeth" width="100" height="140">
              </a>
              </form>
              <div class="bookDesc">The Tragedy of Macbeth. Written by William Shakespeare at an uncertain date between 1599 and 1606.
              </div>
              <br>
              <br>
            </div>
            <div class="bookCover">
              <form action="getbooksdict-1.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
              <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/en/merchantofvenice.txt">
              <input type="hidden" name="langId" value="<?php echo $langId;?>">
              <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
              <?php include("php/setbookpage.php");?>
              <br>
              <br>
              <a target="_blank" href="http://wordcharge.com/books/en/merchantofvenice.txt">
                <img src="bookscovers/merchantofvenice.jpg" alt="The Merchant of Venice" width="100" height="140">
              </a>
              </form>
              <div class="bookDesc">The Merchant of Venice. Written by William Shakespeare at an uncertain date between 1596 and 1598.
              </div>
              <br>
              <br>
            </div>
            <div class="bookCover">
              <form action="getbooksdict-1.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
              <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/en/midsummernightdream.txt">
              <input type="hidden" name="langId" value="<?php echo $langId;?>">
              <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
              <?php include("php/setbookpage.php");?>
              <br>
              <br>
              <a target="_blank" href="http://wordcharge.com/books/en/midsummernightdream.txt">
                <img src="bookscovers/midsummernightdream.jpg" alt="A Midsummer Night's Dream" width="100" height="140">
              </a>
              </form>
              <div class="bookDesc">A Midsummer Night's Dream is a comedy written by William Shakespeare at an uncertain date between 1590 and 1596.
              </div>
              <br>
              <br>
            </div>
        
            <div class="bookCover">
              <form action="getbooksdict-1.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
              <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/en/taleoftwocities.txt">
              <input type="hidden" name="langId" value="<?php echo $langId;?>">
              <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
              <?php include("php/setbookpage.php");?>
              <br>
              <br>
              <a target="_blank" href="http://wordcharge.com/books/en/taleoftwocities.txt">
                <img src="bookscovers/taleoftwocities.jpg" alt="A Midsummer Night's Dream" width="100" height="140">
              </a>
              </form>
              <div class="bookDesc">A Tale of Two Cities (1859) is a novel by Charles Dickens, set in London and Paris before and during the French Revolution..
              </div>
              <br>
              <br>
            </div>
        
            </div>
			

      </div>
			
    	<!--Footer-->
			<?php include_once("php/footer-1.php");?>
    	<!--END of Footer-->
    
		</div> <!-- /container -->


  <script>
  /*if (top.location != location) {
    top.location.href = document.location.href ;
  }
    $(function(){
      window.prettyPrint && prettyPrint();

        $('#sl1').slider({
          formater: function(value) {
            return 'Current value: '+value;
          }
        });
        $('#sl2').slider();

        var RGBChange = function() {
          $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
        };

        var r = $('#R').slider()
                .on('slide', RGBChange)
                .data('slider');
        var g = $('#G').slider()
                .on('slide', RGBChange)
                .data('slider');
        var b = $('#B').slider()
                .on('slide', RGBChange)
                .data('slider');

        $('#eg input').slider();
    });*/
  </script>


  </body>
</html>

