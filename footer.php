<?php
if (!isempty($SP_TEMPLATE)) {
	$file = ROOT."/templates/$SP_TEMPLATE-foot.php";
	if (is_file($file))
	{
		include $file;
	} else {
		error_log("Unable to include template '$SP_TEMPLATE' for request '$SP_URI'");
	}
}
if($SP_DEBUG) {
	echo '<div id="sp_debug">';
	print_r($GLOBALS);
	echo '</div>';
}
?>
	</body>
</html>
