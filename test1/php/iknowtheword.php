<?php

// Use instead class based module iknowtheword1.php

include("vars.php");

$word = $_POST['word'];
$freq = $_POST['freq'];
$text = $_POST['text'];
$langId = $_POST['langId'];
$theSessionUser = $_POST['theSessionUser'];

// Take the loged user name as a tables name           
$UserNW=$theSessionUser."_NW"; //New words
$UserKNW=$theSessionUser."_KNW"; //Known words

// Set MySQL connection and fill the database with new words
$con=mysqli_connect("localhost",$MysqlUser,$MysqlUPass,$MysqlDB);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// change character set to utf8
if (!mysqli_set_charset($con, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($con));
}

// Mysql query to delete the word marked as known in newdict.php
$sqlDelete = mysqli_query($con,"DELETE FROM $UserNW WHERE word='$word' AND freq='$freq' AND lang='$langId'");
if(!$sqlDelete){
  die('iknowtheword.php - Error after Delete: ' . mysqli_error($con). '; Session user is '. $theSessionUser);
}
mysqli_free_result($sqlDelete);

// Mysql query to delete the word marked as known in newdict.php
// use IGNORE to prevent dublicate values errors notifications
$sqlInsert = mysqli_query($con,"INSERT INTO $UserKNW (lang, word, text) VALUES ('$langId', '$word', '$text')");
//if(!$sqlInsert){
//  die('iknowtheword.php - Error after Insert: ' . mysqli_error($con));
//}
mysqli_free_result($sqlInsert);

if ($resultCnt = mysqli_query($con, "SELECT word FROM $UserKNW ORDER BY word")) {
  /* determine number of rows result set */
  $rowCnt = mysqli_num_rows($resultCnt);
  /* close result set */
  mysqli_free_result($resultCnt);
}

// To check MySQL charset
/*$charset = mysqli_character_set_name($con);
printf ("Current Mysql charset - %s\n",$charset);
echo "<br>";
*/
// Close MySQL connection
mysqli_close($con);

//echo "Now you know the "."\"".$word."\"! Translation: ".$text; 
echo "Word: <b>".$word."</b>;"." Now you know: ".$rowCnt." words;"; 
//echo $rowCnt;
?>
