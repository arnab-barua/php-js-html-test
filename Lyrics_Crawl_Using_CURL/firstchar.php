<?php
echo substr("Hello world",10)."<br>";
echo substr("Hello world",1)."<br>";
echo substr("Hello world",3)."<br>";
echo substr("Hello world",7)."<br>";

echo substr("Hello world",-1)."<br>";
echo substr("Hello world",-10)."<br>";
echo substr("Hello world",-8)."<br>";
echo substr("Hello world",-4)."<br>";


echo ucfirst("hello world!\nsome");
$t= "   hello world!\nsome\nhafjfa";
//echo $t[0];

while($t[0]=='\n'||$t[0]==' ')
{
	$t = substr($t,1);
}

//echo $t;

$t = strtoupper($t[0]).strtolower(substr($t,1));
echo $t;
$t = toCapitalCase($t);
echo $t;
function toCapitalCase($t)
{
	$pattern = "/\n/i";
	while(preg_match($pattern, $t, $matches)){
		$i = $matches[0]+1;
		$t = strtoupper($t[$i]);
    }
	return $t;
}
?>