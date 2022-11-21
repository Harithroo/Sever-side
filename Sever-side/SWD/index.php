<html>
<head>
<title>swd-php basics</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<?php
echo "<h1>Test123</h1>";
echo "<img src='css/Snapshot_20191008105204.png' width=100px><br>";
echo "<br>Hello World<br>";
$name="Harithroo";
$height="5.11";
$veg="false";
$week=array("monday","tuesday","wednesday","thursday","friday","saturday","sunday");
foreach ($week as $key => $value) {
    echo "$value <br>";
}
echo "$veg<br>";
?>
</body>
</html>