<?php
define ("CONSTANT", "settings.php");
require_once(CONSTANT);
$getJson = $_POST['getSongData'];
$song = json_decode($getJson);			// convert the string to a json object
//echo $song->Singer;
//echo $song->Album;
//$song = $jsonObject->getSongData;
include('simple_html_dom.php');
$songID = $song->SongID;
$songName = $song->SongName;
$singer = $song->Singer;
$album = $song->Album;

//echo $songId;

//$songID = "123";
//$songName = "My heart will go on";
//$album = "Titanic";
//$singer = "dion";

$songName2=songNameTrimmer($songName);
$album2 = albumNameTrimmer($songName2,$album);
$singer2 = albumNameTrimmer($songName2,$singer);
//$query = $singer." ".$album;

$query = $singer2." ".$album2;
$ch = curl_init(); 
//step2
curl_setopt($ch,CURLOPT_URL,ltrim('https://www.googleapis.com/customsearch/v1?key=AIzaSyCzpZ7S15F2cjWWaXFogP1YhROrEAoKKzQ&cx=005271956808096885842:cv6vnijexra'.'&q='.urlencode(" ").'&exactTerms='.urlencode($songName2).'&orTerms='.urlencode($query).'&num=5&prettyPrint="true"&excludeTerms="lyrics+not"'));
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER , false );
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_HEADER, false); 

$result=curl_exec($ch);
//echo $result;
curl_close($ch);

$dt = json_decode($result);

$arr = array();
$num = 0;
foreach($dt->items as $item)
{
    $title = $item->title;
    if (preg_match("/".$songName2."/i", $title))  
    {
        $num++;
        //$link = "https://www.musixmatch.com/lyrics/Baby-Chaos/Love-Your-Self-Abuse";
        $link = $item->link;
        $rawData = crawler($link);        
        //$rawData = "raw dat agoes here";
        if($rawData=="")
        {
            $formatedData = "";
            $lFlag="N";
        }
        else
        {
            $formatedData = convertData($rawData);
            //$formatedData = "formated lyric goes here";
            $lFlag="Y";
        }
        $arr[$num]= array (
            'ID' => $num,
            'Link'=> $link,
            'LyricFlag'=> $lFlag,
            'LyricRaw' => $rawData,
            'LyricFormatted' => $formatedData 
        );
    }
}

if($num==0)
    $sFlag = "N";
else
    $sFlag = "Y";

$output =  array(
       'SongID '=> $songID,
       'SongName' => $songName,
        'Singer' => $singer,
        'Album' => $album,
        'SuccessFlag' => $sFlag,
        'Result' => array_values($arr)
        );
    
    //print_r($output);
    //echo '<br><br>';
    $json= json_encode($output);
    
    echo $json;
//echo json_encode($getJson);
?>
<?php
function convertData($t)
{
//echo "----------------------------";
//$t = converter2($t);
$t = converter($t);
return $t;
}
function converter($t)
{
//$p= 'Hello world!';
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