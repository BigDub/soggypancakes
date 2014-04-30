<?php
// ASCII, HEX, BINARY functions
loadModules('strings.php');

function sc_convert($str, $from, $to)
{
	if(isempty($str))
		return '';
	switch($from)
	{
		case 'ascii':
			$str = sc_ascii2dec($str);
			break;
		case 'hex':
			$str = sc_hex2dec($str);
			break;
		case 'dec':
			$str = stripNonDec($str);
			break;
		case 'bin':
			$str = sc_bin2dec($str);
			break;
		default:
			return '';
	}
	switch($to)
	{
		case 'ascii':
			return sc_dec2ascii($str);
		case 'hex':
			return sc_dec2hex($str);
		case 'dec':
			return $str;
		case 'bin':
			return sc_dec2bin($str);
		default:
			return '';
	}
}

function sc_ascii2dec($str)
{
	$return = '';
	$str = stripNonAscii($str);
	$arr = str_split($str, 1);
	foreach($arr as $char)
	{
		$return .= str_pad(ord($char), 3, '0', STR_PAD_LEFT).' ';
	}
	if(!isempty($return))
		return substr($return, 0, -1);
	return $return;
}

function sc_dec2ascii($str)
{
	$return = '';
	$str = stripNonHex($str);
	$arr = str_split($str, 3);
	foreach($arr as $char)
	{
		if(strlen($char) != 3 || $char > 255)
		{
			continue;
		}
		$return .= chr($char);
	}
	return $return;
}

function sc_hex2dec($str)
{
	$return = '';
	$str = stripNonHex($str);
	$arr = str_split($str, 2);
	foreach($arr as $char)
	{
		if(strlen($char) != 2)
		{
			continue;
		}
		$return .= str_pad(base_convert($char, 16, 10), 3, '0', STR_PAD_LEFT).' ';
	}
	if(!isempty($return))
		return substr($return, 0, -1);
	return $return;
}

function sc_dec2hex($str)
{
	$return = '';
	$str = stripNonDec($str);
	$arr = str_split($str, 3);
	foreach($arr as $char)
	{
		if(strlen($char) != 3 || $char > 255)
		{
			continue;
		}
		$return .= str_pad(base_convert($char, 10, 16), 2, '0', STR_PAD_LEFT).' ';
	}
	if(!isempty($return))
		return substr($return, 0, -1);
	return $return;
}

function sc_dec2bin($str)
{
	$return = '';
	$str = stripNonHex($str);
	$arr = str_split($str, 3);
	foreach($arr as $char)
	{
		if(strlen($char) != 3 || $char > 255)
		{
			continue;
		}
		$return .= str_pad(base_convert($char, 10, 2), 8, '0', STR_PAD_LEFT).' ';
	}
	if(!isempty($return))
		return substr($return, 0, -1);
	return $return;
}

function sc_bin2dec($str)
{
	$return = '';
	$str = stripNonBin($str);
	$arr = str_split($str, 8);
	foreach($arr as $char)
	{
		if(strlen($char) != 8)
		{
			continue;
		}
		$return .= str_pad(base_convert($char, 2, 10), 3, '0', STR_PAD_LEFT).' ';
	}
	if(!isempty($return))
		return substr($return, 0, -1);
	return $return;
}
