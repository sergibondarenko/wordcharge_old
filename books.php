<!DOCTYPE html>

<?php
session_start();
include("php/setsitelanguage.php");
?>

<html>
<head>
    <title>WordCharge</title>
    <meta charset="utf-8">
    <link href="css/site.css" rel="stylesheet">
</head>
<body>
  <div id="wrapper-langs">
    <?php include_once("php/wrapper-languages.php"); ?>
  </div>

  <?php include("php/header.php"); ?>
  <div id="wrapper-main">
    <h2>WordCharge</h2>
    <?php include_once("php/bookshelf.php"); ?>
    <?php include("php/footer.php"); ?>
  </div>

</body>
</html>
