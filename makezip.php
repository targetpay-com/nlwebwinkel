<?php 
header ("Content-type: text/plain");

$input1 = file ("../dutch1.txt");
$input2 = file ("../dutch2.txt");
$input = array_merge($input1, $input2);

$zip = new ZipArchive();
$tempFile = "/tmp/".time().".zip";
if (!$zip->open($tempFile, ZIPARCHIVE::CREATE)) {
	die ("Could not create tempfile");
}

foreach ($input as $v) {
	list ($file, $contents) = explode("||",$v);
	if ($contents) {
		$files[$file] .= $contents;
	}
}
foreach ($files as $filename => $contents) {
	$zipFileName = str_replace('english','dutch',$filename);
	$zip->addFromString($zipFileName, "<"."?"."php\r\n//\r\n//  Vertaling door: Yellow Melon B.V.\r\n//  www.nlwebwinkel.org\r\n//\r\n\r\n//  Bijgewerkt: ".strftime("%d-%m-%Y %T")."\r\n\r\n".$contents."\r\n");
}

$zip->close();
$zipFileContents = file_get_contents($tempFile);
@unlink ($tempFile);

header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"dutch.zip\"");
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".strlen($zipFileContents));
ob_end_flush();
echo $zipFileContents;
?>