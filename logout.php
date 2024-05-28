<?php
//if the user clicked the logout button, the user will be "unset" to the current webpage, 
//then the user will be redirected to the login page.
session_start();
    unset($_SESSION['IS_LOGIN']);
    header('location:login.php');
    die();
?>