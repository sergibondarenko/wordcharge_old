<?php


function getTranslation($lang, $word, array $api_data){ //The function which translates word via Yandex and Google API
    
    // Google Translation API
    /*$jsonUrlGTr = $api_data["gtApi"]."?key=".$api_data["gtKey"]."&source=en&target=ru&q=".urlencode($word);
    $jsonTrG = json_decode(remote_get_contents($jsonUrlGTr), true);
    $gTranslation[] = $jsonTrG['data']['translations'][0]['translatedText'];*/
    
    // Yandex Translation API
    $jsonUrlYTr = $api_data["ytApi"]."?key=".$api_data["ytKey"]."&lang=".$lang."&format=html&text=".urlencode($word);
    $jsonYTr = json_decode(remote_get_contents($jsonUrlYTr), true);
    $yTranslation[] = $jsonYTr["text"][0];
    
    // Yandex Dictionary API
    $jsonUrlYDic = $api_data["ydApi"]."?key=".$api_data["ydKey"]."&lang=".$lang."&format=html&text=".urlencode($word);
    $jsonDict = json_decode(remote_get_contents($jsonUrlYDic), true);
    $dataDict = [];
    $nDict = 0;
    foreach($jsonDict["def"] as $def){
        foreach($def["tr"] as $text){
            $dataDict[$nDict] = $text["text"];
            $nDict++;
            foreach($text["syn"] as $syn){
                $dataDict[$nDict] = $syn["text"];
                $nDict++;
            }
        }
    }
    $yDictionary = $dataDict;
    
    //$mergedTrDict = array_unique(array_merge($gTranslation, $yTranslation, $yDictionary));
    $mergedTrDict = array_unique(array_merge($yTranslation, $yDictionary));
    $strDict = implode(", ", $mergedTrDict);
    return $strDict;
}

?>