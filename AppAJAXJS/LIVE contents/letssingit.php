<?php
		echo "bla bla bla";
		$ch = curl_init(); 

		curl_setopt($ch,CURLOPT_URL,ltrim('https://www.google.com'));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false );
		curl_setopt($ch, CURLOPT_RANGE, '0-100');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HEADER, false); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		
		$result=curl_exec($ch);
		echo $result;
		curl_close($ch);
?>