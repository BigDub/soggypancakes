<?php
loadSyrup('tools.php');
pushKeywords('ascii', 'hexadecimal', 'converter');
setTitle('Hexadecimal to ASCII::'.$SP_TITLE);
pushStyles('ahbconv.css');
loadHeader();
$toConv = null;
if(!isempty($_POST['toConv']))
{
	$toConv = $_POST['toConv'];
}
?>
<h1>Hexadecimal to ASCII</h1>
<form method="post">
<table>
<tr>
<td><textarea name="toConv" autofocus><?php
if(!isempty($toConv))
{
	echo toScreen($toConv);
}
?></textarea></td>
<td><input type="submit" value="HEX -> ASCII"></td>
<td><textarea><?php
if(!isempty($toConv))
{
	$arr = str_split($toConv, 2);
	foreach($arr as $char)
	{
		if(strlen($char) != 2 || preg_match('/[^a-z0-9]/', $char))
		{
			continue;
		}
		echo chr(base_convert($char, 16, 10));
	}
}
?></textarea></td>
</tr>
</table>
</form>
<?php
loadFooter();
