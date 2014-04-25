<?php
if (!isempty($SP_TEMPLATE)) {
	$temp = ROOT."/templates/$SP_TEMPLATE-foot.php";
	if (is_file($temp))
	{
		include $temp;
	} else {
		error_log("Unable to include template '$temp' for request '$SP_URI'");
	}
}
?>
	</body>
</html>
