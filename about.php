<!DOCTYPE html>
<?php
session_start();
?>

<html>
<head>
    <title>WordCharge</title>
    <meta charset="utf-8">
    <link href="css/site.css" rel="stylesheet">
</head>
<body id="bodyAbout">
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
    <p><?php echo $langArray["textAboutMain"]; ?></p>

    <iframe width="420" height="315" src="//www.youtube.com/embed/zyV37RKoELw" frameborder="0" allowfullscreen></iframe>
    <iframe width="420" height="315" src="//www.youtube.com/embed/apXgLCAgjYs" frameborder="0" allowfullscreen></iframe>

    <?php include("php/footer.php"); ?>
  </div>
</div>

</body>
</html>
