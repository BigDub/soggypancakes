<?php
define('ROOT', dirname(__FILE__));

$_URI = $_SERVER['REQUEST_URI'];
$_KEYWORDS = array();
$_DESCRIPTION = null;
$_AUTHOR = 'William Wyatt Earnshaw';
$_TITLE = 'SoggyPancakes';
$_STYLE = array(ROOT.'/styles/global.css');
$_JAVASCRIPT = array();
$_CLASS = null;
$_TEMPLATE = null;

function addKeyword($keyword)
{
	array_push($_KEYWORDS, $keyword);
}

function addStyle($stylesheet)
{
	array_push($_STYLE, ROOT.'/styles/'.$stylesheet);
}

function addScript($javascript)
{
	array_push($_JAVASCRIPT, ROOT.'/scripts/'.$javascript);
}

function setClass($class)
{
	$_CLASS = $class;
}

function loadHeader()
{
	include ROOT.'/header.php';
}

function loadFooter()
{
	include ROOT.'/footer.php';
}

/**
 * These getter/setter like functions are here because I was having trouble getting the globals to remain in scope across multiple includes.
 */
function _URI($val = null)
{
	global $_URI;
	if(!is_null($val))
		$_URI = $val;
	return $_URI;
}
function _KEYWORDS()
{
	global $_KEYWORDS;
	return $_KEYWORDS;
}
function _DESCRIPTION($val = null)
{
	global $_DESCRIPTION;
	if(!is_null($val))
		$_DESCRIPTION = $val;
	return $_DESCRIPTION;
}
function _AUTHOR($val = null)
{
	global $_AUTHOR;
	if(!is_null($val))
		$_AUTHOR = $val;
	return $_AUTHOR;
}
function _TITLE($val = null)
{
	global $_TITLE;
	if(!is_null($val))
		$_TITLE = $val;
	return $_TITLE;
}
function _STYLE()
{
	global $_STYLE;
	return $_STYLE;
}
function _JAVASCRIPT()
{
	global $_JAVASCRIPT;
	return $_JAVASCRIPT;
}
function _CLASS($val = null)
{
	global $_CLASS;
	if(!is_null($val))
		$_CLASS = $val;
	return $_CLASS;
}
function _TEMPLATE($val = null)
{
	global $_TEMPLATE;
	if(!is_null($val))
		$_TEMPLATE = $val;
	return $_TEMPLATE;
}
function isempty(&$obj)
{
	return (!isset($obj) || $obj == null || $obj === '');
}
