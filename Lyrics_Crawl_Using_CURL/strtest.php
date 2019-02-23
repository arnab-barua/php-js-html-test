<?php

$t="arnab the toss<\/p>aaaa";
$t = convertData($t);
echo $t;

?>
<?php
	function convertData($t)
	{
		//$t = converter2($t);
		$t = converter($t);
		return $t;
	}
	function converter($t)
	{
		$t= preg_replace("/<br>/u","\n",$t);
		$t= preg_replace("/<\\\\\/br>+/u","\n",$t);
		$t= preg_replace("/<br \\\\\/>+/u","\n",$t);
		$t= preg_replace("/<p>/u","\n",$t);
		$t= preg_replace("/<\\\\\/p>/u","\n",$t);
		$t=strtolower($t);
		//$t= preg_replace("/\/","",$t);
		$t= preg_replace("/<[\\\\!a-zA-Z0-9#;:.&%?=()+,\/' \"_\-]*>/u","",$t);


		//echo $t;
		$t= preg_replace("/ i /u"," I ",$t);
		$t= preg_replace("/ i+[\r\n]/u"," I\n",$t);
		$t= preg_replace("/ i'/u"," I'",$t);

		$t= preg_replace("/[,.;?!(){}–\[\]\/\-]/u"," ",$t);
		$t= preg_replace("/…/u"," ",$t);
		$t= preg_replace("/[|“”：\"*><\^=:_@#$%~\+\t]/u","",$t);
		$t= preg_replace("/ +/u"," ",$t);

		$t= preg_replace("/\n\t+/u","\n",$t);
		$t= preg_replace("/[\r\n]+/u","\n",$t);
		$t= preg_replace("/\n /u","\n",$t);
		$t= preg_replace("/\t+/u","\n",$t);
		$t= preg_replace("/ +\n+/u","\n",$t);
		$t= preg_replace("/ +/u"," ",$t);
		$t= preg_replace("/[\r\n]+/u","\n",$t);
		$t = shortiFy($t);
		/////////....need some conversion....////

		while($t[0]=="\n"||$t[0]==" ")
		{
		$t = substr($t,1);
		}
		while($t[strlen($t)-1]=="\n"||$t[strlen($t)-1]==" ")
		{
		$t = substr($t,0,strlen($t)-1);
		}
		$t= ucfirst($t);
		$t = toCapitalCase($t);
		$t= preg_replace("/ i /u"," I ",$t);
		$t= preg_replace("/ i+[\r\n]/u"," I\n",$t);
		$t= preg_replace("/ i'/u"," I'",$t);

		return $t;
	}
	function toCapitalCase($t)
	{
		$i = 0;
		while($pos = strpos($t,"\n",$i))
		{
		$t = substr($t,0,$pos+1).strtoupper($t[$pos+1]).substr($t,$pos+2);
		$i = $pos+1;
		}	
		return $t;
	}
	function shortiFy($t)
	{
		$len= strlen($t);
		$count = 0;
		for ($i=0; $i<$len; $i++)
		{
			if ($t[$i] == "\n")
				$count=0;
			else if ($t[$i]== " ")
				$count++;
			else{
			}

			if ($count == 10)
			{
				$t = substr($t,0,$i)."\n".substr($t,$i+1);
				$count=0;
				$i++;
			}
		}
	return $t;
	}
?>