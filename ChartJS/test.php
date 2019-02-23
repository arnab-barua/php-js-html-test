<?php

$hostname= 'cp-45.webhostbox.net';
$username= 'maxhor8n_user';
$password= 'user123';
$dbname= 'maxhor8n_test';

$connMax = mysqli_connect($hostname, $username, $password, $dbname) ;
$connVlink = mysqli_connect("cp-22.webhostbox.net", "vlinktd8_user", "user123", "vlinktd8_test") ;
$connCmc = mysqli_connect("cp-50.webhostbox.net", "chittzjk_user", "user123", "chittzjk_test") ;
        
if (!$connMax) {
    die("Connection failed for Max : " . mysqli_connect_error());
}
if (!$connVlink) {
    die("Connection failed for Vlink : " . mysqli_connect_error());
}
if (!$connCmc) {
    die("Connection failed for Cmc : " . mysqli_connect_error());
}

$sql = "SELECT id, name FROM test";
$result = mysqli_query($connMax, $sql);
echo "Max Table data : <br>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"].  "<br>";
		$id = $row["id"];
		$name = $row["name"];
		$sql = "INSERT INTO test (t_id, name) VALUES ('".$id."', '".$name."')";
		if ($connVlink->query($sql) === TRUE) {
			echo "";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
    }
} else {
    echo "0 results";
}


$sql = "SELECT id, name FROM test";
$result = mysqli_query($connCmc, $sql);
echo "CMC Table data : <br>";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"].  "<br>";
		$id = $row["id"];
		$name = $row["name"];
		$sql = "INSERT INTO test (t_id, name) VALUES ('".$id."', '".$name."')";
		if ($connVlink->query($sql) === TRUE) {
			echo "";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
    }
} else {
    echo "0 results";
}


$sql = "SELECT * FROM test";
$result = mysqli_query($connVlink, $sql);
echo "<br>Combined Vlink Table data : <br>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]." - t_id: " . $row["t_id"]. " - Name: " . $row["name"].  "<br>";
    }
} else {
    echo "0 results";
}



?>