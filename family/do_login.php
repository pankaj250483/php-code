<?php
// Initialize the session
     require "connect.php";
     $username=$_POST['user'];
     $password=$_POST['password'];
     
$sql = "SELECT * FROM `user` WHERE `username`='$username' AND password='$password'";
        
$result = $conn->query($sql);

if ($result->num_rows > 0)
     {
      session_start();
      $row = $result->fetch_assoc();
      $_SESSION['id']=$row['id'];
      $_SESSION['username']=$row['username'];
      $_SESSION['usertype']=$row['usertype'];
      $_SESSION['fullname']=$row['fullname'];
      $_SESSION['family_username']=$row['family_username'];
      $_SESSION["loggedin"]=TRUE;
      echo "success";
     }
     else
     {
      echo "Fail to Login.".$conn->error;
     }
exit();
?>