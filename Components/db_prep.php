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


// Create database
$sql = "CREATE DATABASE if not exists Project_DB";

if (mysqli_query($conn, $sql)) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}

//Connecting to created database
mysqli_select_db($conn,"Project_DB");

//Create Tables
//Customer table missing DP
$sql = "CREATE TABLE if not exists CUSTOMER(
    Cid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    C_name VARCHAR(20) NOT NULL ,
    Email VARCHAR(40) UNIQUE NOT NULL,
    Pass VARCHAR(255) NOT NULL,
    works VARCHAR(40), 
    study VARCHAR(40), 
    lives VARCHAR(40),
    Joined Date,
    DP_name VARCHAR(255),
    Fav_cats VARCHAR(255)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table CUSTOMER created successfully";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }

//Question table missing Photo confirm Description
$sql = "CREATE TABLE if not exists QUESTION(
    Qid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Cid INT(6) UNSIGNED,
    Ques_desc TEXT,
    Asked_date DATE,
    Q_name VARCHAR(255) NOT NULL,
    Q_cat VARCHAR(255) NOT NULL,
    FOREIGN KEY (Cid) REFERENCES CUSTOMER(Cid)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table QUESTION created successfully";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }

//Answer table confirm Description
$sql = "CREATE TABLE if not exists ANSWER(
    Aid INT(6) UNSIGNED PRIMARY KEY,
    Qid INT(6) UNSIGNED,
    Cid INT(6) UNSIGNED,
    FOREIGN KEY (Cid) REFERENCES CUSTOMER(Cid),
    FOREIGN KEY (Qid) REFERENCES QUESTION(Qid) ON DELETE CASCADE ON UPDATE CASCADE,
    ans_body TEXT NOT NULL,
    Answered_date DATE
)";

if (mysqli_query($conn, $sql)) {
    echo "Table ANSWER created successfully";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }


//POST table missing Photo confirm Description
$sql = "CREATE TABLE if not exists POST(
    Pid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Cid INT(6) UNSIGNED,
    FOREIGN KEY (Cid) REFERENCES CUSTOMER(Cid) ON DELETE CASCADE ON UPDATE CASCADE,
    Post_desc TEXT,
    posted DATE,
    upvote INT(5),
    downvote INT(5),
    P_name VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table POST created successfully";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }



//Categories table
$sql = "CREATE TABLE if not exists CATEGORIES(
    Catid INT(6) PRIMARY KEY,
    Cat_name varchar(50),
    Cat_img varchar(256)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table categories created successfully";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }

$sql = "INSERT INTO CATEGORIES VALUES
        ('1','Python', '../Images/python.png'),
        ('2','Javascript', '../Images/js.png'),
        ('3','Java', '../Images/java.png'),
        ('4','PHP', '../Images/php.png');";
if (mysqli_query($conn, $sql)) {
  echo "Table categories filled successfully";
} else {
  echo "Error filling table: " . mysqli_error($conn);
}



mysqli_close($conn);
?>