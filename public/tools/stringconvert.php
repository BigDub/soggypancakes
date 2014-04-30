<?php
$options = array(
	'ascii' => 'ASCII',
	'hex' => 'Hexadecimal',
	'dec' => 'Decimal',
	'bin' => 'Binary'
);

loadSyrups('tools.php');
loadModules('stringconvert.php');
pushStyles('stringconvert.css');
pushKeywords('ascii', 'hexadecimal', 'binary', 'decimal', 'converter');

$from = 'ascii';
$to = 'hex';
if(!isempty($_POST['from']))
{
	if(array_key_exists($_POST['from'], $options))
	{
		$from = $_POST['from'];
	}
}
if(!isempty($_POST['to']))
{
	if(array_key_exists($_POST['to'], $options))
	{
		$to = $_POST['to'];
	}
}
$input = null;
$output = null;
if(!isempty($_POST['input']))
{
	$input = $_POST['input'];
	$output = sc_convert($input, $from, $to);
}
setTitle('String Converter::'.$SP_TITLE);
include ROOT.'/header.php';
?>
<h1>String Converter</h1>
<h2><?php echo $options[$from].' to '.$options[$to]; ?></h2>
<span>The input needs to be the right length for a byte of each type:</span>
<ul>
<li>ASCII: 1 character long. It takes a lot of effort to mess this one up.</li>
<li>Hexadecimal: 2 characters long. e.x. "0f" instead of just "f"</li>
<li>Decimal: 3 characters long, do not exceed 255. e.x. "097" instead of just "97"</li>
<li>Binary: 8 characters long. e.x. "00000101" instead of just "101"</li>
</ul>
<span>If you are short any characters the conversion will become offset and the last byte will be ignored.</span>
<form method="post" id="dForm">
<table>
<tr>
<td>
<select name="from">
<?php
foreach($options as $key => $value)
{
	echo "<option value=\"$key\"";
	if($from == $key)
		echo ' selected';
	echo ">$value</option>";
}
?>
</select>
<br />
<textarea name="input" autofocus><?php
if(!isempty($input))
{
	echo toScreen($input);
}
?></textarea></td>
<td>
<input type="submit" value="Convert">
</td>
<td>
<select name="to">
<?php
foreach($options as $key => $value)
{
	echo "<option value=\"$key\"";
	if($to == $key)
		echo ' selected';
	echo ">$value</option>";
}
?>
</select>
<br />
<textarea><?php
if(!isempty($output))
{
	echo toScreen($output);
}
?></textarea></td>
</tr>
</table>
</form>
<?php
include ROOT.'/footer.php';
