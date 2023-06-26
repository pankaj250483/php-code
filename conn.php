
<?php

$servername = "localhost";
$username = "root";
$database = "geet_sharma";

// Create connection
$conn = mysqli_connect($servername, $username,"", $database);

// Check connection
if (!$conn) {
  die("Connection failed: ". mysqli_connect_error());
}
 else
 { 
 echo "Connected successfully";
 }
?>