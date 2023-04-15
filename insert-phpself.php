<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    require "connect.php";

    $rollno=$_POST["rollno"];
    $name=$_POST["name"];
    $fathername=$_POST["fathername"];
    $mothername=$_POST["mothername"];
    // var_dump($name,$city,$mobile);
    
    $sql="INSERT INTO `students` ( `rollno`,`name`,`fathername`,`mothername`) VALUES ('$rollno','$name','$fathername','$mothername')";
    
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

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="m-auto w-25">
<input type=text class="form-control my-3" name=rollno value="" placeholder="enter rollno here">
<input type=text class="form-control my-3" name=name value="" placeholder="enter name here">
<input type=text class="form-control my-3" name=fathername value="" placeholder="enter fathername here">
<input type=text class="form-control my-3" name=mothername value="" placeholder="enter mothername here">
<div>
<?php echo $message; ?>
</div>

<input type=submit value=submit class="my-4 btn btn-primary btn-lg">
<a href="show.php" type=button class="my-4 btn btn-primary btn-lg">Show</a>
</form>



</body>
</html>