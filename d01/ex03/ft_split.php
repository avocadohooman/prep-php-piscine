#!/usr/bin/php
<?php
	function ft_split($str)
	{
		$array = preg_split("/ +/", trim($str));
		return ($array);
	}
?>