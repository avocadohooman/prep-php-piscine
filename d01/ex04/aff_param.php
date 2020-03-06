#!/usr/bin/php
<?php

	$i = 0;
	if ($argc > 1)
	{
		while ($i < $argc)
		{
			print "{$argv[$i]}\n";
			$i++;
		}
	}
?>