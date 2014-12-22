<?php

session_start();
  
$dict_key = 'dict.1.1.20140101T191051Z.9249b28df324056a.b4ed43cbaf5d80c24126112974e44172c430157d';
//$dict_key = 'dict.1.1.20140520T221037Z.00c3f966f242fc05.1df493884a0007d80bea7d7e17de84e22d101ec9';
$trnsl_key = 'trnsl.1.1.20140213T084832Z.2e599cd43e74002d.d935bc98da1909103ec212bc9ce71adeaac9de4a';
$google_trnsl_key = 'AIzaSyCN8b9KC_1mHrfYgkeFdMuKEPZM4z2j8eA';
//$trnsl_key = 'trnsl.1.1.20140520T220848Z.4efe8937d9f7f535.fc5d544c4e938badeabdefd2c67244121c2460de';
$dict_api = 'https://dictionary.yandex.net/api/v1/dicservice.json/lookup';
$trnsl_api = 'https://translate.yandex.net/api/v1.5/tr.json/translate';
$google_trnsl_api = 'https://www.googleapis.com/language/translate/v2';

$MysqlDB="wordcharge";
$MysqlUser='wordcharge';
$MysqlUPass="zef1rv1ter";
$MysqlUserDB="user";
$UserNW="GuestNW";
$UserKNW="sergibondarenko_knw";
//$GuestNotNW="Guest_IKnowWords_it1en";

    
?>
