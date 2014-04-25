<?php
define('ROOT', dirname(__FILE__));

$SP_URI = $_SERVER['REQUEST_URI'];
$SP_KEYWORDS = array();
$SP_DESCRIPTION = null;
$SP_AUTHOR = 'William Wyatt Earnshaw';
$SP_TITLE = 'SoggyPancakes';
$SP_STYLE = array(ROOT.'/styles/global.css');
$SP_JAVASCRIPT = array();
$SP_SYRUP = null;
$SP_TEMPLATE = null;

function pushKeyword($keyword)
{
	global $SP_KEYWORDS;
	array_push($SP_KEYWORDS, $keyword);
}

function pushStyle($stylesheet)
{
	global $SP_STYLE;
	array_push($SP_STYLE, $stylesheet);
}

function pushScript($javascript)
{
	global $SP_JAVASCRIPT;
	array_push($SP_JAVASCRIPT, $javascript);
}

function loadHeader()
{
global
$SP_URI,
$SP_KEYWORDS,
$SP_DESCRIPTION,
$SP_AUTHOR,
$SP_TITLE,
$SP_STYLE,
$SP_JAVASCRIPT,
$SP_SYRUP,
$SP_TEMPLATE;
	include ROOT.'/header.php';
}

function loadFooter()
{
global
$SP_URI,
$SP_KEYWORDS,
$SP_DESCRIPTION,
$SP_AUTHOR,
$SP_TITLE,
$SP_STYLE,
$SP_JAVASCRIPT,
$SP_SYRUP,
$SP_TEMPLATE;
	include ROOT.'/footer.php';
}

function isempty(&$obj)
{
	return (!isset($obj) || $obj == null || $obj === '');
}
