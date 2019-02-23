<?php
// initialise the curl request
$request = curl_init('http://www.nicesoftware.com.bd');

// send a file
curl_setopt($request, CURLOPT_POST, true);
curl_setopt(
    $request,
    CURLOPT_POSTFIELDS,
    array(
      'file' => '@' . realpath('book.xml')
    ));

// output the response
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
echo curl_exec($request);

// close the session
curl_close($request);
?>