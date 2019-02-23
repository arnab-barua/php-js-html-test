<?PHP
$doc = new \DOMDocument('1.0', 'UTF-8');

$internalErrors = libxml_use_internal_errors(true);

$doc->loadHTMLFile("https://liriklaguindonesia.net/ellie-goulding-i-know-you-care.htm");


libxml_use_internal_errors($internalErrors);

$xpath = new \DOMXpath($doc);

$nodes= $xpath->query("/html/body//div[@class=' clear']");


//var_dump($nodes);
foreach ($nodes as $node) {
    $arr = $node->getElementsByTagName("p");

    foreach($arr as $item) {
        $href =  $item->nodeValue;
        echo $href;
        echo "<br>";

    }
}
// var_dump($links);
?>