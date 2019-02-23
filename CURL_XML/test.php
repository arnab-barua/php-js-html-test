<?php

	
	$url = "https://comc.gov.bd/index.php/wp-json/wp/v2/posts/";
	$data = array(

		"date"=>"2018-03-05T06:22:11",
		"date_gmt"=>"2018-03-05T06:22:11",
		"slug"=>"noc-of-begum",
		"status"=>"publish",
		"type"=>"post",
		"link"=>"https://comc.gov.bd/index.php/2018/03/01/noc-of-begum/",
		"title"=> " of Dr.khaled Mahmud Begum",
		"content"=>"<p><a href=\"http:\/\/comc.gov.bd\/wp-content\/uploads\/2018\/03\/NOC-Begum.pdf\">NOC of  Begum<\/a><\/p>\n",
		"author"=>3,
		"password"=>"",
		"featured_media"=>0,
		"comment_status"=>"open",
		"ping_status"=>"open",
		"sticky"=>false,
		"template"=>"",
		"format"=>"standard",
		"meta"=>[],
		"categories"=>[2,1],
		"tags"=>[]
	);                                                                    
	$data_string = json_encode($data);                                                                                   

	$ch = curl_init($url);                                                                      
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
	'Content-Type: application/json',                                                                                
	'Content-Length: ' . strlen($data_string))                                                                       
	);                                                                                                                   

	$result = curl_exec($ch);
var_dump($result);

?>