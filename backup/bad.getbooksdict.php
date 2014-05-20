<?php
include("php/vars.php");
include("php/functions.php");

$myLang = $_POST["myLang"];
$langId = $_POST["langId"];
$langId = $langId."-".$myLang;
$myUrl = $_POST["myUrl"];
echo "Hello Sergey! How are you?"."<br>";
echo "Translation of the book: ".$langId."<br>";
echo "Lang of the page: ".$myLang."<br>";
echo "Book URI: ".$myUrl."<br>";


?>
