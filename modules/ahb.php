<?php
// ASCII, HEX, BINARY functions
loadModule('strings.php');

function ascii2hex($str)
{
	$arr = str_split($toConv, 1);
	foreach($arr as $char)
	{
		echo base_convert(ord($char), 10, 16);
	}
}
