<?php
require("phpsqlajax_dbinfo.php");
$con=mysqli_connect($host, $username, $password); 
	$createDB = "CREATE DATABASE IF NOT EXISTS ".$database;
	mysqli_query($conn,$createDB);
	mysqli_select_db($conn, $database);
 ?>
 ?>