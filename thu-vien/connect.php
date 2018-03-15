<?php

$servername = "db4free.net";

$dbUsername = "viplocpro";

$dbPassword = "passdbmysql";

//$servername = "localhost";
//$dbUsername = "loc";
//$dbPassword = "12341234";


// Create connection

$conn = mysqli_connect($servername, $dbUsername, $dbPassword,'galatek');

// Check connection

if (!$conn) {

	die("Connection failed: " . $conn->connect_error);

}

?>
