<?php
//$word = "word";
$word = $_POST['word'];
$freq = $_POST['freq'];
$text = $_POST['text'];

echo "Now you know the "."\"".$word."\"! Freq is ".$freq.". Translation: ".$text; 
?>
