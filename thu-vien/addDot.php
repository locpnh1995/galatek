<?php
function addDot($gia){
	
	$len=strlen($gia);
	$i=$len;
	
	while($i>=4)
	{
		$gia=substr($gia,0,$i-3).'.'.substr($gia,$i-3);
		
		$i-=3;
	}
	return $gia;
}
?>