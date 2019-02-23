<?php
	$ch = curl_init(); 
	curl_setopt($ch,CURLOPT_URL,ltrim('http://seamarinectg.com/staging/jamunadbreporttest/book.xml'));
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER , false );
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_HEADER, false); 
	$result=curl_exec($ch);
	curl_close($ch);
	$dt = simplexml_load_string($result);
	var_dump($dt);
?>