<?php

//
$servername = "db4free.net";

//
$dbUsername = "viplocpro789";

//
$dbPassword = "kingqua000";

//$servername = "localhost";
//$dbUsername = "root";
//$dbPassword = "";


// Create connection

$conn = mysqli_connect($servername, $dbUsername, $dbPassword,'sale');

// Check connection

if (!$conn) {

	die("Connection failed: " . $conn->connect_error);

}

?>
