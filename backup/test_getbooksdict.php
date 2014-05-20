<?php
include("php/vars.php");
include("php/functions.php");

$myLang = $_GET["myLang"];
//$langId = $langId."-".$myLang;
$langId = $_POST["langId"];
$myUrl = $_POST["myUrl"];
echo "Hello Sergey! How are you?"."<br>";
echo "Translation of the book: ".$langId."<br>";
echo "Lang of the page: ".$myLang."<br>";
echo "Book URI: ".$myUrl."<br>";


?>
