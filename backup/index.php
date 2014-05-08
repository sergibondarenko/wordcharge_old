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
  <div id="super-main">
    <?php 
      $myLang = isset($_GET["myLang"])? $_GET["myLang"]: "en";
      //$langArray = parse_ini_file("languages/".$myLang.".ini");
      $langArray = parse_ini_file("languages/".$myLang.".ini");
    ?>

    <div id="wrapper-langs">
      <?php include_once("php/wrapper-languages.php"); ?>
    </div>

    <?php 
      //$myHome = $langArray["home"];
      include("php/header.php"); 
    ?>
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
                      <option value="en-ru">English-Russian</option>
                      <option value="it-ru" selected>Italian-Russian</option>
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


      <?php include("php/footer.php"); ?>
    </div>
  </div>

</body>
</html>
