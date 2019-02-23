<?php


// a new dom object
$dom = new DOMDocument('1.0', 'UTF-8'); 

$internalErrors = libxml_use_internal_errors(true);
 
// load the html into the object
$dom->loadHTMLFile("http://www.lyricsfreak.com/b/beverley+knight/shape+of+you_20017210.html"); 
 
 libxml_use_internal_errors($internalErrors);
// discard white space
$dom->preserveWhiteSpace = false;

//get element by id
$mango_div = $dom->getElementById('content_h');
 
if(!$mango_div)
{
    die("Element not found");
}
 
//echo "element found";

echo $mango_div->C14N();

//echo $dom->saveHTML($mango_div);


?>