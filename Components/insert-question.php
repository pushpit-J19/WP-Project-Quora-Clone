<?php
    $dbhost = 'localhost';
    $dbUsername = 'root';
    $dbpassword = '';
    
    //Creating Database connection
    $conn  = mysqli_connect($dbhost,$dbUsername,$dbpassword);
    if (!$conn){
        die('Connection Failed: '.mysqli_connect_error());
    }
    echo "Connected Successfully";
?>