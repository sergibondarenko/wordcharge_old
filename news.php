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
  // Select News Type by clicking radio button
  function selectNewsType(){
    if (document.getElementById('topNews').checked) {
      var newsType = document.getElementById('topNews').value;
      document.getElementById('topNews').checked = true;
    }
    if (document.getElementById('sciTech').checked) {
      var newsType = document.getElementById('sciTech').value;
      document.getElementById('sciTech').checked = true;
    } 
    if (document.getElementById('polNews').checked) {
      var newsType = document.getElementById('polNews').value;
      document.getElementById('polNews').checked = true;
    } 
    if (document.getElementById('busNews').checked) {
      var newsType = document.getElementById('busNews').value;
      document.getElementById('busNews').checked = true;
    } 
    //document.getElementById("newsTypeOutput").innerHTML = newsType;
    document.getElementById("newsTypeOutput").value = newsType;
  }
  // Get News RSS feed
  function showRSS(str) {
    var newsType = document.getElementById('newsTypeOutput').value;
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
    xmlhttp.open("GET","php/getrss.php?myLang=<?php echo $myLang;?>&newsT="+newsType+"&q="+str,true);
    xmlhttp.send();
  }
  </script>
</head>
<body id="bodyNews">
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
      <label for="male"><?php echo $langArray["textNewsRadTop"];?></label>
      <input type="radio" class='radio-button' name="typeNewsRadio" id="topNews" value="w" onclick="selectNewsType()">
      <label for="male"><?php echo $langArray["textNewsRadSciTech"];?></label>
      <input type="radio" class='radio-button' name="typeNewsRadio" id="sciTech" value="t" onclick="selectNewsType()" checked>
      <label for="male"><?php echo $langArray["textNewsRadPol"];?></label>
      <input type="radio" class='radio-button' name="typeNewsRadio" id="polNews" value="p" onclick="selectNewsType()">
      <label for="male"><?php echo $langArray["textNewsRadBus"];?></label>
      <input type="radio" class='radio-button' name="typeNewsRadio" id="busNews" value="b" onclick="selectNewsType()">

      <select onchange="showRSS(this.value)">
      <option value=""><?php echo $langArray["textNewsDDL"];?></option>
      <?php include_once("php/newsdropdown.php");?>
      <!--<option value="en">English News</option>
      <option value="it">Italian News</option>
      </select>-->
    </form>
    <br>
    <!--For news type variable-->
    <input type="hidden" id="newsTypeOutput">

    <div id="rssOutput"><?php echo $langArray["textNewsField"];?></div>

    <?php include("php/footer.php"); ?>
  </div>
</div>
</body>
</html>
