<?php
echo "<form action=wishlist.php method=post>";
$hotels=["hilton","cinnamon grand","galle face","kingsbury"];

echo "<select name=hotelId>";
for ($x = 0; $x <= count($hotels); $x++) {
echo "<option value=$x>$hotels[$x]</option>";
}
echo "</select>";
echo "<input type=submit value='ADD TO WISHLIST'>";

//pass the product id to the next page basket.php as a hidden value
echo "</form>";
echo "</body>";
?>