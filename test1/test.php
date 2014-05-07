<?php
$myLang = isset($_GET["myLang"])? $_GET["myLang"]: "en";
//$langArray = parse_ini_file("languages/".$myLang.".ini");
$langArray = parse_ini_file("languages/".$myLang.".ini");
//echo $langArray["home"];
?>
<?php

print_r($langArray);
?>
