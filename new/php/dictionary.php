<?php
header('Content-Type: text/html; charset=utf-8');

include_once "vars.php";
include_once "funs.php";
include_once "functions.php";

$langId = $_POST["tlang"];
$aWord = $_POST["aword"];

$langId = "en-ru";
//$aWord = "hello";

// Parse Yandex Translate API JSON string
$jsonurlTr = $api_data["ytApi"]."?key=".$api_data["ytKey"]."&lang=".$langId."&format=html&text=".urlencode($aWord);
$jsonTr = json_decode(remote_get_contents($jsonurlTr), true);
$yTDict[0] = $jsonTr["text"][0];

/*$google_langId = explode("-", $langId);
$jsonurlTrGoogle = $api_data["gtApi"]."?key=".$api_data["gtKey"]."&source=".$google_langId[0]."&target=".$google_langId[1]."&q=".urlencode($aWord);
$jsonTrG = json_decode(remote_get_contents($jsonurlTrGoogle), true);
$gTDict[0] = $jsonTrG["data"]["translations"][0]["translatedText"];
*/

$jsonurlDict = $api_data["ydApi"]."?key=".$api_data["ydKey"]."&lang=".$langId."&format=html&text=".urlencode($aWord);
$jsonDict = json_decode(remote_get_contents($jsonurlDict), true);
$dataDict = [];
$nDict = 0;
foreach($jsonDict["def"] as $def){
    foreach($def["tr"] as $text){
        //$text["text"] = str_replace("'", "`", $text["text"]); // to screen special character "'"
        //$text["text"] = str_replace(",", "", $text["text"]);
        $dataDict[$nDict] = $text["text"];
        $nDict++;
        foreach($text["syn"] as $syn){
            //$syn["text"] = str_replace("'", "`", $syn["text"]); // to screen special character "'"
            $dataDict[$nDict] = $syn["text"];
            $nDict++;
        }
    }
}


//$dictArray = array_filter(array_unique(array_merge($yTDict, $gTDict, $dataDict)));
$dictArray = array_filter(array_unique(array_merge($yTDict, $dataDict)));
$dictStr = implode(", ", $dictArray);

//echo json_encode($dictStr);
echo $dictStr;
//echo "Hello from PHP!";

?>