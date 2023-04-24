<?php
require "connect.php";
require "auth.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $id=$_POST["id"];
  $name=$_POST["name"];
  $english=$_POST["english"];
  $math=$_POST["math"];
  $hindi=$_POST["hindi"];
  $science=$_POST["science"];
  $punjabi=$_POST["punjabi"];
  $gk=$_POST["gk"];
    
    $sql="UPDATE `computers` SET `name`='$name',`english`='$english',`math`='$math',`hindi`='$hindi',`science`='$science',`punjabi`='$punjabi',`gk`='$gk' WHERE `id`='$id;";
    
    if ($conn->query($sql) === TRUE) {
        $message="<div class='alert alert-success'>Record Updated successfully.</div>";
      } else 
      {
        $message="<div class='alert alert-danger'>Error: <br>" . $conn->error."</div>";
      }
      $sr=$id;
}
else
{
$sr=intval($_GET["id"]);
}

$sql="SELECT * from `computers` where `id`='$sr';";
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
<label>id</label>
<input type=text class="form-control my-3" name=id value="<?php echo $row['id']; ?>" placeholder="enter id here" readonly>
<label>Name : </label>
<input type=text class="form-control my-3" name=name value="<?php echo $row['name']; ?>" placeholder="enter name here">
<label>english</label>
<input type=text class="form-control my-3" name=english value="<?php echo $row['english']; ?>" placeholder="enter english here">
<label>math</label>
<input type=text class="form-control my-3" name=math value="<?php echo $row['math']; ?>" placeholder="enter math here">
<label>hindi</label>
<input type=text class="form-control my-3" name=hindi value="<?php echo $row['hindi']; ?>" placeholder="enter hindi here">
<label>science</label>
<input type=text class="form-control my-3" name=science value="<?php echo $row['science']; ?>" placeholder="enter science here">
<label>punjabi</label>
<input type=text class="form-control my-3" name=punjabi value="<?php echo $row['punjabi']; ?>" placeholder="enter punjabi here">
<label>gk</label>
<input type=text class="form-control my-3" name=gk value="<?php echo $row['gk']; ?>" placeholder="enter gk here">
<div>
<?php echo $message; ?>
</div>

<input type=submit value="Update" class="my-4 btn btn-primary btn-lg">
<a href="show.php" type=button class="my-4 btn btn-primary btn-lg">Show</a>
</form>



</body>
</html>