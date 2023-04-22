<?php require "auth.php" ?>

<h1>Welcome @ Home Page </h1>

<h1>Welcome <?php echo $_SESSION['firstname']; ?>
Click here to <a href='logout.php'>Logout</a>
</h1>