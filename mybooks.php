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
    
    <script src="js/json-books.js"></script>
    
    
    <?php 
        include_once("php/functions.php");
        $myLang=sanitize_input($_GET["myLang"]);
        //$langId="en"."-".$myLang;
        
        $bookShelf=sanitize_input($_GET["shelf"]);
        //echo $bookShelf . "<br>";
    ?>
    <script>
        var myBookShelf = <?php echo json_encode($bookShelf); ?>;
        console.log(myBookShelf);
        var myLang = <?php echo json_encode($myLang);?>;
        console.log(myLang);
    </script>
    <?php include_once("php/setsitelanguage-1.php");?> <!--Script to set site language-->
  </head>

  <body>

	<?php include_once("navbar.php"); ?>

    <div class="container">
			
      <div class="jumbotron">
        <div id="wrapper-content">
            
        <div id="booksShelf"></div>
        <!--<div id="myError"></div>-->
        <script>
        
            var langId = "en";
            switch(myBookShelf){
                case "enbooks":
                    langId = "en-";
                    displayBooks(enbooks);
                    break;
                case "rubooks": 
                    langId = "ru-";
                    displayBooks(rubooks);
                    break;
                case "itbooks": 
                    langId = "it-";
                    displayBooks(itbooks);
                    break;
                default: 
                    langId = "en-";
                    displayBooks(enbooks);
            }
            
            //displayBooks(enbooks);
            
            function displayBooks(arr) {
                var out = "";
                var i;
                for(i = 0; i < arr.length; i++) {
                    out += '<div class="container-fluid">' +
                    '<div class="row">' +
                    '<div class="col-xs-12 col-sm-12 col-md-4">' + 
                    '<form method="post" target="_blank" action="wdict.php?myLang=' + "<?php echo $myLang; ?>" +'">' + 
                    '<input type="hidden" value="booksdict" name="dictCaller" />' +
                    '<input type="hidden" name="myUrl" id="myUrl" value="'+ arr[i].url +'">' +
                    '<input type="hidden" name="langId" value="' + langId + myLang + '">' +
                    '<input class="btn btn-default btn-xs" type="submit" name="makeDict" class="makeDict" value="' + 
                    "<?php echo $langArray["textButtonMakeDict"]; ?>" + '">' +
                    '&nbsp;&nbsp;&nbsp;&nbsp;<label>' + "<?php echo $langArray["booksSelfWordsNum"];?>" + 
                    '</label>&nbsp;<input type="text" name="numWords" maxlength="14" size="5" value=200>' +
                    //'</label>&nbsp;<div class="well"><input type="text" class="span2" value="" data-slider-min="50" data-slider-max="100000" data-slider-step="100" data-slider-value="200" id="sl1" ></div>' +
                    '</div></div><br>' +
                    '<div class="row">' +
                    '<div class="col-xs-5 col-sm-4 col-md-3">' +
                    '<a target="_blank" href="'+ arr[i].url +'">' +
                    '<img src="'+ arr[i].img +'" alt="The Tragedy of Hamlet, Prince of Denmark" width="100" height="140"></a>' +
                    '</div>'+
                    '<div class="col-xs-7 col-sm-6 col-md-4">' +
                    '<div class="bookDesc">'+ arr[i].description +'</div>' +
                    '</form>' +
                    '</div>' +
                    '</div>'+
                    '</div>' +
                    '<br><br>';
                }
                document.getElementById("booksShelf").innerHTML = out;
            }
        </script>
			
        </div>
      </div>
			
    	<!--Footer-->
			<?php include_once("php/footer-1.php");?>
    	<!--END of Footer-->
    
		</div> <!-- /container -->


<!--	<script>
	if (top.location != location) {
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
    });
  </script>
-->

  </body>
</html>

