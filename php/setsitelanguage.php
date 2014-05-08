<?php
  //$myLang = isset($_GET["myLang"])? $_GET["myLang"]: "en";
//  if(isset($_COOKIE['lang_site'])){
//    $myLang = $_COOKIE['lang_site']; // get lang from cookie
//  }else{
//    $myLang = 'en'; // default lang
//  }
  if(isset($_GET['myLang'])){
    $myLang = $_GET["myLang"];
//    setcookie ("lang_site", $myLang, time() + 3600*24, "/");
  } else {
    $myLang = "en";
  }

  $langArray = parse_ini_file("languages/".$myLang.".ini");
?>
