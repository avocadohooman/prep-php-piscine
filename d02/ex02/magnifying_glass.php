#!/usr/bin/php
<?php

function get_string_between($string, $start, $end){
	$string = ' ' . $string;
    $ini = strpos($string, $start);
	if ($ini == 0) 
		return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

function toupper1($str)
{
	$tmp = get_string_between($str, "<a", "/a>");
	$tmp = get_string_between($tmp, ">", "<");
	$tmp2 = get_string_between($str, "title=\"", "\">");
	$str = str_ireplace($tmp2, strtoupper($tmp2), $str);
	$str = str_ireplace($tmp, strtoupper($tmp), $str);
	return $str;
}

$fd = fopen($argv[1], "r");

while(! feof($fd))  {
	$file = fgets($fd);
	if (get_string_between($file, "<a", "</a>"))
		$file = toupper1($file);
	print $file;
  }
fclose($fd);
?>
