<?php
# Запуск сессии
session_start();
# Служит для отладки, показывает все ошибки, предупреждения и т.д.
error_reporting(E_ALL);
# Подключение файлов с функциями
include_once("functions_login.php");
# В этом массиве далее мы будем хранить сообщения системы, т.е. ошибки.
$messages=array();
# Данные для подключения к БД
include_once("vars.php");
$dbhost="localhost";
//$dbuser="wordcharge";
//$dbpass="zef1rv1ter";
//$dbname="wordcharge";
$dbuser=$MysqlUser;
$dbpass=$MysqlUPass;
$dbname=$MysqlDB;
# Вызываем функцию подключения к БД
connectToDB();
?>
