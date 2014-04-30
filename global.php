<?php
define('ROOT', dirname(__FILE__));

$SP_URI = $_SERVER['REQUEST_URI'];
$SP_KEYWORDS = array();
$SP_DESCRIPTION = null;
$SP_AUTHOR = 'William Wyatt Earnshaw';
$SP_TITLE = 'SoggyPancakes';
$SP_STYLE = array('global.css');
$SP_JAVASCRIPT = array();
$SP_TEMPLATE = array('default');
$SP_DEBUG = false;

function pushKeywords()
{
	global $SP_KEYWORDS;
	$SP_KEYWORDS = array_merge($SP_KEYWORDS, func_get_args());
}

function pushStyles()
{
	global $SP_STYLE;
	$SP_STYLE = array_merge($SP_STYLE, func_get_args());
}

function pushScripts()
{
	global $SP_JAVASCRIPT;
	$SP_JAVASCRIPT = array_merge($SP_JAVASCRIPT, func_get_args());
}

function pushTemplates()
{
	global $SP_TEMPLATE;
	$SP_TEMPLATE = array_merge($SP_TEMPLATE, func_get_args());
}

function setTitle($title)
{
	global $SP_TITLE;
	$SP_TITLE = $title;
}

function loadSyrups()
{
global
$SP_URI,
$SP_KEYWORDS,
$SP_DESCRIPTION,
$SP_AUTHOR,
$SP_TITLE,
$SP_STYLE,
$SP_JAVASCRIPT,
$SP_TEMPLATE,
$SP_DEBUG;
	foreach(func_get_args() as $syrup)
	{
		$file = ROOT.'/syrups/'.$syrup;
		if (is_file($file))
		{
			include $file;
		} else {
			error_log("Unable to load syrup '$syrup' for request '".$SP_URI.'\'');
		}
	}
}

function loadModules()
{
global
$SP_URI,
$SP_KEYWORDS,
$SP_DESCRIPTION,
$SP_AUTHOR,
$SP_TITLE,
$SP_STYLE,
$SP_JAVASCRIPT,
$SP_TEMPLATE,
$SP_DEBUG;
	foreach(func_get_args() as $module) {
		$file = ROOT.'/modules/'.$module;
		if (is_file($file))
		{
			include_once $file;
		} else {
			error_log("Unable to load module '$module' for request '".$SP_URI.'\'');
		}
	}
}

function isempty(&$obj)
{
	return (
		!isset($obj) ||
		$obj == null ||
		$obj === '' ||
		(is_array($obj) && count($obj) == 0)
	);
}
