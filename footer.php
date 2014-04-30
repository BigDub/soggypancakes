<?php
if (count($SP_TEMPLATE) > 0)
{
	foreach($SP_TEMPLATE as $template)
	{
		$file = ROOT."/templates/$template-foot.php";
		if (is_file($file))
		{
			include $file;
		}
	}
}
if($SP_DEBUG)
{
	echo '<div id="sp_debug">';
	print_r($GLOBALS);
	echo '</div>';
}
?>
	</body>
</html>
