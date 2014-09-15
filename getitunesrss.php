<?php
//get the q parameter from URL
$q=$_GET["q"];


//find out which feed was selected
if($q=="Just Added") {
  $xml=("https://itunes.apple.com/WebObjects/MZStore.woa/wpa/MRSS/justadded/sf=143441/limit=20/rss.xml");
  parseItunesRss($xml);
} elseif($q=="Top Albums") {
  $xml=("http://itunes.apple.com/us/rss/topalbums/limit=20/explicit=true/xml");
  parseItunesRss($xml);
} elseif($q=="New Releases") {
  $xml=("https://itunes.apple.com/WebObjects/MZStore.woa/wpa/MRSS/newreleases/sf=143441/limit=20/rss.xml");
  parseItunesRss($xml);
} elseif($q=="Top Songs") {
  $xml=("https://itunes.apple.com/us/rss/topsongs/limit=20/xml");
  parseItunesRss($xml);
} elseif($q=="Alternative") {
  $xml=("https://itunes.apple.com/us/rss/topalbums/limit=25/genre=20/xml");
  parseItunesRss($xml);
} elseif($q=="Blues") {
  $xml=("https://itunes.apple.com/us/rss/topalbums/limit=25/genre=2/xml");
  parseItunesRss($xml);
} elseif($q=="Classical") {
  $xml=("https://itunes.apple.com/us/rss/topalbums/limit=25/genre=5/xml");
  parseItunesRss($xml);
} elseif($q=="Country") {
  $xml=("https://itunes.apple.com/us/rss/topalbums/limit=25/genre=6/xml");
  parseItunesRss($xml);
} elseif($q=="Dance") {
  $xml=("https://itunes.apple.com/us/rss/topalbums/limit=25/genre=17/xml");
  parseItunesRss($xml);
} elseif($q=="Electronic") {
  $xml=("https://itunes.apple.com/us/rss/topalbums/limit=25/genre=7/xml");
  parseItunesRss($xml);
} elseif($q=="Hip-Hop") {
  $xml=("https://itunes.apple.com/us/rss/topalbums/limit=25/genre=18/xml");
  parseItunesRss($xml);
} elseif($q=="Jazz") {
  $xml=("https://itunes.apple.com/us/rss/topalbums/limit=25/genre=11/xml");
  parseItunesRss($xml);
} elseif($q=="R&B") {
  $xml=("https://itunes.apple.com/us/rss/topalbums/limit=25/genre=15/xml");
  parseItunesRss($xml);
} elseif($q=="Reggae") {
  $xml=("https://itunes.apple.com/us/rss/topalbums/limit=25/genre=24/xml");
  parseItunesRss($xml);
} elseif($q=="Rock") {
  $xml=("https://itunes.apple.com/us/rss/topalbums/limit=25/genre=21/xml");
  parseItunesRss($xml);
}

function parseItunesRss($xml){
	echo("<br>");

	//Create a new XML DOM object
	//Load the RSS document in the xml variable	
	$xmlDoc = new DOMDocument();
	$xmlDoc->load($xml);

  //Extract and output elements from the entry elements
	//print_r($xmlDoc);
	$x=$xmlDoc->getElementsByTagName('entry');
	for ($i=0; $i<=19; $i++) {
		$entry_title=$x->item($i)->getElementsByTagName('title')
		->item(0)->childNodes->item(0)->nodeValue;
		$entry_content=$x->item($i)->getElementsByTagName('content')
		->item(0)->childNodes->item(0)->nodeValue;

		echo("<p>" . $entry_title);
		echo("<br>");
    $entry_title_piratebay = str_replace(' ', '%20', $entry_title);
    $entry_title_piratebay = preg_replace("/\([^)]+\)/","",$entry_title_piratebay);
    $entry_title_piratebay = preg_replace('/[^A-Za-z0-9]/', '', $entry_title_piratebay);
    $entry_title_piratebay = str_replace( array( '20' ), ' ', $entry_title_piratebay);
    $pirate_bay="http://thepiratebay.se/search/".$entry_title_piratebay."/0/99/100";
    echo("<a target=\"_blank\" href=\"".$pirate_bay."\">Try Free Download</a>");

		echo("<br>");
		echo($entry_content . "</p>");
  
	}

}

function parseRss($xml){
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
	
	//output elements from "<channel>"
	echo("<p><a href='" . $channel_link
	  . "'>" . $channel_title . "</a>");
	echo("<br>");
	echo($channel_desc . "</p>");
	
	//get and output "<item>" elements
	$x=$xmlDoc->getElementsByTagName('item');
	for ($i=0; $i<=2; $i++) {
	  $item_title=$x->item($i)->getElementsByTagName('title')
	  ->item(0)->childNodes->item(0)->nodeValue;
	  $item_link=$x->item($i)->getElementsByTagName('link')
	  ->item(0)->childNodes->item(0)->nodeValue;
	  $item_desc=$x->item($i)->getElementsByTagName('description')
	  ->item(0)->childNodes->item(0)->nodeValue;
	  echo ("<p><a href='" . $item_link
	  . "'>" . $item_title . "</a>");
	  echo ("<br>");
	  echo ($item_desc . "</p>");
	}
}
?>
