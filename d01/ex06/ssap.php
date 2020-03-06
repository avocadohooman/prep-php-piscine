#!/usr/bin/php
<?php
	$array = array();

	if ($argc > 1)
	{
		$i = 1;
		while ($i < $argc)
		{
			$tmp = preg_split("/ +/", trim($argv[$i]));
			$array = array_merge($array, $tmp);
			$i++;
		}
	}
	sort($array);
	$i = 0;
	while ($array[$i])
	{
		print "{$array[$i]}\n";
		$i++;
	}
?>