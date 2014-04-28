<?php
include("vars.php");

//$word = "word";
$word = $_POST['word'];
$freq = $_POST['freq'];
$text = $_POST['text'];

// Set MySQL connection and fill the database with new words
$con=mysqli_connect("localhost",$MysqlUser,$MysqlUPass,$MysqlDB);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Mysql query to delete the word marked as known in newdict.php
//$sqlDelete = mysqli_query($con,"DELETE FROM $UserNW WHERE word='$word' AND freq='$freq'");
if(!mysqli_query($con, "DELETE FROM $UserNW WHERE word='$word' AND freq='$freq'")){
  printf("Error to delete the word: %s\n", mysqli_error($con));
}

// Close MySQL connection
mysqli_close($con);

////echo "Now you know the "."\"".$word."\"! Freq is ".$freq.". Translation: ".$text; 
echo "Now you know the "."\"".$word."\"! Translation: ".$text; 
?>
