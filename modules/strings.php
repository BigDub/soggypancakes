<?php

/**
 * Clean a string to be safely displayed in an html context
 */
function toScreen($str)
{
	return
		stripNonUTF8(
			htmlspecialchars(
				$str
			)
		);
}

/**
 * Remove utf8 from a string
 */
function stripUTF8($str)
{
	//TODO
	return $str;
}

/**
 * Remove malformed utf8 characters from a string
 */
function stripNonUTF8($str)
{
	//TODO
	return $str;
}
