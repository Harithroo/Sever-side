<html>
<head>
<title>profile</title>
</head>
<body>
<?php session_start();
?>
Hey <?php echo $_SESSION["USER"]; echo"<br>" ?>
<?php
echo "Your valentine is ".$_POST["val"];
?>
</body>
</html>