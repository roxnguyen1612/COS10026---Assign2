<?php 
    session_start();    // start and get data
    if (isset($_SESSION["user"]) && (isset($_SESSION["pwd"]))){
        header("login.php");
        exit();
    }; 
?>