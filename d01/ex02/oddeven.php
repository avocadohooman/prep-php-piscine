#!/usr/bin/php
<?php
	$input = fopen("php://stdin", "r");
	while ($input && !feof($input))
	{
		print "Enter a number: ";
		$number = fgets($input);
		$number = str_replace("\n", "", $number);
		if (is_numeric($number))
		{
			if ($number % 2 == 0)
				print "The number {$number} is even\n";
			else 
				print "The number {$number} is odd\n";
		}
		else 
			print "'{$number}' is not a number\n";
		}
	echo "\n";
?>	