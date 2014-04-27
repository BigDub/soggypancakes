<?php
loadSyrup('tools.php');
pushKeywords('alphabetical', 'sort');
setTitle('Alphabetical Sorter::'.$SP_TITLE);
pushStyles('sort.css');
loadHeader();
$toSort = null;
$sorted = null;
if(!isempty($_POST['toSort']))
{
	$toSort = $_POST['toSort'];
	$sorted = explode("\n", $toSort);
	natcasesort($sorted);
}
?>
<h1>Alphabetical Sorter</h1>
<form method="post" action="sort.php">
<table>
<tr>
<td><textarea name="toSort" autofocus><?php
if(!isempty($toSort))
{
	echo toScreen($toSort);
}
?></textarea></td>
<td><input type="submit" value="Sort"></td>
<td><textarea><?php
if(!isempty($sorted))
{
	foreach($sorted as $string)
	{
		echo toScreen($string)."\n";
	}
}
?></textarea></td>
</tr>
</table>
</form>
<p>Sorting a bunch of lines alphabetically is fairly straightforward task for a computer, but not as easy for a human. Whether it be book titles, names, jobs, or any other kind of list, sometimes having it sorted would be nice, but just takes too much effort. Why not let a computer do it?
<br />
Enter the things you want sorted on the left, separating each one to its own line, and press the sort button in the middle. The computer will do the rest.</p>
<?php
loadFooter();
