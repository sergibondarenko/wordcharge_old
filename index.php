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
    <?php include_once("php/setsitelanguage.php");?>

    <div id="wrapper-langs">
      <?php include_once("php/wrapper-languages.php"); ?>
    </div>

    <?php 
      //echo $langArray["textHome"];
      //print_r($langArray);
      include("php/header.php"); 
    ?>
    <div id="wrapper-main">
      <div id="wrapper-login">
        <?php include_once("php/wrapper-login.php");?>
      </div>

      <h2>WordCharge</h2>
      
      <table width="300" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
        <form name="formIndex" method="post" action="newdict.php?myLang=<?php echo $myLang; ?>">
          <td>
          <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
            <tr>
              <td colspan="3"><strong><?php echo $langArray["textMakeCustomDic"]; ?> </strong></td>
            </tr>
            <tr>
              <td width="78"><?php echo $langArray["textLanguage"]; ?></td>
              <td width="6">:</td>
              <td width="294">
                <div id="wrapper-langSelect">
                  <?php include_once("php/languagedropdown.php");?>
                </div>      
              </td>
            </tr>
            <tr>
               <td><?php echo $langArray["textText"]; ?></td>
               <td></td>
               <td>
                <div id="wrapper-textArea">
                  <textarea rows="9" cols="70" placeholder="<?php echo $langArray["textTextArea"]; ?>" 
                          name="textArea" id="textArea"></textarea>
                </div>
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>
                <div id="wrapper-makeDict">
                  <input type="submit" value="<?php echo $langArray["textButtonMakeDict"]; ?>">
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
