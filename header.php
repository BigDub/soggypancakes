<!DOCTYPE HTML>
	<html>
	<head>
<?php
if (count($SP_KEYWORDS) > 0) { echo '<meta name="keywords" content="';
	$number = count($SP_KEYWORDS);
	$index = 0;
	foreach($SP_KEYWORDS as $keyword)
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
	echo '<style type="text/css">';
	foreach ($SP_STYLE as $stylesheet)
	{
		$file = ROOT.'/styles/'.$stylesheet;
		if (is_file($file))
		{
			include $file;
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
		$file = ROOT.'/scripts/'.$script;
		if (is_file($file))
		{
			include $file;
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
	$file = ROOT.'/templates/'.$SP_TEMPLATE.'-head.php';
	if (is_file($file))
	{
		include $file;
	} else {
		error_log("Unable to include template '$SP_TEMPLATE' for request '".$SP_URI.'\'');
	}
}
