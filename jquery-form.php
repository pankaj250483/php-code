<?php

echo "run".print_r($_POST);
return;
  require "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  
 
  

    $id=$_POST["st id"];
    $name=$_POST["st_name"];
    $english=$_POST["st_english"];
    $math=$_POST["st_math"];
    $hindi=$_POST["st_hindi"];
    $science=$_POST["st_science"];
    $punjabi=$_POST["st_punjabi"];
    $gk=$_POST["st_gk"];
    // var_dump($name,$city,$mobile);
    
    $sql="INSERT INTO `computers` ( `id`,`name`,`english`,`math`,`hindi`,`science`,`punjabi`,`gk`) VALUES ('$id','$name','$english','$math','$hindi','$science','$punjabi','$gk')";
    
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        $message="<div class='alert alert-success'>New record created successfully. Last inserted ID is: " . $last_id."</div>";
      } else 
      {
        $message="<div class='alert alert-danger'>Error: <br>" . $conn->error."</div>";
      }
      
      $conn->close();
}

?>