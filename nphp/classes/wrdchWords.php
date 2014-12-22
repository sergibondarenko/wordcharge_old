<?php

class wrdchWords
{
    public function splitintowords($text,$numWords){
        // Get data from html form textrArea field, remove all special characters
        // and make an array ($words), convert all words to lowercase 
        //$words = preg_split('/\P{L}+/u', $text, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
        $dirtyWords = explode(" ", $text);
        $words = array_filter($dirtyWords, "return_only_words");
        
        if(isset($numWords) && $numWords < array_count_values($words)){
          $words = array_slice($words, 0, $numWords);
        }
        
        //Delete all words which len==1
        foreach ($words as $key=>$word) 
        {
          if (strlen($words[$key]) < 2){
            unset($words[$key]);
          }
        }
        
        $words = array_map('strtolower', $words);
        // Delete all dublicate words in the array and sort in descending order
        $words = array_count_values($words);
        arsort($words);
        //unset($words[4]); // pop last empty element
        //$words = array_filter($words,function($a){return $a != '';});
        /*$count = 0;
        foreach($words as $key => $value){
          if($key == 0){
            unset($words[$count]);
          }
          $count += 1;
        }*/
        //$words = array_filter($words, '_remove_empty_internal');
        //$words = array_diff( $words, array( '' ) );
        
        $newwords = array();
        $newwords = array_filter($words, 'strlen');

        //print_r($words);
        
        return $newwords;
    }
    
    public function translate(){
        
    }
    
    public function dictionary(){
        
    }
    
}

class wrdchCustomDict extends wrdchWords
{
    
}

class wrdchBooksDict extends wrdchWords
{
    
}

class wrdchNewsDict extends wrdchWords
{
    
}

class wrdchSQLManager 
{
    
}


?>