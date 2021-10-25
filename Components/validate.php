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

    $sql = "SELECT * FROM CUSTOMER WHERE Email = '$useremail';";
    if($result = mysqli_query($conn, $sql))
    {
        if(mysqli_num_rows($result) == 0)
        {
            header("location:../login.php?error=UidDoesn'tExist");
            echo "Nahi Hogaya Bhai";
        }
        else{
            $row = mysqli_fetch_array($result);
            $pwdhashed = $row["Pass"];
            $checkpass = password_verify($pwd, $pwdhashed);
            if($checkpass == false)
            {
                header("location:login.php?error=WrongLogin");
                echo "Bilkul Nahi Hogaya Bhai";
            }
            else if($checkpass === true)
            {
                session_start();
                $_SESSION["Cid"] = $row["Cid"];
                header("location:index.php");
                echo "Hogaya Bhai";
            }
        }
    }

/*   if($row = mysqli_fetch_assoc($resultdata))
    {
        $pwdhashed = $row["Pass"];
        $checkpass = password($pwd, $pwdhashed);
        if($checkpass === false)
        {
            header("location:../login.php?error=WrongLogin");
            exit();
        }
        else if($checkpass === true)
        {
            session_start();
            $_SESSION["Cid"] = $row["Cid"];
            header("location:../index.php");
            exit();
        }
    }
    else
    {
        header("location:../login.php?error=WrongLogin");
        exit();
    }
}*/
}
?>