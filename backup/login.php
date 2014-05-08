<?php
include_once("php/config_login.php");

checkLoggedIn("no");

$title="Authorization";

if(isset($_POST["submit"])) {
  field_validator("login name", $_POST["login"], "alphanumeric", 4, 15);
  field_validator("password", $_POST["password"], "string", 4, 15);
  if($messages){
    doIndex();
    exit;
  }

    if( !($row = checkPass($_POST["login"], $_POST["password"])) ) {
        $messages[]="Incorrect login/password, try again";
    }

  if($messages){
    doIndex();
    exit;
  }

  cleanMemberSession($row["login"], $row["password"]);

  header("Location: members.php");
} else {
  doIndex();
}

function doIndex() {
  global $messages;
  global $title;
?>
<html>
<head>
  <title>WordCharge</title>
  <meta charset="utf-8">
  <link href="css/site.css" rel="stylesheet">
</head>
<body>
  <?php include("php/header.php"); ?>
  <div id="wrapper-main">
    <h2>WordCharge</h2>
    <h3><?php print $title; ?></h3>
    <?php
      if($messages) { displayErrors($messages); }
    ?>

    <form action="<?php print $_SERVER["PHP_SELF"]; ?>" method="POST">
      <table>
        <tr><td>Login:</td><td><input type="text" name="login"
        value="<?php print isset($_POST["login"]) ? $_POST["login"] : "" ; ?>"
        maxlength="15"></td></tr>
        <tr><td>Password:</td><td><input type="password" name="password" value="" maxlength="15"></td></tr>
        <tr><td>&nbsp;</td><td><input name="submit" type="submit" value="Submit"></td></tr>
      </table>
    </form>
    <?php include("php/footer.php"); ?>
  </div>

</body>
</html>
<?php
}
?>
