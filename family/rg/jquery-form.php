
<?php

        echo "run".print_r($_POST);
        require "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST")

{
    $id =$_POST["emp_id"];
    $name =$_POST["emp_name"];
    $dob=$_POST["emp_dob"];
    $salary=$_POST["emp_salary"];
    $mobno=$_POST["emp_mob"];

    $sql="INSERT INTO `employee` (`id`,`employee name`,`dob`,`salary`,`mobileno`) VALUES ('$id','$name','$dob','$salary','$mobno')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        $message="<div class='alert alert-success'> created successfully. Last inserted ID is: " . $last_id."</div>";
      } else 
      {
        $message="<div class='alert alert-danger'>Error: <br>" . $conn->error."</div>";
      }
      
      $conn->close();
      echo $message;
}
?>