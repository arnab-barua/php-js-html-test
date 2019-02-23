<?php 
function levenshteinDistance ($s, $t)
{	
	$distance = 0;
	$n = strlen($s);
	$m = strlen($t);
	
	if($n==0)
		return $m;
	if($m == 0)
		return $n;
	$dis = array();
	for($i = 0;$i<=$n;$i++)
		$dis[0][$i] = $i;
	for($j = 0;$j<=$m;$j++)
		$dis[$j][0] = $j;
	
	for($j=1;$j<=$n;$j++)
	{
		$cS = $s[$j-1];
		for($i=1;$i<=$m;$i++)
		{
			$cT = $t[$i-1];
			if($cS == $cT)
				$cost = 0;
			else
				$cost = 1;
			$dis[$i][$j] = Minimum($dis[$i-1][$j]+1,$dis[$i][$j-1]+1,$dis[$i-1][$j-1]+$cost);			
		}
	}
	$distance = $dis[$m][$n];
	return $distance;
} 
function Minimum($a,$b,$c)
{
	$mi = $a;
	if($b<$mi)
		$mi = $b;
	if($c<$mi)
		$mi = $c;
	return $mi;
}
?>