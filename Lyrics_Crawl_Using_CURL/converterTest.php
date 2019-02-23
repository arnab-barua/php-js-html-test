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
		$t= preg_replace("/<\/br>+/u","\n",$t);
		$t= preg_replace("/<br \\\\\/>+/u","\n",$t);
		$t= preg_replace("/<br \/>+/u","\n",$t);
		$t= preg_replace("/<p>/u","\n",$t);
		$t= preg_replace("/<\\\\\/p>/u","\n",$t);
		$t= preg_replace("/<\/p>/u","\n",$t);
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


function converter2($t)
{
$t= preg_replace("/var[!a-zA-Z0-9 _]*=[!a-zA-Z0-9#:.&%?=()+,\/' \"_\-]*;/u","",$t);

$t= preg_replace("/[$]\(document\).ready/u","",$t);
$t= preg_replace("/\( *function *\(\)/u","",$t);
return $t;
}

?>



<?php
	$songData = "<div class=\"dn\" id=\"content_h\">The sun is shinin', makin' this room so bright<br></br>And the cats are sleepin', right up on the table,<br></br>Breakin' all the rules in plain sight.<br></br>There's a cloud colored moon floatin' in the blue<br></br>Not waitin' for the sun to go away<br></br>I just wish I could walk with you and talk with you<br></br>All the live long day<br></br><br></br>We never really had a winter, it never came and now it's gone<br></br>And the days grow longer, like the late night road<br></br>Like the odds you'll come back home<br></br>But I don't mind wasting my time<br></br>Waitin' for the ache to go away<br></br>I don't mind telling you it's what I do<br></br>All the live long day<br></br><br></br>All the live long day, I wonder what I'll do<br></br>I don't see no way, of getting over you<br></br><br></br>The boys were in the back field, sortin' out the who and when<br></br>It's like cat graffiti, but they read it with their nose<br></br>And it's written from the other end<br></br>Though James takes it in with a different spin<br></br>He likes to read the Sniff and Spray<br></br>It's just them and me, and my ennui<br></br>All the live long day<br></br><br></br>I was watchin' the sunset, wishin' you were watchin' too<br></br>Through the winter branches,<br></br>Drop jaw red, Maxfield parrish blue<br></br>Then a windy night with the stars so bright<br></br>The trees just bow and sway<br></br>I been close to blue and missing you<br></br>All the live long day</div>";
	//$songData1 = converter2($songData);
	//$songData2 = converter($songData1);
	$songData2 = convertData($songData);
	?>
<html>
<textarea cols="80" rows="40"><?php echo $songData; ?></textarea>
<textarea cols="80" rows="40"><?php echo $songData2; ?></textarea>
</html>