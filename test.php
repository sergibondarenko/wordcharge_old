<?php
/*
header("Content-Type: text/plain; charset=utf-8");
$dict_key = 'dict.1.1.20140520T221037Z.00c3f966f242fc05.1df493884a0007d80bea7d7e17de84e22d101ec9';
$trnsl_key = 'trnsl.1.1.20140520T220848Z.4efe8937d9f7f535.fc5d544c4e938badeabdefd2c67244121c2460de';

$aWord = "дом";

$jsonTr = file_get_contents('https://translate.yandex.net/api/v1.5/tr.json/translate?key='.$trnsl_key.'&lang=ru-en&format=html&text='.urlencode($aWord));
print_r($jsonTr);
$objTr = json_decode($jsonTr);
print_r($objTr);

$jsonDic = file_get_contents('https://dictionary.yandex.net/api/v1/dicservice.json/lookup?key='.$dict_key.'&lang=ru-en&format=html&text='.urlencode($aWord));
//print_r(json_decode($jsonDic,true));
$objDic = json_decode($jsonDic);
print_r($objDic);
*/

$text="q w e r t y Hello my world! How are you? This is test!!! L'acqua e pulita!";
$words = preg_split('/\P{L}+/u', $text, 0, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);

foreach($words as $key=>$word){
  if(strlen($words[$key]) < 2){
    unset($words[$key]);
  }
}


print_r($words);

?>
