<?php

$ydKey = 'dict.1.1.20140101T191051Z.9249b28df324056a.b4ed43cbaf5d80c24126112974e44172c430157d';
$ytKey = 'trnsl.1.1.20140213T084832Z.2e599cd43e74002d.d935bc98da1909103ec212bc9ce71adeaac9de4a';
$gtKey = 'AIzaSyCN8b9KC_1mHrfYgkeFdMuKEPZM4z2j8eA';
$ydApi = 'https://dictionary.yandex.net/api/v1/dicservice.json/lookup';
$ytApi = 'https://translate.yandex.net/api/v1.5/tr.json/translate';
$gtApi = 'https://www.googleapis.com/language/translate/v2';
$api_data = ["ydKey"=> $ydKey, "ytKey"=> $ytKey, "gtKey"=> $gtKey, "ydApi"=> $ydApi, "ytApi"=> $ytApi, "gtApi"=> $gtApi];

$MysqlDB="wordcharge";
$MysqlUser='wordcharge';
$MysqlUPass="zef1rv1ter";
$MysqlUserDB="user";
$UserNW="GuestNW";
$UserKNW="sergibondarenko_knw";

?>