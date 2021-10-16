<?php

    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']==false){
        header('location: login.php');
    }else{
        session_unset();
        session_destroy();
        header('location: login.php');
    }
?>