<?php 
function convertData($t)
{
//echo "----------------------------";
//$t = converter2($t);
//$t = converter($t);
return $t;
}
function converter($t)
{
//$p= 'Hello world!';
$t= preg_replace("/<br>/u","\n",$t);
$t= preg_replace("/<\/br>+/u","\n",$t);
$t= preg_replace("/<br \/>+/u","\n",$t);
$t= preg_replace("/<p>/u","\n",$t);
$t= preg_replace("/<\/p>/u","\n",$t);
$t= preg_replace("/<[\\\\!a-zA-Z0-9#;:.&%?=()+,\/' \"_\-]*>/u","",$t);

$t=strtolower($t);
$t= preg_replace("/ i /u"," I ",$t);
$t= preg_replace("/ i\n/u"," I\n",$t);
$t= preg_replace("/ i'/u"," I'",$t);

$t= preg_replace("/[,.;?!(){}–\[\]\/\-]/u"," ",$t);
$t= preg_replace("/…/u"," ",$t);
$t= preg_replace("/[|“”：\"*><\^=:_@#$%~\+\t]/igm","",$t);

$t= preg_replace("/\n\t+/u","\n",$t);
$t= preg_replace("/\n+/u","\n",$t);
$t= preg_replace("/\n +/u","\n",$t);
$t= preg_replace("/\t+/u","\n",$t);
$t= preg_replace("/ +\n+/u","\n",$t);
$t= preg_replace("/ +/u"," ",$t);

/////////....need some conversion....////

while($t[0]=='\n'||$t[0]==' ')
{
	$t = substr($t,1);
}


$t = strtoupper($t[0]).strtolower(substr($t,1));
$t= strtoupper($t);
$t= preg_replace("/ i /u"," I ",$t);
$t= preg_replace("/ i\n/u"," I\n",$t);
$t= preg_replace("/ i'/u"," I'",$t);

return $t;
}
//echo $t;
////converter2
function converter2($t)
{
$t= preg_replace("/var[!a-zA-Z0-9 _]*=[!a-zA-Z0-9#:.&%?=()+,\/' \"_\-]*;/u","",$t);
$t= preg_replace("/\$\(document\).ready/u","",$t);
$t= preg_replace("/\( *function *\(\)/u","",$t);
return $t;
}
?>
