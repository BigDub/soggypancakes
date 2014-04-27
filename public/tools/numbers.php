<?php
define('NUMCAP', 100);
loadSyrup('tools.php');
pushKeywords('random', 'number', 'generator');
setTitle('Random Number Generator::'.$SP_TITLE);
pushStyles('numbers.css');
loadHeader();
$number = null;
$min = 0;
$max = 100;
if(!isempty($_POST['number']))
{
	$number = intval($_POST['number']);
	if($number < 0)
	{
		$number = 0;
	}
	elseif($number > NUMCAP)
	{
		$number = NUMCAP;
	}
}
if(!isempty($_POST['min']))
{
	$min = intval($_POST['min']);
}
if(!isempty($_POST['max']))
{
	$max = intval($_POST['max']);
}
if($min > $max)
{
	$tmp = $min;
	$min = $max;
	$max = $tmp;
}
?>
<h1>Random Number Generator</h1>
<form method="post" action="numbers.php">
<input type="number" name="number" min="0" max="<?php echo NUMCAP; ?>" value="<?php
if(!isempty($number))
{
	echo $number;
}
else
{
	echo 1;
}
?>">
<input type="number" name="min" value="<?php echo $min; ?>">
<input type="number" name="max" value="<?php echo $max; ?>">
<input type="submit" value="Generate">
<textarea><?php
if(!isempty($number))
{
	if($min == $max)
	{
		echo $min . " $number times... dork.";
	}
	else
	{
		for($index = 0; $index < $number; $index++)
		{
			echo rand($min, $max)."\n";
		}
	}
}
?></textarea></td>
</tr>
</table>
</form>
<?php
loadFooter();
