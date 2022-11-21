<html>
<head>
<title>profile</title>
</head>
<body>
<?php session_start();
$_SESSION["USER"]=$_GET["name"];?>
Hi <?php echo $_SESSION["USER"]; echo"<br>" ?>
<?php
echo "<form action='msg.php' method='post'>";
echo "My valentine <input type='text' name='val'></input><br>";
echo"<input type='submit' value='join'></input><br>";
?>
</body>
</html>