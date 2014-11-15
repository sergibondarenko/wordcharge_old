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
        <h3><?php echo $langArray["WordsTestMenu"]; ?></h3>
        <?php 
            include_once("php/vars.php");
            include_once("php/flashdict.php"); 
        ?>

        <script>
          $(document).ready(function(){

            var wordIndex = 0;
            var wordsTotal = <?php echo $numRows ?>;
            var wordIndexMax = wordsTotal;
            document.getElementById("wordsTotal").innerHTML = "<small><?php echo $langArray["WordsTestTotal"];?>" + " " + wordsTotal + "</small>";
            var flashWordsJS = <?php echo json_encode($flashWordsPHP, JSON_PRETTY_PRINT) ?>;
            document.getElementById("wordField").innerHTML = flashWordsJS[wordIndex].word;
            document.getElementById("textField").innerHTML = "<?php echo $langArray["WordsTestText"]; ?>";

            $("#showText").click(function(){
              $("#textField").html(flashWordsJS[wordIndex].text);
            });
            $("#showNext").click(function(){
              if(wordIndex < wordsTotal-1){
                wordIndex++;
                wordIndexMax--;
              } else {
                wordIndex = 0;
                wordIndexMax = wordsTotal-1;
              }
              document.getElementById("wordsTotal").innerHTML = "<small><?php echo $langArray["WordsTestTotal"];?>" + " " + wordIndexMax + "</small>";
             
              $("#wordField").html(flashWordsJS[wordIndex].word);
              $("#textField").html("<br>");
              console.log(wordIndex);
              
            });
          });
        </script>

      <p id="wordsTotal"></p>
      <p id="wordsCurr"></p>
      <button class="btn btn-default btn-md" id="showText"><?php echo $langArray["WordsTestShow"];?></button>
      <button class="btn btn-default btn-md" id="showNext"><?php echo $langArray["WordsTestNext"];?></button>
      <br>
      <br>
      <p id="wordField"><br></p>
      <p id="textField"><br></p>
      

      </div>
			
    	<!--Footer-->
			<?php include_once("php/footer-1.php");?>
    	<!--END of Footer-->
    
		</div> <!-- /container -->


  </body>
</html>

