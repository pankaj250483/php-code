<?php


require_once("header.php");
require_once("nav.php");
require_once("connect.php");
// var_dump($_SESSION);

$uid=$_SESSION["userid"];
$utype=$_SESSION["usertype"];
$uname=$_SESSION["username"];
$family=$_SESSION['family_username'];

if($utype=="master" or $utype=="main")
{
    $q1="(SELECT `id` FROM `user` where `family_username`='$family')";
}
else
{
    $q1="(SELECT `id` FROM `user` where `username`='$uname')";
}

    $sq2="SELECT t.id,t.date,t.amount,t.biller,t.autopay,u.fullname,u.usertype FROM `transaction` as `t` left join `user` as `u` on t.user_id=u.id where t.user_id in ".$q1;

    $result = $conn->query($sq2);
    
    echo "<h1 class='text-center my-5'> Transanction Statment Made by Whole Family</h1>
        <table class='table text-center table-striped'>
          <tr>
          <th>Transaction ID</th>
          <th>Transaction Date</th>
          <th>Transaction Amount</th>
          <th>Paid For</th>
          <th>Autopay Option</th>
          <th>Transaction Done by User</th>
          <th>User Type</th>
          </tr>";

if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc()) 
    {
       // var_dump($row);
        echo "<tr>";
        foreach ($row as $value) 
        {
            echo "<td> $value </td>";
        }
        echo "</tr>";
    }
}

?>