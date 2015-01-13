<?php

include_once("/php/vars.php");

$dict_key = 'dict.1.1.20140101T191051Z.9249b28df324056a.b4ed43cbaf5d80c24126112974e44172c430157d';
$trnsl_key = 'trnsl.1.1.20140213T084832Z.2e599cd43e74002d.d935bc98da1909103ec212bc9ce71adeaac9de4a';
$google_trnsl_key = 'AIzaSyCN8b9KC_1mHrfYgkeFdMuKEPZM4z2j8eA';
$dict_api = 'https://dictionary.yandex.net/api/v1/dicservice.json/lookup';
$trnsl_api = 'https://translate.yandex.net/api/v1.5/tr.json/translate';
$google_trnsl_api = 'https://www.googleapis.com/language/translate/v2';
$langId = "en-ru";
$aWord = "hello";
$myText = $_POST["text"];

function remote_get_contents($url)
{
    if (function_exists('curl_get_contents') AND function_exists('curl_init'))
    {  
        return curl_get_contents($url);
    }
    else
    {  
        // A litte slower, but (usually) gets the job done
        return file_get_contents($url);
    }
}

function curl_get_contents($url)
{
    // Initiate the curl session
    $ch = curl_init();

    // Set the URL
    curl_setopt($ch, CURLOPT_URL, $url);

    // Removes the headers from the output
    curl_setopt($ch, CURLOPT_HEADER, 0);

    // Return the output instead of displaying it directly
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Execute the curl session
    $output = curl_exec($ch);

    // Close the curl session
    curl_close($ch);

    //$output = str_replace("'", " ", $output);
    // Return the output as a variable
    return $output;
}

$words = preg_split('/\P{L}+/u', $myText, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);




foreach($words as $word){
    // Get word translation from Yandex Translate API (JSON format)
    $jsonurlTr = $trnsl_api."?key=".$trnsl_key."&lang=".$langId."&format=html&text=".urlencode($word);
    $jsonTr = json_decode(remote_get_contents($jsonurlTr), true);
    // Get translation from Yandex Dict API (JSON format)
    $jsonurlDict = $dict_api."?key=".$dict_key."&lang=".$langId."&format=html&text=".urlencode($word);  
    $jsonDict = json_decode(remote_get_contents($jsonurlDict), true);
    //echo $word . "<br>";
    $wDictArray = array();
    
    //echo $jsonTr["text"][0] . ", ";
    array_push($wDictArray, $jsonTr["text"][0]);
    foreach($jsonDict["def"] as $def){
        foreach($def["tr"] as $text){
            //echo $text["text"] . ", ";
            array_push($wDictArray, $text["text"]);
            foreach($text["syn"] as $syn){
                //echo $syn["text"] . ", ";
                array_push($wDictArray, $syn["text"]);
            }
        }
    }
    
    //print_r($wDictArray);
    $arrLength = count($wDictArray);
    for($x = 0; $x < $arrLength; $x++){
        echo $wDictArray[$x];
        if($x != $arrLength-1){
            echo ", ";
        }
    }
    echo "<br>";
    
    }

?>