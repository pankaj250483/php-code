<?php
// Initialize the session
     require "auth.php";
     require "connect.php";
     $username=$_POST['user'];
     $password=$_POST['password'];
     
$sql = "SELECT * FROM `user` WHERE `firstname`='$username' AND `password`='$password'";
        
$result = $conn->query($sql);

if ($result->num_rows > 0)
     {
      session_start();
      $row = $result->fetch_assoc();
      $_SESSION['id']=$row['id'];
      $_SESSION['firstname']=$row['firstname'];
      $_SESSION['address']=$row['address'];
      $_SESSION["loggedin"]=TRUE;
      echo "success";
     }
     else
     {
      echo "Fail to Login.".$conn->error;
     }
exit();
?>