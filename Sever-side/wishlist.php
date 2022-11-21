<?php
session_start();
$hotels=["hilton","cinnamon grand","galle face","kingsbury"];
$pagename="Wishlist"; //Create and populate a variable called $pagename
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
if(isset($_POST["delhotelId"])) {
	$delhotelid=$_POST["delhotelId"];
	$delhotelName=$_SESSION['wishlist'][$delhotelid];	
	echo $delhotelName." hotel removed <br>";
	unset($_SESSION['wishlist'][$delhotelid]);
	if(count($_SESSION['wishlist'])==0){
		echo "wishlist empty<br>";
	}else{
		echo "hotel Name<br>";
			foreach ($_SESSION['wishlist'] as $key => $value) {
				echo $value."<br>";
			}
	}
}else{
	if(isset($_POST["hotelId"])) {
		$newhotelId=$_POST["hotelId"];
		//create a new cell in the wishlist session array. Index this cell with the new hotel id.
		//Inside the cell store the required hotel quantity
		$_SESSION['wishlist'][$newhotelId]=$hotels[$newhotelId];
		//echo "<p>The doc id ".$newdocid." has been ".$_SESSION['wishlist'][$newdocid];
		echo "1 hotel added<br>";
		if(isset($_SESSION['wishlist'])){
			echo "hotel Name<br>";
				foreach ($_SESSION['wishlist'] as $key => $value) {
					echo $value;
					echo "<form action=wishlist.php method=post>";
					echo "<input type='submit' value='remove'>";
					//pass the hotel id to the same page wishlist.php as a hidden value
					echo "<input type=hidden name=delhotelId value=".$key.">";
					echo "</form>";
				}
		}
		echo "<a href=clearwishlist.php>clear</a><br><br>";
	}else{
		if(isset($_SESSION['wishlist'])){
			if(count($_SESSION['wishlist'])<1){
				echo "wishlist empty<br>";
			}else{
				echo "Current wishlist unchanged<br>";
				echo "hotel Name <br>";
				foreach ($_SESSION['wishlist'] as $key => $value) {
					echo $value;
						echo "<form action=wishlist.php method=post>";
						echo "<input type='submit' value='remove'>";
						//pass the hotel id to the same page wishlist.php as a hidden value
						echo "<input type=hidden name=delhotelId value=".$key.">";
						echo "</form>";
				}
			}
		}else{
			echo "wishlist empty<br>";
		}
	}
}
echo "</body>";
?>