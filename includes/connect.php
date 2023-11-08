<?php
    $conn=mysqli_connect('localhost','root','','kick_game');
    if(!$conn){
        die(mysqli_error($conn));
    }
?>