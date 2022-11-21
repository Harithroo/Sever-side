<?php
session_start();
$pagename="Sign up"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
echo "<form action=signup_process.php method=post>";
echo "<table>";
echo "<tr><td>";
echo "First name </td><td><input type='text' name ='fname'>";
echo "</td></tr><tr><td>";
echo "Sur name </td><td><input type='text' name ='sname'>";
echo "</td></tr><tr><td>";
echo "Address </td><td><input type='text' name ='address'>";
echo "</td></tr><tr><td>";
echo "Postal code </td><td><input type='text' name ='postcode'>";
echo "</td></tr><tr><td>";
echo "Telephone no </td><td><input type='text' name ='telno'>";
echo "</td></tr><tr><td>";
echo "Email </td><td><input type='text' name ='email'>";
echo "</td></tr><tr><td>";
echo "Password </td><td><input type='text' name ='password1'>";
echo "</td></tr><tr><td>";
echo "Confirm Password </td><td><input type='text' name ='password2'>";
echo "</td></tr><tr><td>";
echo "<input type=submit value='Sign Up' name ='Sign Up'></td><td>";
echo "<input type=reset value='Clear form' name ='Clear form'></td><tr>";
echo "</table>";
echo "</form>";
include("footfile.html"); //include head layout
echo "</body>";
?>