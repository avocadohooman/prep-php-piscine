#!/usr/bin/php
<?php

if ($argc > 1)
{
	$rotstring = preg_replace('!\s+!', ' ', trim($argv[1]));
	$firstword = strtok($rotstring, " "); 
	$rotstring = preg_split("/ +/", $rotstring);
	unset($rotstring[0]);
	$i = 1;
	while ($rotstring[$i])
	{
		print $rotstring[$i];
		print ' ';
		$i++;
	}
	print "{$firstword}\n";
}
?>