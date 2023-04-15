<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    require "connect.php";

    $search=$_POST["search"];
    
    $sql="SELECT * from `students` where `name` LIKE '%$search%' OR `fathername` LIKE '%$search%' OR `mothername` LIKE '%$search%'";

    $result=$conn->query($sql);
    
    echo "<table class='table table-striped'>".
         "<tr><th>rollno</th><th>Name</th><th>fathername</th><th>mothername</th><th></th></tr>";
    
    while($row = $result->fetch_assoc()) 
    {
        echo "<tr>".
             "<td>".$row['rollno']."</td>".
             "<td>".$row['name']."</td>".
             "<td>".$row['fathername']."</td>".
             "<td>".$row['mothername']."</td>".
             "<td> <a href='edit.php? rollno=".$row['rollno']."'>Edit Reccord</a></td>".
             "</tr>";
    }
        echo "</table>";
}

?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="m-auto w-25">
<input type=text class="form-control my-3" name=search value="" placeholder="enter name or fathername or mothername for search">
<div>
<?php echo $message; ?>
</div>

<input type=submit value=submit class="my-4 btn btn-primary btn-lg">
<a href="show.php" type=button class="my-4 btn btn-primary btn-lg">Show</a>
<a href="insert-phpself.php" type=button class="my-4 btn btn-primary btn-lg">Add New Record</a>
</form>



</body>
</html>