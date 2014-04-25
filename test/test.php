<?php
header('Content-type: text/plain; charset=utf-8');

/*$jsonTr = file_get_contents('https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20140213T084832Z.2e599cd43e74002d.d935bc98da1909103ec212bc9ce71adeaac9de4a&lang=ru-en&format=html&text=привет');
$objTr = json_decode($jsonTr);
print_r($objTr);

$jsonDic = file_get_contents('https://dictionary.yandex.net/api/v1/dicservice.json/lookup?key=dict.1.1.20140101T191051Z.9249b28df324056a.b4ed43cbaf5d80c24126112974e44172c430157d&lang=ru-en&format=html&text=привет');
$obj = json_decode($jsonDic);
print_r($objDic);
*/
$jsonEnRu = file_get_contents('https://dictionary.yandex.net/api/v1/dicservice.json/lookup?key=dict.1.1.20140101T191051Z.9249b28df324056a.b4ed43cbaf5d80c24126112974e44172c430157d&lang=en-ru&format=html&text=hello');
$objEnRu = json_decode($jsonEnRu, true);
print_r($objEnRu);

?>
