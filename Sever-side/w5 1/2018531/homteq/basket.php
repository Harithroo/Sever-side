<?php
session_start();
include("db.php");
$pagename="Smart Basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
if(isset($_POST["prodid"])) {
	$delprodid=$_POST["prodid"];
	unset($_SESSION['basket'][$delprodid]);
	echo "1 item removed <br>";
	if(count($_SESSION['basket'])<1){
		$total=0;
		echo "basket empty<br>";
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
		foreach ($_SESSION['basket'] as $key => $value) {
			$SQL="select prodId, prodName, prodPicNameSmall, prodPrice, prodDescripShort, prodDescripLong, prodQuantity from Product WHERE prodId=".$key.";";
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
				echo "<form action=basket.php method=post>";
				echo "<input type='submit' value='remove'>";
				//pass the product id to the same page basket.php as a hidden value
				echo "<input type=hidden name=prodid value=".$key.">";
				echo "</form>";
				echo "</td>";
				echo "</tr>";
			}
		}
		echo "<tr><th colspan='3'>Total</th><td>$total</td><td></td></tr>";
		echo "</table>";
		echo "<a href=clearbasket.php>clear</a><br><br>";
		echo "New homteq customers: <a href=signup.php>signup</a><br><br>";
		echo "Returning homteq customers: <a href=login.php>login</a><br><br>";
	}
}else{
	if(isset($_POST["h_prodid"])) {
		$newprodid=$_POST["h_prodid"];
		$reququantity=$_POST["p_Quantity"];
		//create a new cell in the basket session array. Index this cell with the new product id.
		//Inside the cell store the required product quantity
		$_SESSION['basket'][$newprodid]=$reququantity;
		//echo "<p>The doc id ".$newdocid." has been ".$_SESSION['basket'][$newdocid];
		echo "1 item added";
		if(isset($_SESSION['basket'])){
			$total=0;
			echo "<table style='border: 0px'>";
			echo "<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th></th></tr>";
			foreach ($_SESSION['basket'] as $key => $value) {
				$SQL="select prodId, prodName, prodPicNameSmall, prodPrice, prodDescripShort, prodDescripLong, prodQuantity from Product WHERE prodId=".$key.";";
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
					echo "<form action=basket.php method=post>";
					echo "<input type='submit' value='remove'>";
					//pass the product id to the same page basket.php as a hidden value
					echo "<input type=hidden name=prodid value=".$key.">";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
				}
			}
		}
		echo "<tr><th colspan='3'>Total</th><td>$total</td><td></td></tr>";
		echo "</table>";
		echo "<a href=clearbasket.php>clear</a><br><br>";
		echo "New homteq customers: <a href=signup.php>signup</a><br><br>";
		echo "Returning homteq customers: <a href=login.php>login</a><br><br>";
	}else{
		if(isset($_SESSION['basket'])){
			if(count($_SESSION['basket'])<1){
				$total=0;
				echo "basket empty<br>";
				echo "<table style='border: 0px'>";
				echo "<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th></tr>";
				echo "<tr><th colspan='3'>Total</th><td>$total</td></tr>";
				echo "</table>";
				echo "<br>";
				echo "New homteq customers: <a href=signup.php>signup</a><br><br>";
				echo "Returning homteq customers: <a href=login.php>login</a><br><br>";
			}else{
				echo "Current basket unchanged<br>";
				$total=0;
				echo "<table style='border: 0px'>";
				echo "<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th></th></tr>";
				foreach ($_SESSION['basket'] as $key => $value) {
					$SQL="select prodId, prodName, prodPicNameSmall, prodPrice, prodDescripShort, prodDescripLong, prodQuantity from Product WHERE prodId=".$key.";";
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
						echo "<form action=basket.php method=post>";
						echo "<input type='submit' value='remove'>";
						//pass the product id to the same page basket.php as a hidden value
						echo "<input type=hidden name=prodid value=".$key.">";
						echo "</form>";
						echo "</td>";
						echo "</tr>";
					}
				}
			}
		}else{
			$total=0;
			echo "basket empty<br>";
			echo "<table style='border: 0px'>";
			echo "<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th></th></tr>";
			echo "<tr><th colspan='3'>Total</th><td>$total</td><td></td></tr>";
			echo "</table>";
			echo "<br>";
			echo "New homteq customers: <a href=signup.php>signup</a><br><br>";
			echo "Returning homteq customers: <a href=login.php>login</a><br><br>";
		}
	}
}
include("footfile.html"); //include head layout
echo "</body>";
?>