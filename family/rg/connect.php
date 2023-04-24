<?php

$servername = "db4free.net";
$username = "dheeraj12";
$password = "pankaj@123";
$database = "dheeraj";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: ". mysqli_connect_error());
}
// else 
// echo "Connected successfully";
?>