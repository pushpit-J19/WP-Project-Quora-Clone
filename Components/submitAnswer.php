<?php 

session_start();
$dbhost = 'localhost';
$dbUsername = 'root';
$dbpassword = '';
$dbname = "Project_DB";

$conn = mysqli_connect($dbhost,$dbUsername,$dbpassword, $dbname);

if(isset($_POST['anssubmit'])){
    $anstext = $_POST['answerfield'];
    $qid = $_POST['qid'];
    $cid = 1; // $_SESSION['cid'];
    $date = date('Y-m-d');

    $ansInsertQuery = "INSERT INTO ANSWER (Qid, Cid, ans_body, Answered_date) VALUES ('$qid', '$cid', '$anstext', '$date')";
    mysqli_query($conn, $ansInsertQuery);   
}


header("location:question.php?id=$qid");



?>