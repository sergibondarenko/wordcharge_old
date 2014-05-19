<?php
session_start();
?>
<!DOCTYPE html>

<html>
<head>
  <title>WordCharge</title>
  <meta charset="utf-8">
  <link href="css/site.css" rel="stylesheet">
</head>
<body id="bodyNewwords">
<div id="super-main">
  <?php include("php/setsitelanguage.php"); ?>
    <div id="wrapper-langs">
      <?php include_once("php/wrapper-languages.php"); ?>
    </div>

  <?php include("php/header.php"); ?>
  <div id="wrapper-main">
    <div id="wrapper-login">
      <?php include_once("php/wrapper-login.php");?>
    </div>

    <h2>WordCharge</h2>
    <h3><?php echo $langArray["textNewwords"]; ?></h3>
    <?php 
        include("php/vars.php");
        include("php/latestdict.php"); 
    ?>
    <?php include("php/footer.php"); ?>
  </div>
</div>

</body>
</html>
