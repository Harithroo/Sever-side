<?php
session_start();
include("db.php");
$pagename="SECOND PAGE";

echo "<html>";
echo "<head><link rel=stylesheet type=text/css href=nicestyle.css></head>";
echo "<body>";
echo "<center>";
echo "<h1> YOUR FAVOURITE STORE </h1>";
echo "<h2>".$pagename."</h2>";

$usrn=$_POST['txtbx_usrn'];
$pwd=$_POST['txtbx_pwd'];

if (empty($usrn) or empty($pwd))
{
	echo "<p>Your form is incomplete";
	echo "<br>Back to <a href=firstpage.php>login</a>";
}
else
{
	$SQL="select * from users where username = '".$usrn."'";
	$exeSQL=mysqli_query($conn,$SQL) or die(mysqli_error($conn));
	$Array=mysqli_fetch_array($exeSQL);

	if ($Array['username']== $usrn and $Array['password']== $pwd)
	{
		$_SESSION['uid']=$Array['userId'];
		$_SESSION['ufn']=$Array['userFirstName'];
		$_SESSION['usn']=$Array['username'];
		echo "<p>Hello, ".$_SESSION['ufn']."! ";
		echo "<br>Your username is ".$_SESSION['usn'];
		echo "<br>Your password is secret";
		echo "<br><a href=index.php>Continue Shopping</a>";
	}
	else
	{
		if ($Array['username'] <> $usrn) // changed userArray to Array
		{
			echo "<p>Sorry this username was not recognized!";
			echo "<p>Please go back to <a href=firstpage.php>login</a>";
		}
		else
		{
			echo "<p>Sorry this password is not valid!";
			echo "<p>Please go back to <a href=firstpage.php>login</a>";
		}
	}
}
echo "</center>";
echo "</body>";
echo "</html>";
?>
