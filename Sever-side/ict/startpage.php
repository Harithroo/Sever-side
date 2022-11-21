<?php
include ("db.php");
$pagename="Start";
echo "<link rel=stylesheet type=text/css href=sheet.css>";
echo "<title>".$pagename."</title>";
echo "<h1>AdSmart</h1>";
echo "<p></p>";
echo "<h2>".$pagename."</h2>";

echo "<p><b>To view more info, click on one of these:  </b>";
$SQL1="select agencyNo, agencyName from Agency";
$exeSQL1=mysqli_query($c, $SQL1) or die (mysqli_error($c));
while ($thing1=mysqli_fetch_array($exeSQL1))
{
	echo "<a href=details.php?agid=".$thing1['agencyNo'].">";
	echo "<br>".$thing1['agencyName'];
	echo "</a>";
}

echo "<p><b> Alternatively to view more info, choose one of these: </b>";
$SQL2="select designerId, desFullName from Designer";
$exeSQL2=mysqli_query($c, $SQL2) or die (mysqli_error($c));
while ($thing2=mysqli_fetch_array($exeSQL2))
{
	echo "<a href=details.php?desid=".$thing2['designerId'].">";
	echo "<br>".$thing2['desFullName'];
	echo "</a>";
}

?>
