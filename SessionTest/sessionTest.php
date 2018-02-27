<?php 
session_start();

$_SESSION["favcolor"]="green";
$_SESSION["favanimal"]="cat";
$_SESSION["name"]="Engin Bakır";
echo "Session variable are set.";
$_SESSION["name"]="231q";
?>
