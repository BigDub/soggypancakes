<?php
if (!isempty(_CLASS()))
{
	include ROOT.'/classes/'._CLASS().'.php';
}
?>
<!DOCTYPE HTML>
	<html>
	<head>
<?php
if (count(_KEYWORDS()) > 0) { echo '<meta name="keywords" content="';
	$number = count(_KEYWORDS());
	$index = 0;
	foreach(_KEYWORDS() as $keyword)
	{
		echo $keyword;
		if(++$index < $number)
			echo ', ';
	}
	echo '">';
}
if (!isempty(_DESCRIPTION())) echo '<meta name="description" content="'._DESCRIPTION().'">';
if (!isempty(_AUTHOR())) echo '<meta name="author" content="'._AUTHOR().'">';
if (!isempty(_TITLE())) echo '<title>'._TITLE().'</title>';
if (count(_STYLE()) > 0)
{
	echo '<style>';
	foreach (_STYLE() as $stylesheet)
	{
		if (is_file($stylesheet))
		{
			include $stylesheet;
		} else {
			error_log("Unable to include stylesheet '$stylesheet' for request '"._URI().'\'');
		}
	}
	echo '</style>';
}
if (count(_JAVASCRIPT()) > 0)
{
	echo '<script>';
	foreach (_JAVASCRIPT() as $script)
	{
		if (is_file($script))
		{
			include $script;
		} else {
			error_log("Unable to include script '$script' for request '"._URI().'\'');
		}
	}
	echo '</script>';
}
?>
	</head>
	<body>
<?php
echo isempty(_TEMPLATE());
if (!isempty(_TEMPLATE())) {
	$temp = ROOT.'/templates/'._TEMPLATE().'-head.php';
	if (is_file($temp))
	{
		include $temp;
	} else {
		error_log("Unable to include template '$temp' for request '"._URI().'\'');
	}
}
