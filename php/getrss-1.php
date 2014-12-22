<?php
//get the q parameter from URL

$q=$_GET["q"];
$newsType=$_GET["newsT"];
$myLang=$_GET["myLang"];
$foreignLang = $q;

//for translation
$langArray = parse_ini_file("../languages/".$myLang.".ini");


switch ($q){
  case $q=="en":
    $xml=("http://news.google.com/news?ned=us&topic=$newsType&output=rss");
    break;
  case $q=="it":
    $xml=("http://news.google.com/news?ned=it&topic=$newsType&output=rss");
    break;
  case $q=="fr":
    $xml=("http://news.google.com/news?ned=fr&topic=$newsType&output=rss");
    break;
  case $q=="es":
    $xml=("http://news.google.com/news?ned=es&topic=$newsType&output=rss");
    break;
  case $q=="de":
    $xml=("http://news.google.com/news?ned=de&topic=$newsType&output=rss");
    break;
  case $q=="ru":
    $xml=("http://news.google.com/news?ned=ru&topic=$newsType&output=rss");
    break;
  default:
    $xml=("http://news.google.com/news?ned=us&topic=$newsType&output=rss");
    break;
}

$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

//get elements from "<channel>"
$channel=$xmlDoc->getElementsByTagName('channel')->item(0);
$channel_title = $channel->getElementsByTagName('title')
->item(0)->childNodes->item(0)->nodeValue;
$channel_link = $channel->getElementsByTagName('link')
->item(0)->childNodes->item(0)->nodeValue;
$channel_desc = $channel->getElementsByTagName('description')
->item(0)->childNodes->item(0)->nodeValue;

////output firs element from "<channel>"
//echo("<p><a href='" . $channel_link
//  . "'>" . $channel_title . "</a>");
//echo("<br>");
//echo($channel_desc . "</p>");

//$news_link_transl = "../test.php";
$makeDict = $langArray["textButtonMakeDict"];
$booksSelfWordsNum = $langArray["booksSelfWordsNum"];
//get and output "<item>" elements
$x=$xmlDoc->getElementsByTagName('item');
for ($i=0; $i<=10; $i++) {
  $item_title=$x->item($i)->getElementsByTagName('title')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_link=$x->item($i)->getElementsByTagName('link')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_desc=$x->item($i)->getElementsByTagName('description')
  ->item(0)->childNodes->item(0)->nodeValue;
  //echo ("<p><a href='" . $item_link
  //. "' target='_blank'>" . $item_title . "</a>");
  //echo ("<p><a href='" . $news_link_transl
  //. "?url="$item_link"' target='_blank'>" . "CLICK HERE to make dictionary from: "  . $item_title . "</a>");
  //. "?myUrl=$item_link"."' target='_blank'>" . "CLICK to make dictionary from: "  . $item_title . "</a>");

  echo ("<div class='container-fluid'>".
        "<div class='row'>".
        "<form action='../wdict.php?myLang=$myLang' method='post' target='_blank'>".
        "<input type='hidden' name='dictCaller' value='newsdict'>".
        "<input type='hidden' name='myUrl' value='$item_link'>".
        "<input type='hidden' name='langId' value='$foreignLang-$myLang'>".
        //"<input type='submit' name='myDict' value='$langArray[\"textButtonMakeDict\"]'>".
        "<input class='btn btn-default btn-xs' type='submit' name='myDict' value='$makeDict'>".
        "&nbsp;&nbsp;&nbsp;&nbsp;<label>$booksSelfWordsNum</label>".
        '&nbsp;<input type="text" name="numWords" maxlength="14" size="5" value=200>'.
        "</form>"."</div>"."</div>");
  echo ("<br>");
  echo ($item_desc . "</p>");
}
?>
