<?php

//include ($_SERVER['DOCUMENT_ROOT'] . "vars.php");
include ("vars.php");

// The functions to get json data from 
// Yandex dict and translate APIs
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

    // Return the output as a variable
    return $output;
}

// Get data from html form textrArea field, remove all special characters
// and make an array ($words), convert all words to lowercase 
// Delete all dublicate words in the array and sort in descending order
function split_text_into_words($text)
{
// Get data from html form textrArea field, remove all special characters
// and make an array ($words), convert all words to lowercase 
$words = preg_split('/\P{L}+/u', $text, 0, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
$words = array_map('strtolower', $words);

// Delete all dublicate words in the array and sort in descending order
$words = array_count_values($words);
arsort($words);

return $words;

}


// 3.=====
// Translate every word in the $onlyWords[] array
// Get word translation from Yandex Translate API
// Get translation from Yandex Dict API
// Merge Translate and Dict arrays into third array 
// and delete all dublicate values in the third array 
//Implode the merged third array into string of values separated by coma

function get_yandex_api_translation_dictionary($aWord, $langId, $trnsl_api, $trnsl_key, $dict_api, $dict_key)
{

// 1.For ru-* variants you must use urlencode('слово')
if($langId == "ru-en"){
  
  // Get word translation from Yandex Translate API
  $jsonurlTr = $trnsl_api."?key=".$trnsl_key."&lang=".$langId."&format=html&text=".urlencode($aWord);
  $jsonTr = json_decode(remote_get_contents($jsonurlTr), true);
  
  $dataTr = array();
  $nTr = 0;
  foreach($jsonTr["text"] as $keyTr=>$wordTr){
      $dataTr[$nTr] = $wordTr;
      $nTr++;
  }
  
  // Get translation from Yandex Dict API
  $jsonurlDict = $dict_api."?key=".$dict_key."&lang=".$langId."&format=html&text=".urlencode($aWord);
  $jsonDict = json_decode(remote_get_contents($jsonurlDict), true);
  // Parse Yandex Dict API JSON string
  $dataDict = array();
  $nDict = 0;
  foreach($jsonDict["def"] as $def){
      foreach($def["tr"] as $text){
          //$dataDict = array($text["text"]);
          $dataDict[$nDict] = $text["text"];
          $nDict++;
          foreach($text["syn"] as $syn){
              //$nDict++;
              $dataDict[$nDict] = $syn["text"];
              $nDict++;
          }
      }
  }
}

// 2.Other languages
// Get word translation from Yandex Translate API
$jsonurlTr = $trnsl_api."?key=".$trnsl_key."&lang=".$langId."&format=html&text=".$aWord;
$jsonTr = json_decode(remote_get_contents($jsonurlTr), true);

$dataTr = array();
$nTr = 0;
foreach($jsonTr["text"] as $keyTr=>$wordTr){
    $dataTr[$nTr] = $wordTr;
    $nTr++;
}

// Get translation from Yandex Dict API
$jsonurlDict = $dict_api."?key=".$dict_key."&lang=".$langId."&format=html&text=".$aWord;
$jsonDict = json_decode(remote_get_contents($jsonurlDict), true);
// Parse Yandex Dict API JSON string
$dataDict = array();
$nDict = 0;
foreach($jsonDict["def"] as $def){
    foreach($def["tr"] as $text){
        //$dataDict = array($text["text"]);
        $dataDict[$nDict] = $text["text"];
        $nDict++;
        foreach($text["syn"] as $syn){
            //$nDict++;
            $dataDict[$nDict] = $syn["text"];
            $nDict++;
        }
    }
}

// Merge Translate and Dict arrays into third array 
// and delete all dublicate values in the third array 
$mergedTrDict = array_unique(array_merge($dataTr, $dataDict));

//Implode the merged third array into string of values separated by coma
$strDict = implode(", ", $mergedTrDict);

return $strDict;

}


?>
