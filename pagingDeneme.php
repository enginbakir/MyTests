<html>

<head>
	<title>Paging Using PHP</title>
</head>

<body>
	<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '12345678';

	$rec_limit = 10;
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);

	if(! $conn ) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('albatros');

	/* Get total number of records */
	$sql = "SELECT student_PK FROM student ";
	$retval = mysql_query( $sql, $conn );

	///////////////////////////////////

	$num_rows = mysql_num_rows($retval);

	$num_pages = (int) ($num_rows / 10);

	if(($num_rows / 10) > $num_pages)
		$num_pages ++;

	echo "<br>Number of rows :".$num_rows."<br><br>";
	echo "<br>Number of pages :".$num_pages."<br><br>";

	///////////////////////////////////

	if(! $retval ) {
		die('Could not get data: ' . mysql_error());
	}
	$row = mysql_fetch_array($retval, MYSQL_NUM );
	$rec_count = $row[0];

	echo "<br>".$rec_count."<br><br>";

	echo "<br>Page: ".$_GET['page']."<br><br>";

	if( isset($_GET['page'] ) ) {

		$page = $_GET['page'] + 1;
		$offset = $rec_limit * $page ;
	}else {
		$page = 0;
		$offset = 0;
	}

	$left_rec = $rec_count - ($page * $rec_limit);
	$sql = "SELECT student_PK, name, surname ". 
	"FROM student ".
	"LIMIT $offset, $rec_limit";
	$retval = mysql_query( $sql, $conn );

	if(! $retval ) {
		die('Could not get data: ' . mysql_error());
	}

	while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
		echo "Student ID :{$row['student_PK']}  <br> ".
		"Student NAME : {$row['name']} <br> ".
		"Student Surname : {$row['surname']} <br> ".
		"--------------------------------<br>";
	}

	if($page > $num_pages)
		$page = $num_pages;

	if( $page > 0 ) {
		$last = $page - 2;
		echo "Page: ".$page."<br>";
		echo "Last: ".$last."<br>";
		echo "<a href=".$_SERVER['PHP_SELF']."?page=".$last.">Last 10 Records</a> | ";
		echo "<a href=".$_SERVER['PHP_SELF']."?page=".$page.">Next 10 Records</a>";

            //echo "<a href=".$_SERVER['PHP_SELF']."?page=".$value." >engin</a>";
	}else if( $page == 0 ) {
		echo "Page: ".$page."<br>";
		echo "Last: ".$last."<br>";
		echo "<a href=".$_SERVER['PHP_SELF']."?page=".$page.">Next 10 Records</a>";
	}else if( $left_rec < $rec_limit ) {
		$last = $page - 2;
		echo "Page: ".$page."<br>";
		echo "Last: ".$last."<br>";
		echo "<a href=".$_SERVER['PHP_SELF']."?page=".$last.">Last 10 Records</a>";
	}

	mysql_close($conn);
	?>

</body>
</html>
