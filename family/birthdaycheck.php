<?php

require_once("connect.php");

function get_next_birthday($birthday) {
    $date = new DateTime($birthday);
    $date->modify('+' . date('Y') - $date->format('Y') . ' years');
    if($date < new DateTime()) {
        $date->modify('+1 year');
    }

    return $date->format('Y-m-d');
}

$utype=$_SESSION["usertype"];
$uname=$_SESSION["username"];
$family=$_SESSION['family_username'];

$dt=new DateTime();
$sq1="SELECT * FROM user where family_username='$family'";
$result = $conn->query($sq1);


if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc()) 
    {
        echo "<br>";
        $nextdt=new DateTime(get_next_birthday($row["dob"]));
        $diff = $dt->diff($nextdt)->format("%r%a");
        if($diff<=2)
        {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "<i class='bi bi-gift-fill'></i> Up comming Birthday of $row[fullname] in next 2 days. <a href='gift.php' class='alert-link'>Send Gift</a>";
            echo "</div>";
        }
    }
}

?>