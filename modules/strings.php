<?php

/**
 * Clean a string to be safely displayed in an html context
 */
function toScreen($str)
{
	if(empty($str))
	{
		return '';
	}

	$safe_str = (string) $str;
	$safe_str = stripNonUTF8($safe_str);
	$safe_str = htmlspecialchars($safe_str, ENT_QUOTES, 'UTF-8');

	return $safe_str;
}

function stripNonBin($str)
{
	return preg_replace('/[^0-1]/', '', $str);
}

function stripNonDec($str)
{
	return preg_replace('/[^0-9]/', '', $str);
}

function stripNonHex($str)
{
	return preg_replace('/[^0-9a-f]/', '', $str);
}

function stripNonAscii($str)
{
	return preg_replace('/[^ -~]/', '', $str);
}

function stripNonUTF8($str)
{
	# based on
	# http://magp.ie/2011/01/06/remove-non-utf8-characters-from-string-with-php/

	if ( empty( $str ) ) {
		return '';
	}

	# strip out null bytes
	# http://php.net/manual/en/security.filesystem.nullbytes.php
	$str = str_replace( '\0', '', $str );

	# reject overly long 2 byte sequences and characters above U+10000
	$str = preg_replace(
		'/[\x00-\x08\x10\x0B\x0C\x0E-\x19\x7F]' .
		'|[\x00-\x7F][\x80-\xBF]+' .
		'|([\xC0\xC1]|[\xF0-\xFF])[\x80-\xBF]*' .
		'|[\xC2-\xDF]((?![\x80-\xBF])|[\x80-\xBF]{2,})' .
		'|[\xE0-\xEF](([\x80-\xBF](?![\x80-\xBF]))' .
		'|(?![\x80-\xBF]{2})|[\x80-\xBF]{3,})/S',
		'',
		$str
	);

	# reject overly long 3 byte sequences and UTF-16 surrogates
	$str = preg_replace(
		'/\xE0[\x80-\x9F][\x80-\xBF]|\xED[\xA0-\xBF][\x80-\xBF]/S',
		'',
		$str
	);

	return $str;
}
