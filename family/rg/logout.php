<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['firstname']);
unset($_SESSION["loggedin"]);
session_destroy();
    header("location: index.php");
    exit;
?>