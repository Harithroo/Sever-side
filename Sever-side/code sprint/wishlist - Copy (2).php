<?php
session_start();
include("db.php");
$pagename="Wishlist"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
if(isset($_POST["hotelid"])) {
	$delhotelid=$_POST["hotelid"];
	unset($_SESSION['wishlist'][$delhotelid]);
	echo "1 hotel removed <br>";
	if(count($_SESSION['wishlist'])<1){
		$total=0;
		echo "wishlist empty<br>";
		echo "<table style='border: 0px'>";
		echo "<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th></tr>";
		echo "<tr><th colspan='3'>Total</th><td>$total</td></tr>";
		echo "</table>";
		echo "<br>";
		echo "New homteq customers: <a href=signup.php>signup</a><br><br>";
		echo "Returning homteq customers: <a href=login.php>login</a><br><br>";
	}else{
		$total=0;
		echo "<table style='border: 0px'>";
		echo "<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th></th></tr>";
		foreach ($_SESSION['wishlist'] as $key => $value) {
			$SQL="select hotelId, prodName, prodPicNameSmall, prodPrice, prodDescripShort, prodDescripLong, prodQuantity from Product WHERE hotelId=".$key.";";
			//run SQL query for connected DB or exit and display error message
			$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
			//create an array of records (2 dimensional variable) called $arrayp.
			//populate it with the records retrieved by the SQL query previously executed.
			//Iterate through the array i.e while the end of the array has not been reached, run through it
			while ($arrayb=mysqli_fetch_array($exeSQL)){
				echo "<tr>";
				echo "<td>";
				echo "<p><h5>".$arrayb['prodName']."</h5>"; //display product name as contained in the array
				echo "</td>";
				echo "<td>";
				echo "<p><h5>".$arrayb['prodPrice']."</h5>"; //display product name as contained in the array
				echo "</td>";
				echo "<td>";
				echo "<p><h5>".$value."</h5>"; //display product name as contained in the array
				echo "</td>";
				echo "<td>";
				$subtotal=$arrayb['prodPrice']*$value;
				$total=$total+$subtotal;
				echo "<p><h5>".$subtotal."</h5>"; //display product name as contained in the array
				echo "</td>";
				echo "<td>";
				echo "<form action=wishlist.php method=post>";
				echo "<input type='submit' value='remove'>";
				//pass the product id to the same page wishlist.php as a hidden value
				echo "<input type=hidden name=hotelid value=".$key.">";
				echo "</form>";
				echo "</td>";
				echo "</tr>";
			}
		}
		echo "<tr><th colspan='3'>Total</th><td>$total</td><td></td></tr>";
		echo "</table>";
		echo "<a href=clearwishlist.php>clear</a><br><br>";
		echo "New homteq customers: <a href=signup.php>signup</a><br><br>";
		echo "Returning homteq customers: <a href=login.php>login</a><br><br>";
	}
}else{
	if(isset($_POST["h_hotelid"])) {
		$newhotelid=$_POST["h_hotelid"];
		$reququantity=$_POST["p_Quantity"];
		//create a new cell in the wishlist session array. Index this cell with the new product id.
		//Inside the cell store the required product quantity
		$_SESSION['wishlist'][$newhotelid]=$reququantity;
		//echo "<p>The doc id ".$newdocid." has been ".$_SESSION['wishlist'][$newdocid];
		echo "1 hotel added";
		if(isset($_SESSION['wishlist'])){
			$total=0;
			echo "<table style='border: 0px'>";
			echo "<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th></th></tr>";
			foreach ($_SESSION['wishlist'] as $key => $value) {
				$SQL="select hotelId, prodName, prodPicNameSmall, prodPrice, prodDescripShort, prodDescripLong, prodQuantity from Product WHERE hotelId=".$key.";";
				//run SQL query for connected DB or exit and display error message
				$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
				//create an array of records (2 dimensional variable) called $arrayp.
				//populate it with the records retrieved by the SQL query previously executed.
				//Iterate through the array i.e while the end of the array has not been reached, run through it	
				while ($arrayb=mysqli_fetch_array($exeSQL)){
					echo "<tr>";
					echo "<td>";
					echo "<p><h5>".$arrayb['prodName']."</h5>"; //display product name as contained in the array
					echo "</td>";
					echo "<td>";
					echo "<p><h5>".$arrayb['prodPrice']."</h5>"; //display product name as contained in the array
					echo "</td>";
					echo "<td>";
					echo "<p><h5>".$value."</h5>"; //display product name as contained in the array
					echo "</td>";
					echo "<td>";
					$subtotal=$arrayb['prodPrice']*$value;
					$total=$total+$subtotal;
					echo "<p><h5>".$subtotal."</h5>"; //display product name as contained in the array
					echo "</td>";
					echo "<td>";
					echo "<form action=wishlist.php method=post>";
					echo "<input type='submit' value='remove'>";
					//pass the product id to the same page wishlist.php as a hidden value
					echo "<input type=hidden name=hotelid value=".$key.">";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
				}
			}
		}
		echo "<tr><th colspan='3'>Total</th><td>$total</td><td></td></tr>";
		echo "</table>";
		echo "<a href=clearwishlist.php>clear</a><br><br>";
		echo "New homteq customers: <a href=signup.php>signup</a><br><br>";
		echo "Returning homteq customers: <a href=login.php>login</a><br><br>";
	}else{
		if(isset($_SESSION['wishlist'])){
			if(count($_SESSION['wishlist'])<1){
				$total=0;
				echo "wishlist empty<br>";
				echo "<table style='border: 0px'>";
				echo "<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th></tr>";
				echo "<tr><th colspan='3'>Total</th><td>$total</td></tr>";
				echo "</table>";
				echo "<br>";
				echo "New homteq customers: <a href=signup.php>signup</a><br><br>";
				echo "Returning homteq customers: <a href=login.php>login</a><br><br>";
			}else{
				echo "Current wishlist unchanged<br>";
				$total=0;
				echo "<table style='border: 0px'>";
				echo "<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th></th></tr>";
				foreach ($_SESSION['wishlist'] as $key => $value) {
					$SQL="select hotelId, prodName, prodPicNameSmall, prodPrice, prodDescripShort, prodDescripLong, prodQuantity from Product WHERE hotelId=".$key.";";
					//run SQL query for connected DB or exit and display error message
					$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
					//create an array of records (2 dimensional variable) called $arrayp.
					//populate it with the records retrieved by the SQL query previously executed.
					//Iterate through the array i.e while the end of the array has not been reached, run through it
					while ($arrayb=mysqli_fetch_array($exeSQL)){
						echo "<tr>";
						echo "<td>";
						echo "<p><h5>".$arrayb['prodName']."</h5>"; //display product name as contained in the array
						echo "</td>";
						echo "<td>";
						echo "<p><h5>".$arrayb['prodPrice']."</h5>"; //display product name as contained in the array
						echo "</td>";
						echo "<td>";
						echo "<p><h5>".$value."</h5>"; //display product name as contained in the array
						echo "</td>";
						echo "<td>";
						$subtotal=$arrayb['prodPrice']*$value;
						$total=$total+$subtotal;
						echo "<p><h5>".$subtotal."</h5>"; //display product name as contained in the array
						echo "</td>";
						echo "<td>";
						echo "<form action=wishlist.php method=post>";
						echo "<input type='submit' value='remove'>";
						//pass the product id to the same page wishlist.php as a hidden value
						echo "<input type=hidden name=hotelid value=".$key.">";
						echo "</form>";
						echo "</td>";
						echo "</tr>";
					}
				}
			}
		}else{
			$total=0;
			echo "wishlist empty<br>";
			echo "<table style='border: 0px'>";
			echo "<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th></th></tr>";
			echo "<tr><th colspan='3'>Total</th><td>$total</td><td></td></tr>";
			echo "</table>";
			echo "<br>";
			echo "New homteq customers: <a href=signup.php>signup</a><br><br>";
			echo "Returning homteq customers: <a href=login.php>login</a><br><br>";
		}
	}
} //include head layout
echo "</body>";
?>