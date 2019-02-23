<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chart";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

$sql = "SELECT * FROM `developer`";
$result = $conn->query($sql);

$data= array();

foreach ($result as $row){
	$data[]=$row;
}

$result->close();

//$mysqli->close();

print json_encode($data);

?>