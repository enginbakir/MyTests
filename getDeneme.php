<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php 

echo "<br>".$_GET["page"]."<br>";

$value =  23222;

echo "<br>".$value."<br><br>";


echo $_SERVER['PHP_SELF'] . '?page=awd'."wadcwa"; 
echo "<br><br>";

						//////// DO NOT DELETE THIS LINE ////////////

echo "<a href=".$_SERVER['PHP_SELF']."?page=".$value." id='add' >engin</a>";

						//////// DO NOT DELETE THIS LINE ////////////
echo "<br><br>";
?>


<!-- <a href=<?php echo $_SERVER['PHP_SELF'] . '?page=$value' ?> id="add" >23222</a> -->

</body>
</html>

 