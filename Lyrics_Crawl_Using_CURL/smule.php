<?php 
$link = "https://www.smule.com/song/celine-dion-my-heart-will-go-on-duet-karaoke-lyrics/366321445_101397/arrangement";
$dom = new \DOMDocument('1.0', 'UTF-8');

	$internalErrors = libxml_use_internal_errors(true);

	$dom->loadHTMLFile($link);

	libxml_use_internal_errors($internalErrors);

	$dom->preserveWhiteSpace = false;


if (preg_match("/smule.com/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='lyrics content']");
		foreach ($nodes as $i => $node) {
			echo $node->nodeValue, PHP_EOL;
			echo "<br>";
		}
	}
	?>