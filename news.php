<?php
session_start();
?>
<?php include("php/setsitelanguage.php"); ?>

<!DOCTYPE html>
<html>
<head>
  <title>WordCharge</title>
  <meta charset="utf-8">
  <link href="css/site.css" rel="stylesheet">

  <script>
  function showRSS(str) {
    if (str.length==0) { 
      document.getElementById("rssOutput").innerHTML="";
      return;
    }
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("rssOutput").innerHTML=xmlhttp.responseText;
      }
    }
    //xmlhttp.open("GET","php/getrss.php?q="+str,true);
    xmlhttp.open("GET","php/getrss.php?myLang=<?php echo $myLang; ?>&q="+str,true);
    xmlhttp.send();
  }
  </script>
</head>
<body>
<div id="super-main">
    <div id="wrapper-langs">
      <?php include_once("php/wrapper-languages.php"); ?>
    </div>

  <?php include("php/header.php"); ?>
  <div id="wrapper-main">
    <div id="wrapper-login">
      <?php include_once("php/wrapper-login.php");?>
    </div>
    <h2>WordCharge</h2>
    
    <p><?php echo $langArray["textNewsText"];?></>
    
    <form>
    <select onchange="showRSS(this.value)">
    <option value=""><?php echo $langArray["textNewsDDL"];?></option>
    <?php include_once("php/newsdropdown.php");?>
    <!--<option value="en">English News</option>
    <option value="it">Italian News</option>
    </select>-->
    </form>
    <br>
    <div id="rssOutput"><?php echo $langArray["textNewsField"];?></div>

    <?php include("php/footer.php"); ?>
  </div>
</div>
</body>
</html>
