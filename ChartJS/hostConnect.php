
<?php

$hostname= 'cp-45.webhostbox.net';
$username= 'maxhor8n_user';
$password= 'user123';
$dbname= 'maxhor8n_test';

$conn = mysqli_connect($hostname, $username, $password, $dbname) ;
       
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>