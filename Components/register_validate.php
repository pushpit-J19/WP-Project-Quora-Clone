<?php

if(isset($_POST["reg-finish"]))
{
    $uname = $_POST["new-name"];
    $newemail = $_POST["new-email"];
    $pwd = $_POST["new-pass"];

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

    $sql = "SELECT * FROM CUSTOMER WHERE Email = '$newemail'";
    if($result = mysqli_query($conn, $sql))
    { 
        if(mysqli_num_rows($result) == 0)
        { 
            $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
            $sql = 'INSERT INTO CUSTOMER (C_name, Email, Pass, Joined, DP_name) VALUES("'.$uname.'","'.$newemail.'","'.$hashedpwd.'","'.date("Y-m-d").'", "../Images/userdefault.png")';
            mysqli_query($conn, $sql);
            header("location:login.php");
        }
    }

    /*
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location:../login.php?error=stmtfailed");
        exit();
    }

    
    mysqli_stmt_bind_param($stmt, "s", $newemail);
    mysqli_stmt_execute($stmt);

    $resultdata = mysqli_stmt_get_results($stmt);

    mysqli_stmt_close($stmt);
    if($row = mysqli_fetch_assoc($resultdata))
    {
        header("location:../login.php?error=UserIDexists");
        exit();
    }
    else{
        $sql = 'INSERT INTO CUSTOMER (C_name, Email, Pass, Joined) VALUES(?,?,?);';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("location:../login.php?error=stmtfailed");
            exit();
        }

        $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
        
        mysqli_stmt_bind_param($stmt, "sss", $uname, $newemail, $hashedpwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location:../login.php?error=none");
        exit();
    }
    */
}