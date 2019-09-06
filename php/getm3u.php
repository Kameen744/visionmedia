<?php
	
require "M3uParser.php";
use M3uParser\M3uParser;
	$m3u = new M3uParser();

	$data = $m3u->parseFile('/m3u/2017/12/10.m3u');

	print_r($data);
?>