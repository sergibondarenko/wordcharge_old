<?php
  //$myLang = isset($_GET["myLang"])? $_GET["myLang"]: "en";

  if(isset($_GET["myLang"])){
    $myLang = $_GET["myLang"];
    //setcookie ("lang_site", $myLang, time()+60*60*24*30);
  } else {
    if(isset($_COOKIE['lang_site'])){
      $myLang = $_COOKIE['lang_site']; // get lang from cookie
    }else{
      $myLang = 'en'; // default lang
    }
    //$myLang = "en";
  }

	$testVar = "This is the test variable!!!";
  $langArray = parse_ini_file("languages/".$myLang.".ini");
?>
