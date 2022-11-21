<html>
<head>
<title>profile</title>
</head>
<body>
ID= <?php echo $_POST["id"]; echo"<br>" ?>
Name= <?php echo $_POST["name"]; echo"<br>" ?>
age= <?php echo $_POST["age"]; echo"<br>" ?>
<?php if ($_POST["age"]>18) {
    echo "no rules<br>";
}
?>
Group= <?php echo $_POST["group"]; echo"<br>"; 
echo"<a href='index.php'>go back</a><br>";?>

</body>
</html>