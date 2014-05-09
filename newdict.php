<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>WordCharge</title>
    <!--<meta charset="utf-8">-->
    <meta charset="UTF-8">
    <link href="css/site.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />-->
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
    <!-- functions.js - 1.Save known words;  -->
    <script>
      <?php
        // Transfer $_SESSION["myusername"] and $langId 
        // to JQuery functions.js and iknowtheword.php 
        $theSessionUser = $_SESSION["myusername"];
        echo "var theSessionUser = '{$theSessionUser}';";
        $langId = $_POST['langId'];
        echo "var langId = '{$langId}';";
      ?>
      <?php 
        // Transfer site language value $myLang 
        // to JQuery functions.js and iknowtheword.php 
        include("php/setsitelanguage.php"); 
        echo "var myLang = '{$myLang}';";
      ?>
    </script>
    <script src="js/functions.js"></script>
</head>
<body>
    <?php include("php/header.php"); ?>
    <div id="wrapper-main">
      <div id="wrapper-login">
        <?php include_once("php/wrapper-login.php");?>
      </div>

        <h2>WordCharge</h2>
    
        <!-- Progress bar holder -->
        <div id="progress" style="width:500px;border:1px solid #ccc;"></div>
        <!-- Progress information -->
        <div id="information" style="width"></div>
        
        <p id="wordSaveStatus"><?php echo $langArray["textWordSaveStatus"]; ?></p>
        
        <?php
            include("php/vars.php");
            include("php/functions.php");
            
            header('Content-Type: text/html; charset=utf-8');

            $textArea = $_POST['textArea'];
            $langId = $_POST['langId'];

            // Take the loged user name as a tables name           
            $UserNW=$theSessionUser."_NW"; //New words
            $UserKNW=$theSessionUser."_KNW"; //Known words
 
            // 1.=====
            // Get data from html form textrArea field, remove all special characters
            // and make an array ($words), convert all words to lowercase 
            // Delete all dublicate words in the array and sort in descending order
            $words = split_text_into_words($textArea);
            $totalWords = count($words);
           
            // Select only new words
            $words = look_for_the_new_words($words,$langId,$MysqlUser,$MysqlUPass,$MysqlDB,$UserKNW);

            // Count words stat
            $totalNew = count($words);
            $youKnow = $totalWords - $totalNew;
            $yPercent = ($youKnow * 100)/$totalWords;
            //echo "<div id=\"wordsStat\">"."Total number: ".$totalWords."; New: ".$totalNew."; You know: ".$youKnow." (".round($yPercent,2)."%);"."<div>";
            echo "<div id=\"wordsStat\">".$langArray["textNewdictTotal"].": ".$totalWords."; ".$langArray["textNewdictNew"].": ".$totalNew."; ".$langArray["textNewdictYouknow"].": ".$youKnow." (".round($yPercent,2)."%);"."<div>";
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
            for($i=0; $i<$totalNew; $i++){

                // Progress Bar: Calculate the percentation
                $percent = intval($i/$totalNew * 100)."%";
                
                // Progress Bar: Javascript for updating the progress bar and information
                echo '<script language="javascript">
                document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
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
            echo "<table id='tableDict'>
            <tr>
            <th>".$langArray["textTableIknow"]."</th>
            <th>".$langArray["textTableFreq"]."</th>
            <th>".$langArray["textTableWord"]."</th>
            <th>".$langArray["textTableText"]."</th>
            </tr>";
            
            while($row = mysqli_fetch_array($sqlSelect)) {
              echo "<tr>";
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
        <?php include("php/footer.php"); ?>
    </div>
</body>
</html>
