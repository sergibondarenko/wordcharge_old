<?php

function mysql_db_connect($MysqlUser,$MysqlUPass,$MysqlDB,$UserNW)
{
// 2.=====
// Set MySQL connection and fill the database with new words
$con=mysqli_connect("localhost",$MysqlUser,$MysqlUPass,$MysqlDB);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sqlCreate = "CREATE TABLE IF NOT EXISTS $UserNW( ".
       "id INT(20) NOT NULL AUTO_INCREMENT, ".
       "lang VARCHAR(10) NOT NULL, ".
       "freq BIGINT(20) NOT NULL, ".
       "word VARCHAR(40) NOT NULL, ".
       "text VARCHAR(255) NOT NULL, ".
       "PRIMARY KEY ( id )) ".
       "ENGINE=InnoDB DEFAULT CHARSET=utf8";

if (!mysqli_query($con,$sqlCreate)) {
  die('Error after Create: ' . mysqli_error($con));
}
mysqli_free_result($sqlCreate);

// Mysql query to delete old data from the new words table
$sqlDelete = "TRUNCATE TABLE $UserNW";
if (!mysqli_query($con,$sqlDelete)) {
  die('Error after Delete: ' . mysqli_error($con));
}
mysqli_free_result($sqlDelete);

// change character set to utf8
if (!mysqli_set_charset($con, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($con));
}

$charset = mysqli_character_set_name($con);
return $con;
//printf ("Current Mysql charset - %s\n",$charset);
//echo "<br>";

}


// Get redirected url
// for Google News
function get_redirected_url($url)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Must be set to true so that PHP follows any "Location:" header
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$a = curl_exec($ch); // $a will contain all headers

$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); // This is what you need, it will return you the last effective URL
return $url;
}


//include ($_SERVER['DOCUMENT_ROOT'] . "vars.php");
//include ("test1/php/vars.php");

// Sanitize input
function sanitize_input($data)
{ 
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

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

// Compare with database of known words
// Return only new words
function look_for_the_new_words($words,$langId,$MysqlUser,$MysqlUPass,$MysqlDB,$UserKNW)
{
$conF=mysqli_connect("localhost",$MysqlUser,$MysqlUPass,$MysqlDB);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

/* change character set to utf8 */
if (!mysqli_set_charset($conF, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($conF));
}

// Create a table of known words if not exist
$sqlCreate = "CREATE TABLE IF NOT EXISTS $UserKNW( ".
                   //"id INT(11) NOT NULL AUTO_INCREMENT,".
                   "lang VARCHAR(10) NOT NULL, ".
                   "word VARCHAR(40) NOT NULL, ".
                   "text VARCHAR(255) NOT NULL, ".
                   "PRIMARY KEY ( word,text )) ".
                   "ENGINE=InnoDB DEFAULT CHARSET=utf8";
if (!mysqli_query($conF,$sqlCreate)) {
  die('function look_for_the_new_words(): Error after Create Table: ' . mysqli_error($conF));
}
mysqli_free_result($sqlCreate);


// Create an empty array for known words
$knownWords = array();
$n = 0;

// Query $UserKNW table of new words and look for all words in the table
$query = "SELECT word FROM $UserKNW WHERE lang='$langId'";
$sqlNewWord = mysqli_query($conF,$query);
if(!$sqlNewWord){
  die('functions.php - Error in function look_for_the_new_words(): ' . mysqli_error($conF));
}

// Fetch words from $UserKNW table and fill the 
// $knownWords associative array with these words
while ($row = mysqli_fetch_assoc($sqlNewWord)) {
  $knownWords[$n] = $row["word"];
  $n++;
}
// Free the variable
mysqli_free_result($sqlNewWord);

// Flip array, keys become values and values become keys
$knownWords = array_flip($knownWords);

// Take difference between keys of this two arrays
// Take only new words (words that are not in $UserKNW table)
$newWords = array_diff_key($words, $knownWords);

return $newWords;

mysqli_close($conF);
}

/*
function strip_html_js_tags($text)
{
$search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript 
                '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly 
                '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags 
                '@<![\s\S]*?–[ \t\n\r]*>@',         // Strip multi-line comments including CDATA 
                '/\s{2,}/',
                );
$text = preg_replace($search, "\n", html_entity_decode($text));
return $text;
}*/

// Get data from html form textrArea field, remove all special characters
// and make an array ($words), convert all words to lowercase 
// Delete all dublicate words in the array and sort in descending order
function split_text_into_words($text)
{
// Get data from html form textrArea field, remove all special characters
// and make an array ($words), convert all words to lowercase 
$words = preg_split('/\P{L}+/u', $text, 0, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
//$words = preg_split('/\P{L}+\'’/u', $text, 0, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
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
if($langId == "ru-en" || $langId == "uk-en"){
  
  // Get word translation from Yandex Translate API (JSON format)
  $jsonurlTr = $trnsl_api."?key=".$trnsl_key."&lang=".$langId."&format=html&text=".urlencode($aWord);
  
  // Get translation from Yandex Dict API (JSON format)
  $jsonurlDict = $dict_api."?key=".$dict_key."&lang=".$langId."&format=html&text=".urlencode($aWord);

} else {

  // 2.Other languages
  // Get word translation from Yandex Translate API
  $jsonurlTr = $trnsl_api."?key=".$trnsl_key."&lang=".$langId."&format=html&text=".$aWord;
  
  // Get translation from Yandex Dict API
  $jsonurlDict = $dict_api."?key=".$dict_key."&lang=".$langId."&format=html&text=".$aWord;

}

// Get word translation from Yandex Translate API
$jsonTr = json_decode(remote_get_contents($jsonurlTr), true);
// Parse Yandex Translate API JSON string
$dataTr = array();
$nTr = 0;
foreach($jsonTr["text"] as $keyTr=>$wordTr){
    $wordTr = str_replace("'", "`", $wordTr); // to screen special character "'"
    $dataTr[$nTr] = $wordTr;
    $nTr++;
}

// Get translation from Yandex Dict API
$jsonDict = json_decode(remote_get_contents($jsonurlDict), true);
// Parse Yandex Dict API JSON string
$dataDict = array();
$nDict = 0;
foreach($jsonDict["def"] as $def){
    foreach($def["tr"] as $text){
        //$dataDict = array($text["text"]);
        $text["text"] = str_replace("'", "`", $text["text"]); // to screen special character "'"
        $dataDict[$nDict] = $text["text"];
        $nDict++;
        foreach($text["syn"] as $syn){
            //$nDict++;
            $syn["text"] = str_replace("'", "`", $syn["text"]); // to screen special character "'"
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
