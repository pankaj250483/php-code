<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  
  require "auth.php";
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

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="m-auto w-25">
<input type=text class="form-control my-3" name=id value="" placeholder="enter id here">
<input type=text class="form-control my-3" name=name value="" placeholder="enter name here">
<input type=text class="form-control my-3" name=english value="" placeholder="enter english here">
<input type=text class="form-control my-3" name=math value="" placeholder="enter math here">
<input type=text class="form-control my-3" name=hindi value="" placeholder="enter hindi  here">
<input type=text class="form-control my-3" name=science value="" placeholder="enter science here">
<input type=text class="form-control my-3" name=punjabi value="" placeholder="enter punjabi here">
<input type=text class="form-control my-3" name=gk value="" placeholder="enter gk here">
<div>
<?php echo $message; ?>
</div>

<input type=submit value=submit class="my-4 btn btn-primary btn-lg">
<a href="show.php" type=button class="my-4 btn btn-primary btn-lg">Show</a>
<a href="search.php" type=button class="my-4 btn btn-primary btn-lg">Search</a>
</form>



</body>
</html>