<?php

require "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
  

    $search=$_POST["search"];
    
    $sql="SELECT * from `computers` where `name` LIKE '%$search%'";

    $result=$conn->query($sql);
    
    echo "<table class='table table-striped'>".
         "<tr><th>id</th><th>Name</th><th>english</th><th>math</th><th>hindi</th><th>science</th><th>punjabi</th><th>gk</th></tr>";
    
    while($row = $result->fetch_assoc()) 
    {
        echo "<tr>".
             "<td>".$row['id']."</td>".
             "<td>".$row['name']."</td>".
             "<td>".$row['english']."</td>".
             "<td>".$row['math']."</td>".
             "<td>".$row['hindi']."</td>".
             "<td>".$row['science']."</td>".
             "<td>".$row['punjabi']."</td>".
             "<td>".$row['gk']."</td>".
             "<td> <a href='edit.php? id=".$row['id']."'>Edit Reccord</a></td>".
             "</tr>";
    }
        echo "</table>";
}

?>
