<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<head>
    <title>WordCharge</title>
    <meta charset="utf-8">
    <link href="css/site.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />-->
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
    <!-- functions.js - 1.Save known words;  -->
    <script src="js/functions.js"></script>
</head>
<body>
  <?php include("php/header.php"); ?>
  <div id="wrapper-main">
    <h2>WordCharge</h2>
    
    <!-- Progress bar holder -->
    <div id="progress" style="width:500px;border:1px solid #ccc;"></div>
    <!-- Progress information -->
    <div id="information" style="width"></div>
    
    <p id="wordSaveStatus">Click "yes" to mark a word as a known.</p>
    
    <?php
      include("php/vars.php");
      include("php/functions.php");
      
      $textArea = $_POST['textArea'];
      $langId = $_POST['langId'];
      
      // 1.=====
      // Get data from html form textrArea field, remove all special characters
      // and make an array ($words), convert all words to lowercase 
      // Delete all dublicate words in the array and sort in descending order
      $words = split_text_into_words($textArea);
      $totalWords = count($words);
    
      // Select only new words
      //$words = look_for_the_new_words($words,$MysqlUser,$MysqlUPass,$MysqlDB,$UserKNW); 

      // Count unique words in the array of the words
      $totalNew = count($words);
      echo "Unique: ".$totalWords."; New words: ".$totalNew."; ";
      //print_r($words);


      // 2.=====
      // Set MySQL connection and fill the database with new words
      $con=mysqli_connect("localhost",$MysqlUser,$MysqlUPass,$MysqlDB);
      
      // Check connection
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      
      // Mysql query to delete old data from UserNW table
      $sqlDelete = "TRUNCATE TABLE $UserNW";
      if (!mysqli_query($con,$sqlDelete)) {
        die('Error after Delete: ' . mysqli_error($con));
      }
      
      // change character set to utf8
      if (!mysqli_set_charset($con, "utf8")) {
          printf("Error loading character set utf8: %s\n", mysqli_error($con));
      }
      
      
      // Loop through the words in $words array and run the Progress Bar
      for($i=0; $i<$total; $i++){
      
          // Progress Bar: Calculate the percentation
          $percent = intval($i/$total * 100)."%";
          
          // Progress Bar: Javascript for updating the progress bar and information
          echo '<script language="javascript">
          document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
          document.getElementById("information").innerHTML="'.$i.' word(s) processed.";
          </script>';
          
      
          // Progress Bar: This is for the buffer achieve the minimum size in order to flush data
          echo str_repeat(' ',1024*64);
          
      
          // Progress Bar: Send output to browser immediately
          flush();
          
      
          // Get keys and values from $words and separate them
          $onlyWords = array_keys($words);
          $onlyFreq = array_values($words);
          
          // Insert word and its frequency into database
          $sqlInsert = mysqli_query($con, "INSERT INTO $UserNW (freq, word) VALUES ('$onlyFreq[$i]', '$onlyWords[$i]')");
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
          $sqlUpdate = mysqli_query($con, "UPDATE $UserNW SET text='$strDict' WHERE word='$onlyWords[$i]' AND freq='$onlyFreq[$i]'");
          if(!$sqlUpdate){
            die('newdict.php - Error after Update: ' . mysqli_error($con)); 
          }
          /* free result set */
          mysqli_free_result($sqlUpdate);
      
      }
      
      // Progress Bar: Tell user that the process is completed
      echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed"</script>'.'<br>';
      
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
      echo "Dictionary: " . $langId . "<br>";
      echo "<table border='1'>
      <tr>
      <th>I know</th>
      <th>freq</th>
      <th>word</th>
      <th>text</th>
      </tr>";
      
      while($row = mysqli_fetch_array($sqlSelect)) {
        echo "<tr>";
        echo "<td>" . "<span class=\"iKnowTheWord\"><a href=\"\">yes</a></span>" . "</td>";
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
