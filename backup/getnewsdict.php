<?php
session_start();
?>

<?php
include_once("php/vars.php");
include_once("php/functions.php");
header('Content-Type: text/html; charset=utf-8');

$myLang = $_POST["myLang"];
$myUrl = $_POST["myUrl"];

//$langId = "en-".$myLang;
$langId = $myLang;

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


$myUrl = get_redirected_url($myUrl);

$content = remote_get_contents($myUrl);
$text = strip_html_js_tags($content);
$words = split_text_into_words($text);
$totalWords = count($words);


//print_r($words);
?>
<?php include("php/setsitelanguage.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>WordCharge</title>
  <meta charset="utf-8">
  <link href="css/site.css" rel="stylesheet">
</head>
<body>
<div id="super-main">

  <?php include("php/header.php"); ?>
  <div id="wrapper-main">
    <div id="wrapper-login">
      <?php include_once("php/wrapper-login.php");?>
    </div>
    <h2>WordCharge</h2>

<?php
//print_r($words);
//echo $charset;

  $con = mysql_db_connect($MysqlUser,$MysqlUPass,$MysqlDB,$UserNW);


// Select only new words
  $words = look_for_the_new_words($words,$langId,$MysqlUser,$MysqlUPass,$MysqlDB,$UserKNW);

  // Count words stat
  $totalNew = count($words);
  $youKnow = $totalWords - $totalNew;
  $yPercent = ($youKnow * 100)/$totalWords;
  //echo "<div id=\"wordsStat\">"."Total number: ".$totalWords."; New: ".$totalNew."; You know: ".$youKnow." (".round($yPercent,2)."%);"."<div>";
  echo "<div id=\"wordsStat\">".$langArray["textNewdictTotal"].": ".$totalWords."; ".$langArray["textNewdictNew"].": ".$totalNew."; ".$langArray["textNewdictYouknow"].": ".$youKnow." (".round($yPercent,2)."%);"."<div>";   
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

   /* free result set */
   mysqli_free_result($sqlSelect);

   // Close MySQL connection
   mysqli_close($con);



?>

    <?php include("php/footer.php"); ?>
  </div>

</div>
</body>
</html>
