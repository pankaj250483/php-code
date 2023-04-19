<?php

require "connect.php";

$id=$_POST["id"];
$name=$_POST["name"];
$english=$_POST["english"];
$math=$_POST["math"];
$hindi=$_POST["hindi"];
$science=$_POST["science"];
$punjabi=$_POST["punjabi"];
$gk=$_POST["gk"];
// var_dump($name,$city,$mobile);

$sql="INSERT INTO `computers` (`id`,`name`,`english`,`math`,`hindi`,`science`,`punjabi`,`gk`) VALUES ('$id','$name','$english','$math','$hindi','$science','$punjabi','$gk')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
  } else 
  {
    echo "Error: <br>" . $conn->error;
  }
  
  $conn->close();



?>