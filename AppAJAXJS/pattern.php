<?php
function crawler($link)
{
$dom = new \DOMDocument('1.0', 'UTF-8');

	$internalErrors = libxml_use_internal_errors(true);

	$dom->loadHTMLFile($link);

	libxml_use_internal_errors($internalErrors);

	$dom->preserveWhiteSpace = false;


	if (preg_match("/metrolyrics.com/i", $link))  {
		$mango_div = $dom->getElementById('lyrics-body-text');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/diliriklagu.com/i", $link))  {
		$mango_div = $dom->getElementById('lyrics-body-text');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/lyricsin.com/i", $link))  {
		$lData = "";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='post-content']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}
		return $href;
	}

	else if (preg_match("/liriklaguindonesia.net/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class=' clear']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}return $href;
	} 

	else if (preg_match("/lyriczz.com/i", $link))  {
		return ""; /* include('simple_html_dom.php');
		$html = file_get_html($link);
		$displaybody = $html->find('div[class=lyriczz]', 0)->plaintext;
		return $displaybody; */
	} 

	else if (preg_match("/letssingit.com/i", $link))  {
		$mango_div = $dom->getElementById('lyrics');
		if(!$mango_div)
		{
            return "";
		}
		return $mango_div->C14N();
	} 

	else if (preg_match("/lyrics.wikia.com/i", $link))  {
		return ""; /* include('simple_html_dom.php');
		$html = file_get_html($link);
		$displaybody = $html->find('div[class=lyricbox]', 0);
		return $displaybody; */
	} 

	else if (preg_match("/opmfans.com/i", $link))  {
		$mango_div = $dom->getElementById('post-body-4871323253080413214');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/lyricsfreak.com/i", $link))  {
		$mango_div = $dom->getElementById('content_h');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/genius.com/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='song_body-lyrics']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("lyrics");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
			}
			//return "<br>";
		}return $href;
	} 

	else if (preg_match("/stlyrics.com/i", $link))  {
		return ""; /* include('simple_html_dom.php');
		$html = file_get_html($link);
		$displaybody = $html->find('div[id=ltf]', 0);
		return $displaybody; */
	} 
	else if (preg_match("/lyricstranslate.com/i", $link))  {
		return ""; /* include('simple_html_dom.php');
		$html = file_get_html($link);
		$displaybody = $html->find('div[id=page]', 0);
		return $displaybody; */
	} 

	else if (preg_match("/flashlyrics.com/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='main-panel-content']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("span");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}return $href;
	} 

	else if (preg_match("/www.songlyrics.com/i", $link))  {
		return ""; /* include('simple_html_dom.php');
		$html = file_get_html($link);
		$displaybody = $html->find('p[id=songLyricsDiv]', 0)->plaintext;
		return $displaybody; */
	} 

	else if (preg_match("/allthelyrics.com/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='content-text']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				
				//return "<br>";
			}
		}return $href;
	}


	else if (preg_match("/videokeman.com/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='art-postcontent']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";

			}
		}return $href;
	}


	else if (preg_match("/opmtunes.com/i", $link))  {
		$lData ="";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//pre");
		foreach ($nodes as $i => $node) {
			$lData .= $node->nodeValue;
		}
		return $lData;
	} 

	else if (preg_match("/smule.com/i", $link))  {
		$lData = "";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='lyrics content']");
		foreach ($nodes as $i => $node) {
			
			$lData .= $node->nodeValue;
		}
		return $lData;
	}

	else if (preg_match("/songtexte.com/i", $link))  {
		$mango_div = $dom->getElementById('lyrics');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/azlyrics.com/i", $link))  {
                $lData = "";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='col-xs-12 col-lg-8 text-center']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("div");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .=  $href;
			}
		}
		return $lData;
	} 

	else if (preg_match("/musixmatch.com/i", $link))  {
		return ""; /* include('simple_html_dom.php');
		$html = file_get_html($link);
		$displaybody = $html->find('div[class=mxm-lyrics]', 1)->plaintext;
		return $displaybody; */
	}

	else if (preg_match("/lyricsmode.com/i", $link))  {
		$mango_div = $dom->getElementById('lyrics_text');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	} 

	else if (preg_match("/elyrics.net/i", $link))  {
		$mango_div = $dom->getElementById('inlyr');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/lirik.kapanlagi/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='li-content li-loop']");
		foreach ($nodes as $i => $node) {
			$lData .=  $node->nodeValue;
			//return "<br>";
		}
		return $lData;
	} 

	else if (preg_match("/nurseryrhymes.org/i", $link))  {
		$mango_div = $dom->getElementById('nursery-rhymes-lyrics');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	} 

	else if (preg_match("/letras.mus./i", $link))  {
		if (preg_match("/traducao.html/i", $link))  {
			return ""; /* include('simple_html_dom.php');
			$html = file_get_html($link);
			$displaybody = $html->find('div[class=cnt-trad_l]', 0);
			return $displaybody; */
		}
		else {
			return ""; /* include('simple_html_dom.php');
			$html = file_get_html($link);
			$displaybody = $html->find('div[class=cnt-letra p402_premium]', 0);
			return $displaybody; */
		}
	}

	else if (preg_match("/mojim.com/i", $link))  {
		$mango_div = $dom->getElementById('fsZx3');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	} 

	else if (preg_match("/azlyrics.biz/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='entry-content']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}return $lData;
	} 

	else if (preg_match("/drlrcs.com/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='lyrics']");
		foreach ($nodes as $i => $node) {
			$lData .= $node->nodeValue;
			
			//return "<br>";
		}
		return $lData;
	}


	// --------------------OTHER SITES----------------------------------------

	else if (preg_match("/sing365.com/i", $link))  {
		return ""; /* include('simple_html_dom.php');
		$html = file_get_html($link);
		$displaybody = $html->find('div[class=container]', 1)->plaintext;
		return $displaybody; */
	}

	else if (preg_match("/5music.net/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='lyrics']");
		foreach ($nodes as $i => $node) {
			 $lData .= $node->nodeValue;
			//return "<br>";
		}return $lData;
	}

	else if (preg_match("/5sing.kugou.com/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData ="";
		$nodes= $xpath->query("/html/body//div[@class='lrc_info_clip inspiration-tab-content']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("div");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}return $lData;
	}

	else if (preg_match("/bengalilyrics24.blogspot.com/i", $link))  {
		$mango_div = $dom->getElementById('lv');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/bestrancelyrics.wordpress.com/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='entry-content']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}return $lData;
	}

	else if (preg_match("/bollymeaning.com/i", $link))  {
		$mango_div = $dom->getElementById('post-body-3488072223642979286');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/bollywoodhungama.com/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='song-lyrics-content entry-content post-content']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}return $lData;
	}

	else if (preg_match("/bubblegumdancer.com/i", $link))  {
		$mango_div = $dom->getElementById('lyric');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/coveralia.com/i", $link))  {
		return ""; /* include('simple_html_dom.php');
		$html = file_get_html($link);
		$displaybody = $html->find('div[id=HOTWordsTxt]', 0)->plaintext;
		return $displaybody; */
	}

	else if (preg_match("/damnlyrics.com/i", $link))  {
		$mango_div = $dom->getElementById('lyrics');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/geetabitan.com/i", $link))  {
		$mango_div = $dom->getElementById('view1');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/geetmanjusha.com/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='entity-description']");
		foreach ($nodes as $i => $node) {
			$lData .= $node->nodeValue;
			//return "<br>";
		}return $lData;
	}

	else if (preg_match("/giitaayan.com/i", $link))  {
		return ""; /* include('simple_html_dom.php');
		$html = file_get_html($link);
		$displaybody = $html->find('div[id=ConvertedText]', 0)->plaintext;
		return $displaybody; */
	}

	else if (preg_match("/www.golyr.de/i", $link))  {
		$mango_div = $dom->getElementById('lyrics');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/gugalyrics.com/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='content container-block lyrics-block']");
	//var_dump($nodes);
		foreach ($nodes as $i => $node) {
			$lData .= $node->nodeValue;
			//return "<br>";
		}return $lData;
	}

	else if (preg_match("/gasazip.com/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='col-md-8']");
		foreach ($nodes as $i => $node) {
			$lData .= $node->nodeValue;
			//return "<br>";
		}return $lData;
	}

	else if (preg_match("/gypsylyrics.net/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='entry-content']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}return $lData;
	}

	else if (preg_match("/greeksongs-greekmusic.com/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//section[@class='entry']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}return $lData;
	}

	else if (preg_match("/hindigeetmala.net/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='song']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("pre");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}return $lData;
	}

	else if (preg_match("/hindilyrics.net/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='ten columns']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("pre");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}return $lData;
	}

	else if (preg_match("/hinditracks.in/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='thecontent']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}return $lData;
	}

	else if (preg_match("/hindiraag.com/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='entry-content']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}return $lData;
	}

	else if (preg_match("/houseofbhangra.com/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='def-block']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}return $lData;
	}

	else if (preg_match("/indicine.com/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='lyrics']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}
		return $lData;
	}

	else if (preg_match("/jah-lyrics.com/i", $link))  {
		return ""; /* include('simple_html_dom.php');
		$html = file_get_html($link);
		$displaybody = $html->find('div[id=content]', 0)->plaintext;
		return $displaybody; */
	}

	else if (preg_match("/karaoketexty.cz/i", $link))  {
		return ""; /* include('simple_html_dom.php');
		$html = file_get_html($link);
		$displaybody = $html->find('div[class=one_lyrics]', 1);
		return $displaybody; */
	}

	else if (preg_match("/lololyrics.com/i", $link))  {
		return ""; /* include('simple_html_dom.php');
		$html = file_get_html($link);
		$displaybody = $html->find('div[id=lyrics_txt]', 0)->plaintext;
		return $displaybody; */
	}

	else if (preg_match("/lyricmusicarabic.blogspot.com/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//span[@class='Apple-style-span']");
		foreach ($nodes as $i => $node) {
			$lData .= $node->nodeValue;
			//return "<br>";

		}
		return $lData;
	}

	else if (preg_match("/lyricsmaya.com/i", $link))  {
		$xpath = new \DOMXpath($dom);
		$lData = "";
		$nodes= $xpath->query("/html/body//div[@class='entry-content']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}return $lData;
	}

	else if (preg_match("/lyrics.pk/i", $link))  {
		$lData = "";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='td-post-content']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}
		return $lData;
	}

	else if (preg_match("/www.lyrics.com/i", $link))  {
		$mango_div = $dom->getElementById('lyric-body-text');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/lyricsing.com/i", $link))  {
		$lData = "";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='col-md-12 lyrics_content']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}
		return $lData;
	}

	else if (preg_match("/lyricsbell.com/i", $link))  {
		$lData = "";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='lyrics-col']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				
				//return "<br>";
			}
		}
		return $lData;
	}

	else if (preg_match("/lyricsbogie.com/i", $link))  {
		$mango_div = $dom->getElementById('lyricsDiv');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/lyricsdelhi.com/i", $link))  {
		$mango_div = $dom->getElementById('post-body-5202677106664092474');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/lyricsintelugu.in/i", $link))  {
		$mango_div = $dom->getElementById('post-body-949258440186183601');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/lyricsio.com/i", $link))  {
		$lData = "";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='alert-box mb20 italic']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				
				//return "<br>";
			}
		}
		return $lData;
	}

	else if (preg_match("/lyricsmint.com/i", $link))  {
		$mango_div = $dom->getElementById('lyric');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/lyricspunjabi.in/i", $link))  {
		$lData = "";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='entry-content']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				
				//return "<br>";
			}
		}
		return $lData;
	}

	else if (preg_match("/lyricsdesk.blogspot.com/i", $link))  {
		$lData ="";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='post-body entry-content']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("div");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				
				//return "<br>";
			}
		}
		return $lData;
	}

	else if (preg_match("/lyrster.com/i", $link))  {
		return ""; /* include('simple_html_dom.php');
		$html = file_get_html($link);
		$displaybody = $html->find('div[id=lyrics]', 0)->plaintext;
		return $displaybody; */
	}

	else if (preg_match("/millionsonglyrics.blogspot.com/i", $link))  {
		$mango_div = $dom->getElementById('post-body-1692895863508766110');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/mldb.org/i", $link))  {
		$lData ="";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//p[@class='songtext']");
		foreach ($nodes as $i => $node) {
			$lData .= $node->nodeValue;
 			//return "<br>";
		}
		return $lData;
	}

	else if (preg_match("/musique.ados.fr/i", $link))  {
		$lData ="";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='contenu']");
	//var_dump($nodes);
		foreach ($nodes as $i => $node) {
			$lData .= $node->nodeValue;
 			//return "<br>";
		}
		return $lData;
 	}

	else if (preg_match("/www.musica.com/i", $link))  {
		$lData = "";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//table[@class='ijk']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("font");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				
				//return "<br>";
			}
		}
		return $lData;
	}

	else if (preg_match("/mamalisa.com/i", $link))  {
		$mango_div = $dom->getElementById('lyrics_original_language_lg');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/nitrolyrics.com/i", $link))  {
		$lData ="";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='lyricContent']");
		foreach ($nodes as $i => $node) {
			$lData .= $node->nodeValue;
			//return "<br>";
		}
		return $lData;
	}

	else if (preg_match("/oldielyrics.com/i", $link))  {
		$lData = "";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='lyrics']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				
			//return "<br>";
			}
		}
		return $lData;
	}

	else if (preg_match("/paadalvarigal.com/i", $link))  {
		$lData = "";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='entry clearfix']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				
				//return "<br>";
			}
		}
		return $lData;
	}

	else if (preg_match("/phonelyrics.com/i", $link))  {
		$mango_div = $dom->getElementById('prnt');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/pzlyrics.com/i", $link))  {
		$lData = "";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='entry-content clearfix']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				
				//return "<br>";
			}
		}
		return $lData;
	}

	else if (preg_match("/patdladyparadox.bandcamp.com/i", $link))  {
		$lData ="";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='tralbumData lyricsText']");
		foreach ($nodes as $i => $node) {
			$lData .= $node->nodeValue;
			//return "<br>";
		}
		return $lData;

	}

	else if (preg_match("/singchinesesongs.com/i", $link))  {
		return ""; /* include('simple_html_dom.php');
		$html = file_get_html($link);
		$displaybody = $html->find('div[id=showdictionarycontent]', 0);
		return $displaybody; */
	}

	else if (preg_match("/singklyrics.com/i", $link))  {
		$mango_div = $dom->getElementById('postTabs_0_3292');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/smarttalkies.com/i", $link))  {
		$lData ="";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='lyrlist']");
		foreach ($nodes as $i => $node) {
			$lData .= $node->nodeValue;
			//return "<br>";
		}
		return $lData;
	}

	else if (preg_match("/songsuno.com/i", $link))  {
		$lData ="";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//p[@class='text-align minheight500 lyricspre fontsizefourteen margin-top20']");
		foreach ($nodes as $i => $node) {
			$lData .= $node->nodeValue;
			//return "<br>";
		}
		return $lData;
	}

	else if (preg_match("/sweetslyrics.com/i", $link))  {
		$lData ="";
		$xpath = new \DOMXpath($dom);

		$nodes= $xpath->query("/html/body//div[@class='lyric_full_text']");
		foreach ($nodes as $i => $node) {
			$lData .= $node->nodeValue;
			//return "<br>";
		}
		 return $lData;
	}

	else if (preg_match("/silenthill.wikia.com/i", $link))  {
		$lData = "";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='poem']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				
				//return "<br>";
			}
		}
		return $lData;
	}

	else if (preg_match("/swiftlyrics.com/i", $link))  {
		$lData = "";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='left_box_lyrics']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				
				//return "<br>";
			}
		}
		return $lData;
	}

	else if (preg_match("/tamilpaa.com/i", $link))  {
		$lData ="";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='info-box white-bg']");
		foreach ($nodes as $i => $node) {
			$lData .= $node->nodeValue;
			//return "<br>";
		}
		return $lData;
	}

	else if (preg_match("/telugulyrics.co.in/i", $link))  {
		$mango_div = $dom->getElementById('lyric');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/telugusongslyrics.in/i", $link))  {
		$lData = "";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='box-inner-block']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
			
				//return "<br>";
			}
		}
		return $lData;
	}

	else if (preg_match("/trancelyrics.wordpress.com/i", $link))  {
		$lData = "";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='entry']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}
		return $lData;
	}

	else if (preg_match("/www.tsonglyrics.com/i", $link))  {
		$mango_div = $dom->getElementById('post-body-2404759854755546248');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/testi-canzoni.com/i", $link))  {
		
		$lData = "";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//div[@class='col-md-8']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("span");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				
				//return "<br>";
			}
		}
		return $lData;
	}

	else if (preg_match("/testiecanzoni.com/i", $link))  {
		$lData = "";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//td[@class='testo']");
		foreach ($nodes as $node) {
			$arr = $node->getElementsByTagName("p");
			foreach($arr as $item) {
				$href =  $item->nodeValue;
				$lData .= $href;
				//return "<br>";
			}
		}
		return $lData;
	}

	else if (preg_match("/www.unp.me/i", $link))  {
		$mango_div = $dom->getElementById('post_message_3346457');
		if(!$mango_div)
		{
			return "";
		}
		return $mango_div->C14N();
	}

	else if (preg_match("/www.animelyrics.com/i", $link))  {
		$lData ="";
		$xpath = new \DOMXpath($dom);
		$nodes= $xpath->query("/html/body//span[@class='lyrics']");
		foreach ($nodes as $i => $node) {
			$lData .= $node->nodeValue;
 
			//return "<br>";
			}
			return $lData;
}

	else {
		return "";
	}
}
?>
<?php 

$link = "http://www.animelyrics.com/jpop/amuro/dreamingiwas.htm";
$data = crawler($link);
echo $data;
?>




