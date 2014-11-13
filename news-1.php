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
    <script>
      // Select News Type by clicking radio button
      function selectNewsType(){
        if (document.getElementById('topNews').checked) {
          var newsType = document.getElementById('topNews').value;
          document.getElementById('topNews').checked = true;
        }
        if (document.getElementById('sciTech').checked) {
          var newsType = document.getElementById('sciTech').value;
          document.getElementById('sciTech').checked = true;
        } 
        if (document.getElementById('polNews').checked) {
          var newsType = document.getElementById('polNews').value;
          document.getElementById('polNews').checked = true;
        } 
        if (document.getElementById('busNews').checked) {
          var newsType = document.getElementById('busNews').value;
          document.getElementById('busNews').checked = true;
        } 
        //document.getElementById("newsTypeOutput").innerHTML = newsType;
        document.getElementById("newsTypeOutput").value = newsType;
      }
      // Get News RSS feed
      function showRSS(str) {
        var newsType = document.getElementById('newsTypeOutput').value;
        if (str.length==0) { 
          document.getElementById("rssOutput").innerHTML="";
          return;
        }
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        } else {  // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("rssOutput").innerHTML=xmlhttp.responseText;
          }
        }
        //xmlhttp.open("GET","php/getrss.php?q="+str,true);
        xmlhttp.open("GET","php/getrss-1.php?myLang=<?php echo $myLang;?>&newsT="+newsType+"&q="+str,true);
        xmlhttp.send();
      }
     </script>
  </head>

  <body>

	<?php include_once("navbar.php"); ?>

    <div class="container">
			
      <div class="jumbotron">

        <p><?php echo $langArray["textNewsText"];?></>
        
        <form>
          <label for="male"><?php echo $langArray["textNewsRadTop"];?></label>
          <input type="radio" class='radio-button' name="typeNewsRadio" id="topNews" value="w" onclick="selectNewsType()">
          <label for="male"><?php echo $langArray["textNewsRadSciTech"];?></label>
          <input type="radio" class='radio-button' name="typeNewsRadio" id="sciTech" value="t" onclick="selectNewsType()" checked>
          <label for="male"><?php echo $langArray["textNewsRadPol"];?></label>
          <input type="radio" class='radio-button' name="typeNewsRadio" id="polNews" value="p" onclick="selectNewsType()">
          <label for="male"><?php echo $langArray["textNewsRadBus"];?></label>
          <input type="radio" class='radio-button' name="typeNewsRadio" id="busNews" value="b" onclick="selectNewsType()">
        <div class="col-xs-6 col-sm-5 col-md-4 col-lg-3">    
          <select class="form-control" onchange="showRSS(this.value)">
          <option value=""><?php echo $langArray["textNewsDDL"];?></option>
          <?php include_once("php/newsdropdown.php");?>
        </div>
        
        </form>
        <br><br><p></p>
        
        <!--For news type variable-->
        <input type="hidden" id="newsTypeOutput">

        <div id="rssOutput">
            <?php echo $langArray["textNewsField"];?>
        </div>

      </div>
			
    	<!--Footer-->
			<?php include_once("php/footer-1.php");?>
    	<!--END of Footer-->
    
		</div> <!-- /container -->


  </body>
</html>

