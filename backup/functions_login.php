<?php

function connectToDB() {
  global $linkLogin, $dbhost, $dbuser, $dbpass, $dbname;
  ($linkLogin = mysql_pconnect("$dbhost", "$dbuser", "$dbpass")) || die("Couldn't connect to MySQL");
  mysql_select_db("$dbname", $linkLogin) || die("Couldn't open db: $dbname. Error if any was: ".mysql_error() );
} 



function newUser($login, $password) {
  global $linkLogin;

  $query="INSERT INTO users (login, password) VALUES('$login', '$password')";
  $result=mysql_query($query, $linkLogin) or die("Died inserting login info into db.  Error returned if any: ".mysql_error());

  return true;
} 



function displayErrors($messages) {
  //print("<b>Возникли следующие ошибки:</b>\n<ul>\n");
  print("<b>Errors:</b>\n<ul>\n");

  foreach($messages as $msg){
    print("<li>$msg</li>\n");
  }
  print("</ul>\n");
} 




function checkLoggedIn($status){
  switch($status){
    case "yes":
      if(!isset($_SESSION["loggedIn"])){
        header("Location: login.php");
        exit;
      }
      break;
    case "no":
      if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true ){
        header("Location: members.php");
      }
      break;
  }
  return true;
} 



function checkPass($login, $password) {
  global $linkLogin;

  $query="SELECT login, password FROM users WHERE login='$login' and password='$password'";
  $result=mysql_query($query, $linkLogin)
    or die("checkPass fatal error: ".mysql_error());

  if(mysql_num_rows($result)==1) {
    $row=mysql_fetch_array($result);
    return $row;
  }
  return false;
} 


function cleanMemberSession($login, $password) {
  $_SESSION["login"]=$login;
  $_SESSION["password"]=$password;
  $_SESSION["loggedIn"]=true;
} 


function flushMemberSession() {
  unset($_SESSION["login"]);
  unset($_SESSION["password"]);
  unset($_SESSION["loggedIn"]);
  session_destroy();
  return true;
} 

function field_validator($field_descr, $field_data, $field_type, $min_length="", $max_length="", $field_required=1) {

  global $messages;

  if(!$field_data && !$field_required){ return; }

  $field_ok=false;

  $email_regexp="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|";
  $email_regexp.="(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$";

  $data_types=array(
    "email"=>$email_regexp,
    "digit"=>"^[0-9]$",
    "number"=>"^[0-9]+$",
    "alpha"=>"^[a-zA-Z]+$",
    "alpha_space"=>"^[a-zA-Z ]+$",
    "alphanumeric"=>"^[a-zA-Z0-9]+$",
    "alphanumeric_space"=>"^[a-zA-Z0-9 ]+$",
    "string"=>""
  );

  if ($field_required && empty($field_data)) {
    //$messages[] = "Поле $field_descr является обезательным";
    $messages[] = "The field $field_descr is required";
    return;
  }

  if ($field_type == "string") {
    $field_ok = true;
  } else {
    $field_ok = ereg($data_types[$field_type], $field_data);
  }

  if (!$field_ok) {
    //$messages[] = "Пожалуйста введите нормальный $field_descr.";
    $messages[] = "Please enter right $field_descr.";
    return;
  }

  if ($field_ok && ($min_length > 0)) {
    if (strlen($field_data) < $min_length) {
      //$messages[] = "$field_descr должен быть не короче $min_length символов.";
      $messages[] = "$field_descr must be not shorter than $min_length symbols.";
      return;
    }
  }

  if ($field_ok && ($max_length > 0)) {
    if (strlen($field_data) > $max_length) {
      //$messages[] = "$field_descr не должен быть длиннее $max_length символов.";
      $messages[] = "$field_descr must be not longer than $max_length symbols.";
      return;
    }
  }
}
?>
