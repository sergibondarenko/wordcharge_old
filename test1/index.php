<?php
session_start();
//echo $_SESSION["myusername"];
?>
<!DOCTYPE html>

<html>
<head>
    <title>WordCharge</title>
    <meta charset="utf-8">
    <link href="css/site.css" rel="stylesheet">
</head>
<body>

  <?php include("php/header.php"); ?>
  <div id="wrapper-main">
    <div id="wrapper-login">
      <?php include_once("php/wrapper-login.php");?>
    </div>

    <h2>WordCharge</h2>
    
   <!--<form action="newdict.php" method="post">
        <div id="wrapper-langSelect">
            Select a language:
            <select id="langId" name="langId">
                <option value="es-en">Spanish</option>
                <option value="fr-en">French</option>
                <option value="de-en">German</option>
                <option value="it-en">Italian</option>
                <option value="ru-en">Russian</option>
                <option value="uk-en">Ukrainian</option>
                <option value="en-ru" selected>English-Russian</option>
            </select>
        </div>
        <div id="wrapper-textArea">
            <textarea rows="9" cols="70" placeholder="Copy your text in this text area ..." 
                    name="textArea" id="textArea"></textarea>
        </div>
        <div id="wrapper-makeDict">
            <input type="submit" value="Make Dict">
        </div>
    </form>-->

    <table width="300" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
      <tr>
      <form name="formIndex" method="post" action="newdict.php">
        <td>
        <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
          <tr>
            <td colspan="3"><strong>Make custom dictionary </strong></td>
          </tr>
          <tr>
            <td width="78">Language</td>
            <td width="6">:</td>
            <td width="294">
              <div id="wrapper-langSelect">
                <select id="langId" name="langId">
                    <option value="es-en">Spanish</option>
                    <option value="fr-en">French</option>
                    <option value="de-en">German</option>
                    <option value="it-en">Italian</option>
                    <option value="ru-en">Russian</option>
                    <option value="uk-en">Ukrainian</option>
                    <option value="en-ru" selected>English-Russian</option>
                </select>
              </div>      
            </td>
          </tr>
          <tr>
             <td>Text</td>
             <td></td>
             <td>
              <div id="wrapper-textArea">
                <textarea rows="9" cols="70" placeholder="Copy your text in this text area ..." 
                        name="textArea" id="textArea"></textarea>
              </div>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>
              <div id="wrapper-makeDict">
                <input type="submit" value="Make Dict">
              </div>
            </td>
          </tr>
        </table>
        </td>
      </form>
      </tr>
    </table>


      <!--
       <div id="captchaField">
        <p><img id="captcha" src="php/captcha.php" width="160" height="45" border="1" alt="CAPTCHA">
        <small><a href="#" onclick="
          document.getElementById('captcha').src = 'php/captcha.php?' + Math.random();
          document.getElementById('captcha_code').value = '';
          return false;
        ">refresh</a></small></p>
        <p><input id="captcha_code" type="text" name="captcha" size="6" maxlength="5" onkeyup="this.value = this.val
      ue.replace(/[^\d]+/g, '');"> <small>copy the digits from the image into this box</small></p>
      </div>
     -->
    <?php include("php/footer.php"); ?>
  </div>

</body>
</html>
