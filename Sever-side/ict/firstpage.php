<?php
$pagename="FIRST PAGE";

echo "<html>";
echo "<head>";
echo "<title>My ".$pagename."</title>";
echo "<link rel=stylesheet type=text/css href=simplestyle.css>";
echo "</head>";

echo "<body>";
echo "<center>";
echo "<h1>YOUR FAVOURITE STORE</h1>";
echo "<hr>";
date_default_timezone_set("Europe/London"); // line
echo date ('l d F Y h:i:sa'); //a
echo "<br>London, UK";
echo "<hr>";
echo "<a href=prodindex.php>Product Index</a>";
echo "||<a href=basket.php>My Basket</a>";
echo "||<a href=clearbasket.php>Clear Basket</a>";
echo "<hr>";
echo "<h2>".$pagename."</h2>";

echo "<form method=post action=secondpage.php>" ;
echo "<table border=1>";
echo "<tr><td>Username</td>";
echo "<td><input type=text name=txtbx_usrn size=35></td></tr>";
echo "<tr><td>Password </td>";
echo "<td><input type=password name=txtbx_pwd size=35></td></tr>";
echo "<tr><td><input type=submit value='Login'></td>";
echo "<td><input type=reset value='Clear Form'></td></tr>";
echo "</table>";
echo "</form>" ;

echo "</center>";
echo "</body>";
echo "</html>";
?>
