<?php
include("db.php");
$pagename="A smart buy for a smart home"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//retrieve the product id passed from previous page using the GET method and the $_GET superglobal variable
//applied to the query string u_prod_id
//store the value in a local variable called $prodid
$prodid=$_GET['u_prod_id'];
//display the value of the product id, for debugging purposes
echo "<p>Selected product Id: ".$prodid;
$SQL="select prodId, prodName, prodPicNameSmall, prodPrice, prodDescripShort, prodDescripLong, prodQuantity from Product WHERE prodId=".$prodid.";";
//run SQL query for connected DB or exit and display error message
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
echo "<table style='border: 0px'>";
//create an array of records (2 dimensional variable) called $arrayp.
//populate it with the records retrieved by the SQL query previously executed.
//Iterate through the array i.e while the end of the array has not been reached, run through it
while ($arrayp=mysqli_fetch_array($exeSQL))
{
echo "<tr>";
echo "<td style='border: 0px'>";//display the small image whose name is contained in the array
//make the image into an anchor to prodbuy.php and pass the product id by URL (the id from the array)
echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId'].">";
echo "<img src=images/".$arrayp['prodPicNameSmall']." height=200 width=200></a>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array
echo "</td>";
echo "<td style='border: 0px'>";
echo "<p><h5>".$arrayp['prodPrice']."</h5>"; //display product name as contained in the array
echo "</td>";
echo "<td style='border: 0px'>";
echo "<p><h5>".$arrayp['prodDescripShort']."</h5>"; //display product name as contained in the array
echo "</td>";
echo "<td style='border: 0px'>";
echo "<p><h5>".$arrayp['prodQuantity']."</h5>"; //display product name as contained in the array
echo "</td>";
echo "</tr>";
echo "</table>";

echo "<p>Number to be purchased: ";
echo $arrayp['prodQuantity'];
//create form made of one text field and one button for user to enter quantity
//the value entered in the form will be posted to the basket.php to be processed
echo "<form action=basket.php method=post>";

echo "<select name=p_Quantity>";
for ($x = 1; $x <= $arrayp['prodQuantity']; $x++) {
echo "<option value=$x>$x</option>";
}
echo "</select>";
echo "<input type=submit value='ADD TO BASKET'>";

//pass the product id to the next page basket.php as a hidden value
echo "<input type=hidden name=h_prodid value=".$prodid.">";
echo "</form>";
}

include("footfile.html"); //include head layout
echo "</body>";
?>