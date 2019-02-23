<?php
	include('pattern.php');
	$songID = "";
	$songName = "my heart' will go";
	$album = "Titanic";
	$singer = "Celine Dion";
	$query = $singer." ".$album;
	$ch = curl_init(); 
	curl_setopt($ch,CURLOPT_URL,ltrim('https://www.googleapis.com/customsearch/v1?key=AIzaSyAWvy8tn60j0jPDmrOznl9-BLd6UnGZkj0&cx=005271956808096885842:cv6vnijexra'.'&q='.urlencode(" ").'&exactTerms='.urlencode($songName).'&orTerms='.urlencode($query).'&num=5&prettyPrint="true"&excludeTerms="lyrics+not"'));
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER , false );
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_HEADER, false); 
	$result=curl_exec($ch);
	curl_close($ch);
	//echo $result;
	$dt = json_decode($result);
	foreach($dt->items as $item)
	{
		echo $item->link."<br>";
		crawler($item->link);
	}
?>