<?php
define('ROOT', dirname(__FILE__));

$_URI = $_SERVER['REQUEST_URI'];
$_KEYWORDS = array();
$_DESCRIPTION = null;
$_AUTHOR = 'William Wyatt Earnshaw';
$_TITLE = 'SoggyPancakes';
$_STYLE = array(ROOT.'/styles/global.css');
$_JAVASCRIPT = array();
$_SYRUP = null;
$_TEMPLATE = null;

function pushKeyword($keyword)
{
	array_push($_KEYWORDS, $keyword);
}

function pushStyle($stylesheet)
{
	array_push($_STYLE, $stylesheet);
}

function pushScript($javascript)
{
	array_push($_JAVASCRIPT, $javascript);
}

function loadHeader()
{
global
$_URI,
$_KEYWORDS,
$_DESCRIPTION,
$_AUTHOR,
$_TITLE,
$_STYLE,
$_JAVASCRIPT,
$_SYRUP,
$_TEMPLATE;
	include ROOT.'/header.php';
}

function loadFooter()
{
global
$_URI,
$_KEYWORDS,
$_DESCRIPTION,
$_AUTHOR,
$_TITLE,
$_STYLE,
$_JAVASCRIPT,
$_SYRUP,
$_TEMPLATE;
	include ROOT.'/footer.php';
}

function isempty(&$obj)
{
	return (!isset($obj) || $obj == null || $obj === '');
}
