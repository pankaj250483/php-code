<?php
require "connect.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $scholarID=$_POST["scholarID"];
    $name=$_POST["name"];
    $city=$_POST["city"];
    $mobile=$_POST["mobile"];
    
    $sql="UPDATE `personal` SET `name`='$name',`city`='$city',`mobile`='$mobile' WHERE `scholarID`='$scholarID';";
    
    if ($conn->query($sql) === TRUE) {
        $message="<div class='alert alert-success'>Record Updated successfully.</div>";
      } else 
      {
        $message="<div class='alert alert-danger'>Error: <br>" . $conn->error."</div>";
      }
      $sr=$scholarID;
}
else
{
$sr=intval($_GET["sch_id"]);
}

$sql="SELECT * from `personal` where `scholarID`='$sr';";
$result=$conn->query($sql);
$row = $result->fetch_assoc();

$conn->close();
?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="m-auto w-25">
<label>Schholar ID</label>
<input type=text class="form-control my-3" name=scholarID value="<?php echo $row['scholarID']; ?>" placeholder="enter name here" readonly>
<label>Name : </label>
<input type=text class="form-control my-3" name=name value="<?php echo $row['name']; ?>" placeholder="enter name here">
<label>City</label>
<input type=text class="form-control my-3" name=city value="<?php echo $row['city']; ?>" placeholder="enter city here">
<label>Mobile</label>
<input type=text class="form-control my-3" name=mobile value="<?php echo $row['mobile']; ?>" placeholder="enter mobile here">
<div>
<?php echo $message; ?>
</div>

<input type=submit value="Update" class="my-4 btn btn-primary btn-lg">
<a href="show.php" type=button class="my-4 btn btn-primary btn-lg">Show</a>
</form>



</body>
</html>