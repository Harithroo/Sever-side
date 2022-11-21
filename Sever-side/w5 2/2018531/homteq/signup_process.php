<?php
session_start();
include("db.php");
$pagename="Your Sign Up Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
if (empty($_POST["fname"]) || empty($_POST["sname"]) || empty($_POST["address"]) || empty($_POST["postcode"]) || empty($_POST["telno"]) || empty($_POST["email"]) || empty($_POST["password1"]) || empty($_POST["password2"])) {
    echo "All fields must be filled<br>";
    echo "<a href='signup.php'>back</a><br>";
}else{
    $fname=$_POST['fname'];
    $sname=$_POST['sname'];
    $address=$_POST['address'];
    $postcode=$_POST['postcode'];
    $telno=$_POST['telno'];
    $email=$_POST['email'];
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    if ($password1!=$password2) {
        echo "password don't match<br>";
        echo "<a href='signup.php'>back</a><br>";
    }else{
		$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
		if(!preg_match($pattern,$email)){
			echo "email error";
		}else{
			$SQL="INSERT INTO users (userType, userFname, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword) VALUES ('C','".$fname."', '".$sname."', '".$address."', '".$postcode."', '".$telno."', '".$email."', '".$password1."')";
			$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
			echo "done";
		}
    }
}
include("footfile.html"); //include head layout
echo "</body>";
?>


