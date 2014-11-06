<?php session_start(); ?>
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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <?php
        include_once("php/vars.php");
        include_once("php/functions.php");
        include_once("php/setsitelanguage-1.php"); 

        // Transfer $_SESSION["myusername"] and $langId 
        //$textArea = $_POST['textArea'];
        $theSessionUser = $_SESSION["myusername"];
        //$langId = $_POST['langId'];
        $myLang = $_GET['myLang']; //For user interface lang. Format: ru
        $langId = $_POST['langId']; //For dict lang. Format: ru-en
        
      ?>
      <?php
        function strip_html_js_tags($text)
        {
          $search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript 
                          '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly 
                          '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags 
                          '@<![\s\S]*?–[ \t\n\r]*>@',         // Strip multi-line comments including CDATA 
                          '/\s{2,}/',
                          );
          $text = preg_replace($search, "\n", html_entity_decode($text));
          return $text;
        }
      ?>

	  <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
	  <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <!--jQuery scripts-->
    <script>
      var langId = <?php echo json_encode($langId); ?>;
      var myLang = <?php echo json_encode($myLang); ?>;
      var theSessionUser = <?php echo json_encode($theSessionUser); ?>;
    </script>
    <script src="js/makeWordsKnown.js"></script>
</head>
<body>

	<?php include_once("navbar.php"); ?>

    <div class="container">

    	<div class="jumbotron">

        <!-- Progress bar holder -->
        <div class="progress">
          <div class="progress-bar progress-bar-custom" id="progress" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> </div>
        </div>

        <!-- Progress information -->
        <div id="information" style="width"></div>
        
        <p id="wordSaveStatus"><?php echo $langArray["textWordSaveStatus"]; ?></p>
        
        <?php
            header('Content-Type: text/html; charset=utf-8');

            //$langId = $_POST['langId'];
            $myUrl = $_POST["myUrl"];

            // Take the loged user name as a tables name           
            $UserNW=$theSessionUser."_NW"; //New words
            $UserKNW=$theSessionUser."_KNW"; //Known words
 
            // 1.=====
            // Get data from html form textrArea field, remove all special characters
            // and make an array ($words), convert all words to lowercase 
            // Delete all dublicate words in the array and sort in descending order
            $myUrl = get_redirected_url($myUrl);
            $content = remote_get_contents($myUrl);
            $text = strip_html_js_tags($content);
            $words = split_text_into_words($text);
            $totalWords = count($words);
           
            // Select only new words
            $words = look_for_the_new_words($words,$langId,$MysqlUser,$MysqlUPass,$MysqlDB,$UserKNW);

            // Count words stat
            $totalNew = count($words);
            $youKnow = $totalWords - $totalNew;
            $yPercent = ($youKnow * 100)/$totalWords;
            echo "<div id=\"wordsStat\">".$langArray["textNewdictTotal"].": ".$totalWords."; ".$langArray["textNewdictNew"].": ".$totalNew."; ".$langArray["textNewdictYouknow"].": ".$youKnow." (".round($yPercent,2)."%);"."</div>";
            //echo $theSessionUser;
            
            // 2.=====
            // Set MySQL connection and fill the database with new words
            $con=mysqli_connect("localhost",$MysqlUser,$MysqlUPass,$MysqlDB);
            
            // Check connection
            if (mysqli_connect_errno()) {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
           
            // Create user Mysql tables if not exists   
            //$UserNW=$theSessionUser."_NW";
            //$UserKNW=$theSessionUser."_KNW";
            
            $sqlCreate = "CREATE TABLE IF NOT EXISTS $UserNW( ".
                   "id INT(20) NOT NULL AUTO_INCREMENT, ".
                   "lang VARCHAR(10) NOT NULL, ".
                   "freq BIGINT(20) NOT NULL, ".
                   "word VARCHAR(40) NOT NULL, ".
                   "text VARCHAR(255) NOT NULL, ".
                   "PRIMARY KEY ( id )) ".
                   "ENGINE=InnoDB DEFAULT CHARSET=utf8";
            if (!mysqli_query($con,$sqlCreate)) {
              die('Error after Create: ' . mysqli_error($con));
            }
            mysqli_free_result($sqlCreate);
 
            // Mysql query to delete old data from the new words table
            $sqlDelete = "TRUNCATE TABLE $UserNW";
            if (!mysqli_query($con,$sqlDelete)) {
              die('Error after Delete: ' . mysqli_error($con));
            }
            mysqli_free_result($sqlDelete);
            
            // change character set to utf8
            if (!mysqli_set_charset($con, "utf8")) {
                printf("Error loading character set utf8: %s\n", mysqli_error($con));
            }
            
             //$totalNew = maximum number of new words found
            // Loop through the words in $words array and run the Progress Bar
            for($i = 0; $i <= $totalNew; $i++){

                // Progress Bar: Calculate the percentation
                $percent = intval($i/$totalNew * 100)."%";
                
                // Progress Bar: Javascript for updating the progress bar and information
                echo '<script language="javascript">
                document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#428bca;\">&nbsp;</div>";
                document.getElementById("information").innerHTML="'.$i.' '.$langArray["textNewdictProcessBar"].'";
                </script>';
            
                // Progress Bar: This is for the buffer achieve the minimum size in order to flush data
                echo str_repeat(' ',1024*64);
                
            
                // Progress Bar: Send output to browser immediately
                flush();
                
            
                // Get keys and values from $words and separate them
                $onlyWords = array_keys($words);
                $onlyFreq = array_values($words);
                
                // Insert word and its frequency into database
                $sqlInsert = mysqli_query($con, "INSERT INTO $UserNW (lang,freq,word) VALUES ('$langId','$onlyFreq[$i]', '$onlyWords[$i]')");
                if(!$sqlInsert){
                  die('newdict.php - Error after Insert: ' . mysqli_error($con)); 
                }
                /* free result set */
                mysqli_free_result($sqlInsert);

                // 3.=====
                // Translate every word in the $onlyWords[] array
                // Get word translation from Yandex Translate API
                // Get translation from Yandex Dict API
                // Merge Translate and Dict arrays into third array 
                // and delete all dublicate values in the third array 
                //Implode the merged third array into string of values separated by coma
                $strDict = get_yandex_api_translation_dictionary($onlyWords[$i], $langId, $trnsl_api, $trnsl_key, $dict_api, $dict_key);
                
                // Sql query to update translation for the word
                $sqlUpdate = mysqli_query($con, "UPDATE $UserNW SET text='$strDict' WHERE word='$onlyWords[$i]' AND freq='$onlyFreq[$i]' AND lang='$langId'");
                if(!$sqlUpdate){
                  die('newdict.php - Error after Update: ' . mysqli_error($con)); 
                }
                /* free result set */
                mysqli_free_result($sqlUpdate);

            }

            // Progress Bar: Tell user that the process is completed
            echo '<script language="javascript">document.getElementById("information").innerHTML="'.$langArray["textNewdictProcessBarComplete"].'"</script>'.'<br>';
            
            // 4.=====
            // Display words

            // Mysql query to display the table content 
            //$UserNW = mysqli_real_escape_string($con, $UserNW);
            $sqlSelect = mysqli_query($con,"SELECT * FROM $UserNW");
            if(!$sqlSelect){
              die('newdict.php - Error after Select: ' . mysqli_error($con)); 
            }
            
            // Display user dictinary in form of the html table
            echo "<br>";
            //echo "Dictionary: " . $langId . "<br>";
            echo $langArray["textNewdictDict"].": " . $langId . "<br>";
            //echo "<table id='tableDict'>  //Old design
            echo "<table class='table table-striped table-hover'>
            <tr>
            <th>".$langArray["textTableIknow"]."</th>
            <th>".$langArray["textTableFreq"]."</th>
            <th>".$langArray["textTableWord"]."</th>
            <th>".$langArray["textTableText"]."</th>
            </tr>";
            
            while($row = mysqli_fetch_array($sqlSelect)) {
              // echo "<tr>"; <!-- Old design --> 
              echo "<tr class='active'>";
              echo "<td>" . "<span class=\"iKnowTheWord\"><a href=\"\">".$langArray["textTableYes"]."</a></span>" . "</td>";
              echo "<td>" . "<span class=\"tdFreq\">" . $row['freq'] . "</span>" . "</td>";
              //echo "<td>" . $row['word'] . "</td>";
              echo "<td>" . "<span class=\"tdWord\">" . $row['word'] . "</span>" . "</td>";
              echo "<td>" . "<span class=\"tdText\">" . $row['text'] . "</span>" . "</td>";
              echo "</tr>";
            }
            
            echo "</table><br>";
           
            // To check MySQL charset
            /*$charset = mysqli_character_set_name($con);
            printf ("Current Mysql charset - %s\n",$charset);
            echo "<br>";*/

            /* free result set */
            mysqli_free_result($sqlSelect);
            
            // Close MySQL connection
            mysqli_close($con);
        ?>
    	</div> <!--jumbotron-->

   <!--Footer-->
		<?php include_once("php/footer-1.php");?>
   <!--END of Footer-->

    </div> <!--container-->
    
</body>
</HTML>
