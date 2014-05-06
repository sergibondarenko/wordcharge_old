<?php
include_once("config.php");

checkLoggedIn("no");

$title="Страница авторизации";

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
<title><?php print $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<h1><?php print $title; ?></h1>
<?php
if($messages) { displayErrors($messages); }
?>
<form action="<?php print $_SERVER["PHP_SELF"]; ?>" method="POST">
<table>
<tr><td>Логин:</td><td><input type="text" name="login"
value="<?php print isset($_POST["login"]) ? $_POST["login"] : "" ; ?>"
maxlength="15"></td></tr>
<tr><td>Пароль:</td><td><input type="password" name="password" value="" maxlength="15"></td></tr>
<tr><td>&nbsp;</td><td><input name="submit" type="submit" value="Submit"></td></tr>
</table>
</form>
</body>
</html>
<?php
}
?>
