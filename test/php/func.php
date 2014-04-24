<?php

include ($_SERVER['DOCUMENT_ROOT'] . "/php/vars.php");

function makeArrayOfWords(){
    // Get data from html form textrArea field, remove all special characters
    // and make an array ($words), convert all words to lowercase 
    $textArea = mysqli_real_escape_string($con, $_POST['textArea']);
    $words = preg_split('/\P{L}+/u', $textArea);
    $words = array_map('strtolower', $words);
    
    // Delete all dublicate words in the array and sort in descending order
    $words = array_count_values($words);
    arsort($words);
}

?>
