<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if (isset($_SESSION['username'])) {
        echo " ";
    }
    else{
        echo "<script>alert('Please Login')</script>";
        echo "<script>location.href='./index.php';</script>";
    }
?>