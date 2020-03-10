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

function getsource($url)
{
	$curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $html = curl_exec($curl);
	curl_close($curl);
    return ($html);
}

function fetchimg($html, $url)
{
	preg_match_all('/<img[^>]+src=([^\s>]+)/i', $html, $matches);
	$i = 1;
	$links = array();
	while ($matches[$i])
	{
		$k = 0;
		while ($matches[$i][$k])
		{
			$links[$i][$k] = get_string_between($matches[$i][$k], "\"", "\"");
			$k++;
		}
		$i++;
	}
	$i = 0;
	while ($links[1][$i])
	{
		if (preg_match("/^(https:\/\/|http:\/\/)/", $links[1][$i]) == 0)
		{
			$url.=$links[1][$i];
			$links[1][$i] = $url;
		}
		$i++;
	}
	return ($links);
}

function createfolder($url)
{
	$directory = preg_replace("/^(https:\/\/|http:\/\/)/", '', $url);
	if (file_exists($url) && is_dir($url))
		return ($url);
	mkdir($directory);
	return ($directory);
}


function getname($img){
	preg_match("/^.*?([^\/]+)$/", $img, $matches);
	if (substr($matches[1], -1) === "\"" || substr($matches[1], -1) === "'")
		return (substr($matches[1], 0, -1));
	return ($matches[1]);
}

function downloadimg($imgs, $folder)
{
	$i = 0;
	while ($imgs[1][$i])
	{
		$ch = curl_init($imgs[1][$i]);
		$fp = fopen($folder."/".getname($imgs[1][$i]), 'w');
		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
		$i++;
	}
}

function validator($str)
{
	if (preg_match("/^(https:\/\/|http:\/\/)/", $str) == 1)
			return (1);
	return (0);
}

	if (validator($argv[1]) && $argc == 2)
	{
		$html = getsource($argv[1]);
		$imgs = fetchimg($html, $argv[1]);
		$folder = createfolder($argv[1]);
		downloadimg($imgs, $folder);
  	}
	else 
		print "--Wrong Format--\nPlease use as example below:\nhttp(s)://www.google.com\nOnly one URL is allowed\n";
?>