#!/usr/bin/php
<?php

function validator($str)
{
	$i = 0;
	$line = "0123456789*/+-% ";
	while ($str[$i])
	{
		if (strstr($line, $str[$i]))
			$i++;
		else
			return (0);
	}
	return (1);
}

function calculate($str)
{
	preg_match_all('!\d+!', $str, $matches);
	if (strstr($str, "%"))
		print($result = $matches[0][0] % $matches[0][1]);
	else if (strstr($str, "/"))
		print($result = $matches[0][0] / $matches[0][1]);
	else if (strstr($str, "+"))
		print($result = $matches[0][0] + $matches[0][1]);		
	else if (strstr($str, "-"))
		print($result = $matches[0][0] - $matches[0][1]);	
	else if (strstr($str, "*"))
		print($result = $matches[0][0] * $matches[0][1]);	
}

if ($argc != 2)
	print "Incorrect Parameters";
if ($argc == 2)
{
	if (!validator($argv[1]))
	{
		print "Syntax Error\n";
		return (0);
	}
	calculate($argv[1]);
}
print "\n";
?>