<?php
session_start();

// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
echo "<br>name ".$_SESSION["name"];
echo "<br><br>";
echo "session with print_r function. ";
print_r($_SESSION);
?>