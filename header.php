<?php
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
if (!isempty($SP_SYRUP))
{
	include ROOT.'/syrups/'.$SP_SYRUP.'.php';
}
?>
<!DOCTYPE HTML>
	<html>
	<head>
<?php
if (count($SP_KEYWORDS) > 0) { echo '<meta name="keywords" content="';
	$number = count($SP_KEYWORDS);
	$index = 0;
	foreach(_KEYWORDS as $keyword)
	{
		echo $keyword;
		if(++$index < $number)
			echo ', ';
	}
	echo '">';
}
if (!isempty($SP_DESCRIPTION)) echo '<meta name="description" content="'.$SP_DESCRIPTION.'">';
if (!isempty($SP_AUTHOR)) echo '<meta name="author" content="'.$SP_AUTHOR.'">';
if (!isempty($SP_TITLE)) echo '<title>'.$SP_TITLE.'</title>';
if (count($SP_STYLE) > 0)
{
	echo '<style>';
	foreach ($SP_STYLE as $stylesheet)
	{
		if (is_file($stylesheet))
		{
			include $stylesheet;
		} else {
			error_log("Unable to include stylesheet '$stylesheet' for request '".$SP_URI.'\'');
		}
	}
	echo '</style>';
}
if (count($SP_JAVASCRIPT) > 0)
{
	echo '<script>';
	foreach ($SP_JAVASCRIPT as $script)
	{
		if (is_file($script))
		{
			include $script;
		} else {
			error_log("Unable to include script '$script' for request '".$SP_URI.'\'');
		}
	}
	echo '</script>';
}
?>
	</head>
	<body>
<?php
if (!isempty($SP_TEMPLATE))
{
	$temp = ROOT.'/templates/'.$SP_TEMPLATE.'-head.php';
	if (is_file($temp))
	{
		include $temp;
	} else {
		error_log("Unable to include template '$temp' for request '".$SP_URI.'\'');
	}
}
