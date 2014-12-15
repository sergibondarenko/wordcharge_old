<?php
header('Content-Type: text/html; charset=utf-8');

include_once("php/vars.php");

$start = microtime(true);



echo "Hello, this is the test of Google Translation API!"."<br>";

$langId="zh-ru";
$aWord = "家";

$google_langId = explode("-", $langId);
echo $google_langId[0]."<br>";
echo $google_langId[1]."<br>";

$jsonurlTrGoogle = $google_trnsl_api."?key=".$google_trnsl_key."&source=".$google_langId[0]."&target=".$google_langId[1]."&q=".urlencode($aWord);
//echo $jsonurlTrGoogle;
echo "<br>";

$jsonTrG = json_decode(file_get_contents($jsonurlTrGoogle), true);
print_r($jsonTrG);
echo "<br>";

echo "Parsed:"."<br>";
$dataTrG = array();
$nTr = 0;
foreach($jsonTrG['data']['translations'] as $item){
    //$item['translatedText'] = str_replace("'", "`", $item['translatedText']); // to screen special character "'"
    $dataTrG[$nTr] = $item['translatedText'];
    $nTr++;
    //print $item['translatedText'];    
}
print_r($dataTrG);
echo "<br>";
var_dump($dataTrG);

/*echo $jsonTrG->{'data'};
echo $jsonTrG["data"]["translations"]["translatedText"];
echo $jsonTrG["translations"];
echo $jsonTrG["translatedText"];
echo "<br>";
*/
/*$dataTrG = array();
$nTr = 0;
foreach($jsonTrG["translatedText"] as $keyTr=>$wordTr){
    $wordTr = str_replace("'", "`", $wordTr); // to screen special character "'"
    $dataTr[$nTr] = $wordTr;
    $nTr++;
  */  
  
$time_elapsed_us = microtime(true) - $start;
echo "<br><br><br>Time elapsed: ".$time_elapsed_us."<br>";

?>