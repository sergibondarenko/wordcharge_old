<?php
//get the q parameter from URL
$q=$_GET["q"];
$myLang=$_GET["myLang"];
$foreignLang = $q;

//find out which feed was selected
if($q=="en") {
  $xml=("http://news.google.com/news?ned=us&topic=h&output=rss");
} elseif($q=="it") {
  $xml=("http://news.google.com/news?ned=it&topic=h&output=rss");
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

$news_link_transl = "../test.php";
//get and output "<item>" elements
$x=$xmlDoc->getElementsByTagName('item');
for ($i=0; $i<=7; $i++) {
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
  echo ("<form action='../getnewsdict.php' method='post' target='_blank'>".
        "<input type='url' name='myUrl' value='$item_link'>".
        "<input type='text' name='myLang' value='$foreignLang-$myLang'>".
        "<input type='submit' name='myDict' value='Make Dictionary'>".
        "</form>");
  echo ("<br>");
  echo ($item_desc . "</p>");
}
?>
