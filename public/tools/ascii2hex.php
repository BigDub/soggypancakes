<?php
loadSyrup('tools.php');
pushKeywords('ascii', 'hexadecimal', 'converter');
setTitle('ASCII to Hexadecimal::'.$SP_TITLE);
pushStyles('ahbconv.css');
loadHeader();
$toConv = null;
if(!isempty($_POST['toConv']))
{
	$toConv = $_POST['toConv'];
	//valid ascii should fit in that range
	$toConv = preg_replace('/[^ -~]/', '', $toConv);
}
?>
<h1>ASCII to Hexadecimal</h1>
<form method="post">
<table>
<tr>
<td><textarea name="toConv" autofocus><?php
if(!isempty($toConv))
{
	echo toScreen($toConv);
}
?></textarea></td>
<td><input type="submit" value="ASCII -> HEX"></td>
<td><textarea><?php
if(!isempty($toConv))
{
	$arr = str_split($toConv, 1);
	foreach($arr as $char)
	{
		echo base_convert(ord($char), 10, 16);
	}
}
?></textarea></td>
</tr>
</table>
</form>
<?php
loadFooter();
