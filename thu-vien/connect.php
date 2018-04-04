<?php

$servername = "us-cdbr-iron-east-05.cleardb.net";

$dbUsername = "be14239637f138";

$dbPassword = "5e72a852";

//$servername = "localhost";
//$dbUsername = "loc";
//$dbPassword = "12341234";


// Create connection

$conn = mysqli_connect($servername, $dbUsername, $dbPassword,'heroku_b22387717459097');

// Check connection

if (!$conn) {

	die("Connection failed: " . $conn->connect_error);

}

?>
