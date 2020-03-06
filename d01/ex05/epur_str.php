#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$input = preg_replace('!\s+!', ' ', trim($argv[1]));
		print "{$input}\n";
	}
?>