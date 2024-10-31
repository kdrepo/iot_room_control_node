<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "logindata";
$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//mysql_select_db("logindata", $db);
//test for the connection

if(mysqli_connect_errno()) {
	die("Connection Failed" . 
		mysqli_connect_error() . " (" .mysqli_connect_errno() . ")"
	);
} else {
 //echo "Connection succus !!" ;

}
?>

<html>
<head></head>
<body></body>
</html>