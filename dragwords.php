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
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

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
	<script src="js/jquery.ui.touch-punch.min.js"></script>
	
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    
    <style>
        html,body {height:100%;}
        .special,.special .jumbotron {height:100%;}
        
        .ui-draggable-handle { /*To eleminate bug of hiding draggable behind droppable*/
            z-index: 1;
        }   
    </style>

  </head>

  <body>

	<?php include_once("navbar.php"); ?>
	<?php 
        include_once("php/vars.php");
        include_once("php/flashdict.php"); 
    ?>

    <div class="container">
			
      <div class="jumbotron" id="jumbo">
        <h3><?php echo $langArray["WordGamesDrugDropDescr"];?></h3>
        
        <p id="wordsTotal"></p>
        <button id="nextTen"><?php echo $langArray["WordGamesDrugDropNext"];?>&nbsp; 10</button>
        <br><br>
        
        <div class="container-fluid">
            <div class="col-xs-5 col-sm-4 col-md-5">
                <div clas="row" id="draggables">
                </div>
            </div>
            <div class="col-xs-7 col-sm-6 col-md-7" >
                <div class="row" id="droppables">
                </div>
            </div>
        </div>
       
      </div> <!--End of Jumbotron-->

    <script>
        //$(document).ready(function(){

            
            var wordsTotal = <?php echo $numRows ?>;
            var wordIndexMax = wordsTotal-1;
            var numOfWords = wordsTotal-1;
            var wordIndex = 0;
            
            if(wordsTotal <= 10){
                var setOfWords = numOfWords;
            } else {
                var setOfWords = 10;
            }
            
            document.getElementById("wordsTotal").innerHTML = "<small><?php echo $langArray["WordsTestTotal"];?>" + " " + wordIndexMax + "</small>";
            
            // Get dictionary in JSON format
            var flashWordsJS = <?php echo json_encode($flashWordsPHP, JSON_PRETTY_PRINT) ?>;
        
            // Apply style for boxes
            function styleBoxes(firstWord, lastWord){
                for(var i = firstWord; i < lastWord; i++){
                    $("head").append("<style>#draggable-" + i + " { width: 100px; padding: 0.5em; float: left; margin: 10px 10px 10px 0; white-space: pre-wrap; white-space: -moz-pre-wrap; white-space: -o-pre-wrap; word-wrap: break-word; }</style>");
                    $("head").append("<style>#droppable-" + i + " { width: 130px; padding: 0.5em; float: left; margin: 10px; white-space: pre-wrap; white-space: -moz-pre-wrap; white-space: -o-pre-wrap; word-wrap: break-word; }</style>");
                    //$("head").append("<style>#droppable-" + i + " { position: absolute; left: 650px; bottom: 150px; width: 150px; height: 100px; padding: 0.5em; float: left; margin: 10px; }</style>");
                }
            }
            styleBoxes(0,numOfWords);
            
            function shuffle(array) {
              var currentIndex = array.length, temporaryValue, randomIndex;
                
                  // While there remain elements to shuffle...
                  while (0 !== currentIndex) {
                
                    // Pick a remaining element...
                    randomIndex = Math.floor(Math.random() * currentIndex);
                    currentIndex -= 1;
                
                    // And swap it with the current element.
                    temporaryValue = array[currentIndex];
                    array[currentIndex] = array[randomIndex];
                    array[randomIndex] = temporaryValue;
                  }
                  return array;
            }    
            
            function makeCards(firstWord, lastWord){
                var dropArray = [];
                for(var i = firstWord; i < lastWord; i++){
                    dropArray.push(i);
                }
                
                dropArray = shuffle(dropArray);
                for(var i = 0; i < dropArray.length; i++){
                    myElemDrop = document.createElement('div');
                    myElemDrop.setAttribute("id","droppable-"+ dropArray[i]);
                    myElemDrop.setAttribute("class","ui-widget-header");
                    document.getElementById("droppables").appendChild(myElemDrop);
                }
                
                for(var i = firstWord; i < lastWord; i++){
                    myElemDrag = document.createElement('div');
                    myElemDrag.setAttribute("id","draggable-"+i);
                    myElemDrag.setAttribute("class","ui-widget-content");
                    document.getElementById("draggables").appendChild(myElemDrag);
                }
            }
            
            // Create a boxes that will contain words and corresponding translation
            makeCards(0,setOfWords);
            
            // Fill the boxes
            function fillBoxes(firstWord, lastWord){
                for(var i = firstWord; i < lastWord; i++){
                    document.getElementById("draggable-"+i).innerHTML = flashWordsJS[i].word;
                    document.getElementById("droppable-"+i).innerHTML = flashWordsJS[i].text;
                }    
            }
            fillBoxes(0,setOfWords);
            
            // Assign Drug and Drop actions to the boxes
            function dragNDrop(firstWord, lastWord){
                $(function() {
                    for(var i = firstWord; i < lastWord; i++){
                        $( "#draggable-"+i ).draggable({scope : "draggable-"+i});
                        $( "#droppable-"+i ).droppable({
                          scope: "draggable-"+i,
                          drop: function( event, ui ) {
                            $( this )
                              .addClass( "ui-state-highlight" )
                              .find( "p" )
                                .html( "Dropped!" );
                          }
                        });
                    }
                });
            }
            dragNDrop(0,setOfWords);
            
            document.getElementById("nextTen").addEventListener("click",function(){
                        //if (typeof flashWordsJS[setOfWords+10].word === 'undefined') {
                        if (!flashWordsJS[setOfWords+10].hasOwnProperty('word')) {
                            setOfWords = displayNextSet(setOfWords,numOfWords-1);
                        } else {
                            setOfWords = displayNextSet(setOfWords,10);
                            wordIndexMax -= 10;
                            document.getElementById("wordsTotal").innerHTML = "<small><?php echo $langArray["WordsTestTotal"];?>" + " " + wordIndexMax + "</small>";
                        }
                        });
            
            function displayNextSet(setOfWords,num){
                document.getElementById("draggables").innerHTML = " ";
                document.getElementById("droppables").innerHTML = " ";
                
                styleBoxes(setOfWords,setOfWords + num);
                makeCards(setOfWords,setOfWords + num);
                fillBoxes(setOfWords,setOfWords + num);
                dragNDrop(setOfWords,setOfWords + num);
                
                return setOfWords + num;
            }
            
            //});
    </script>

    	<!--Footer-->
			<?php include_once("php/footer-1.php");?>
    	<!--END of Footer-->
    
		</div> <!-- /container -->


  </body>
</html>

