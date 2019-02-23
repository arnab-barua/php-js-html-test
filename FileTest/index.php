<?php
	$dirName = "D:\\TextFiles";
	$fileName = "SampleFile_1.txt";
	if(!file_exists($dirName))
	{
		mkdir($dirName);
	}
	$filee = $dirName."\\".$fileName;
	$myfile = fopen($filee, "w") or die("Unable to open file!");
	$txt = "Mickey Mouse\r\n";
	fwrite($myfile, $txt);
	$txt = "Minnie Mouse\r\n";
	fwrite($myfile, $txt);
	fclose($myfile);
?>