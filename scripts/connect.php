<?php
require("phpsqlajax_dbinfo.php");
$con=mysqli_connect($host, $username, $password); 
 mysqli_select_db($con,$database); 
 ?>