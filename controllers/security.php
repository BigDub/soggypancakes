<?php

function toScreen($string) {
	//TODO: Clean string thorougly
	$cleanString = htmlspecialchars($string);
	return $cleanString;
}
