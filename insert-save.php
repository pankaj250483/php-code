<?php

require "connect.php";

$rollno=$_POST["rollno"];
$name=$_POST["name"];
$fathername=$_POST["fathername"];
$mothername=$_POST["mothername"];
// var_dump($name,$city,$mobile);

$sql="INSERT INTO `students` (`rollno`,`name`,`fathername`,`mothername`) VALUES ('$rollno','$name','$fathername','$mothername')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
  } else 
  {
    echo "Error: <br>" . $conn->error;
  }
  
  $conn->close();



?>