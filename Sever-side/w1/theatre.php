<html>
<head>
<title>Movie Theatre</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php

$seatrow=array("A","B","C","D","E","F","G","H","I","J","K");
$seatno=array("1 ","2 ","3 ","4 ","5 ","6 ","7 ","8 ","9 ","10 ","11 ","12 ","13 ","14 ","15 ");
echo "<div style=text-align:center>";
echo "<table border=5px align='center' style=text-align:center>";
echo "<h2>Theatre</h2>";
echo "<div style=margin-bottom:50px;>______________________________________________________________</div>";
foreach ($seatrow as $keyr => $valuer) {
	echo "<tr>";
	foreach ($seatno as $keyn => $valuen) {
		if ($keyn=='5'){
			echo "<td style=padding:10px;>|&emsp;&emsp;&emsp;&emsp;|</td>";
		}
		if ($keyn=='10'){
			echo "<td style=padding:10px;>|&emsp;&emsp;&emsp;&emsp;|</td>";
		}
		echo "<td style=padding:10px;>$valuer";
		echo "$valuen</td>";
	}
	echo "</tr>";
}
echo "</div>";
?>
</body>
</html>