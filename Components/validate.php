<?php

if(isset($_POST["log-submit"]))
{
    $useremail = $_POST["email"];
    $pwd = $_POST["pass"];

    $dbhost = 'localhost';
    $dbUsername = 'root';
    $dbpassword = '';
    $dbname = 'Project_DB';

    //Creating Database connection
    $conn  = mysqli_connect($dbhost,$dbUsername,$dbpassword,$dbname);
    if (!$conn)
    {
        die('Connection Failed: '.mysqli_connect_error());
    }

    $sql = "SELECT * FROM CUSTOMER WHERE Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location:../login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $useremail);
    mysqli_stmt_execute($stmt);   

    $resultdata = mysqli_stmt_get_results($stmt);

    if($row = mysqli_fetch_assoc($resultdata))
    {
        $pwdhashed = $row["Pass"];
        $checkpass = password($pwd, $pwdhashed)
        if($checkpass === false)
        {
            header("location:../login.php?error=WrongLogin");
            exit();
        }
        else if($checkpass === true)
        {
            session_start();
            $_SESSION["Userid"] = $row["Cid"];
            header("location:../index.php");
            exit();
        }
    }
    else
    {
        header("location:../login.php?error=WrongLogin");
        exit();
    }
}

?>