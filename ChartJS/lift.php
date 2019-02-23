<?php

$conn3 = mysqli_connect("127.0.0.1", "root", "", "lift") ;

if (!$conn3) {
    //echo"success!!!!!!";
die("Connection failed: for 1st server" . mysqli_connect_error());
}

echo "lift server : <br><br>";

		$sql = "SELECT id,client,Operator,keystrokes,totalspantime,modified,record_0,record_1,pass,starttime,endtime FROM stats_record";
		$result = mysqli_query($conn3, $sql);
		
		$c=0;
		if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      //  echo "id: " . $row["id"]. " - Name: " . $row["client"].  "<br>";
	  
	  	$client = $row["client"];
		$operator = $row["Operator"];
		$keystrokes = $row["keystrokes"];
		$totalspantime = $row["totalspantime"];
		$modified = $row["modified"];
		$record_0= $row["record_0"];
		$record_1= $row["record_1"];
		$pass= $row["pass"];
		$starttime= $row["starttime"];
		$endtime= $row["endtime"];
		
		echo "id: " . $row["id"]. " -- client: " . $row["client"]. " -- operator: " . $row["Operator"]. " -- keystrokes: " . $keystrokes. " -- totalspantime: " . $totalspantime. " -- modified: " . $modified. " -- record_0: " . $record_0. " -- record_1: " . $record_1. " pass: " . $pass. " -- starttime: " . $starttime. " -- endtime: " . $endtime.  "<br>";
		$c++;
    }
} else {
    echo "0 results";
}
echo $c;

