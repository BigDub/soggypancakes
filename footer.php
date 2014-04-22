<?php
if (!empty($_TEMPLATE)) {
	$temp = ROOT."/templates/$_TEMPLATE.-foot.php";
	if (is_file($temp))
	{
		include $temp;
	} else {
		error_log("Unable to include template '$temp' for request '{$_SERVER['REQUEST_URI']}'");
	}
}
?>
	</body>
</html>
