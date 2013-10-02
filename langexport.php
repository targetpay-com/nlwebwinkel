<?php
header ("Content-type: text/plain");

$Directory = new RecursiveDirectoryIterator('.');
$Iterator = new RecursiveIteratorIterator($Directory);
$Regex = new RegexIterator($Iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

header("Content-Type: text/plain");
$cx=0;
foreach ($Regex as $k => $v) {
	if (strpos($k, '/language/english/')) {
		$temp = file($k);	
				
		foreach ($temp as $v) {
			if (substr($v,0,2)=='$'.'_') {
				
				$cx++;
				$contents[$cx] = substr($k,2)."||".$v; 
				$sorter[$cx] = $v;
			}
		}
	}
}

asort($sorter);
foreach ($sorter as $k=>$v) {
	echo $contents[$k];
}
?>