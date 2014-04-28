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
<p>One thing both people and computers are really bad at is coming up with something totally random. The good news is, unless you're a computer as well, the patterns behind a random number generator like this are so complicated they may as well be random... for most purposes.</p>
<form method="post">
<table>
<tr>
<td>
<div>
<label>Numbers to generate:</label><input autofocus class="num" type="number" name="number" min="0" max="<?php echo NUMCAP; ?>" value="<?php
if(!isempty($number))
{
	echo $number;
}
else
{
	echo 1;
}
?>">
</div>
<div>
<label>Minimum value:</label><input class="num" type="number" name="min" value="<?php echo $min; ?>">
</div>
<div>
<label>Maximum value:</label><input class="num" type="number" name="max" value="<?php echo $max; ?>">
</div>
</td>
<td class="sub">
<input type="submit" value="Generate">
</td>
<td class="txt">
<textarea><?php
if(!isempty($number))
{
	if($min == $max)
	{
		echo "'$min' $number times... dork.";
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
