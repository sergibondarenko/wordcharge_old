<?php 
//  if(isset($_GET['myLang'])){
//    $myLang = $_GET["myLang"];
//  } else {
//    $myLang = "en";
//  }
include_once("php/setsitelanguage.php");

session_start();
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
session_regenerate_id(true);
header("location:index-1.php?myLang=$myLang");
?>
