<?php

// Class based variant of the iknowtheword.php module

include("vars.php");

$word = $_POST['word'];
$freq = $_POST['freq'];
$text = $_POST['text'];

$mysqli = new mysqli("localhost",$MysqlUser,$MysqlUPass,$MysqlDB);

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

/* change character set to utf8 */
if (!$mysqli->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
} 
/*else {
    printf("Current character set: %s\n", $mysqli->character_set_name());
}*/

// Delete the word in tmp table (this word marked as known on newdict.php)
if (!$mysqli->query("DELETE FROM $UserNW WHERE word='$word' AND freq='$freq'")) {
//    printf("The row successfully deleted.\n");
  printf("iknowtheword1.php - Error after Delete: %s\n", $mysqli->error);
}

// Insert the word to the table of known words 
if (!$mysqli->query("INSERT INTO $UserKNW (freq, word, text) VALUES ('$freq', '$word', '$text')")) {
//    printf("The row successfully deleted.\n");
  printf("iknowtheword1.php - Error after Insert: %s\n", $mysqli->error);
}

$mysqli->close();

echo "Now you know the "."\"".$word."\"! Translation: ".$text; 
?>
