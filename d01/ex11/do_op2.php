<?php

if ($argc == 1)
	print "Incorrect Paramters";
if ($argc > 1)
{
	if (strstr($argv[2], "+"))
		print($result = $argv[1] + $argv[3]);
	else if (strstr($argv[2], "-"))
		print($result = $argv[1] - $argv[3]);
	else if (strstr($argv[2], "*"))
		print($result = $argv[1] * $argv[3]);
	else if (strstr($argv[2], "/"))
		print($result = $argv[1] * $argv[3]);
	else if (strstr($argv[2], "%"))
		print($result = $argv[1] % $argv[3]);
}
print "\n";
?>