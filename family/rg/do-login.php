<?php

require "connect.php";

$user=$_POST["user"];
$password=$_POST["password"];

$sql = "SELECT * FROM `user` WHERE `firstname`='$user' AND password='$password'";
        
$result = $conn->query($sql);

if ($result->num_rows > 0)
     {
      session_start();
      $row = $result->fetch_assoc();
      $_SESSION['id']=$row['id'];
      $_SESSION['firstname']=$row['firstname'];
      $_SESSION["loggedin"]=TRUE;
      echo "success";

      header("location: home.php");
     }
     else
     {
      echo "<script> alert('Fail to Login.'); </script>";
      header("location: index.php");
     }
exit();



?>