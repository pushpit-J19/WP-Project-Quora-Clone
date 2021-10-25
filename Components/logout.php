<?php

    session_start();
    if(!isset($_SESSION['Cid']) || $_SESSION['Cid']==false){
        header('location: login.php');
    }else{
        session_unset();
        session_destroy();
        header('location: login.php');
    }
?>