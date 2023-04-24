<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['fullname']);
unset($_SESSION["loggedin"]);
session_destroy();
    header("location: login.php");
    exit;
?>