<?php

$doc = new \DOMDocument('1.0', 'UTF-8');

$internalErrors = libxml_use_internal_errors(true);

$doc->loadHTMLFile("https://diliriklagu.com/shape-of-you-ed-sheeran.aspx");


libxml_use_internal_errors($internalErrors);

$xpath = new \DOMXpath($doc);
$mango_div = $doc->getElementById('lyrics-body-text');

if(!$mango_div)
{
    die("Element not found");
}

//echo "element found";

echo $mango_div->C14N();

?>