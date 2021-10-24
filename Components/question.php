<?php
    session_start();
    $url = $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params); 
    $qid =$params['id'];

?>

<?php
    /*
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']==false){
        header('location: login.php');
    }
    */
    
    $dbhost = 'localhost';
    $dbUsername = 'root';
    $dbpassword = '';
    $dbname = "Project_DB";

    $conn = mysqli_connect($dbhost,$dbUsername,$dbpassword, $dbname);
    
    // Question table data
    $quesQuery = "SELECT * FROM QUESTION WHERE Qid= '$qid'";
    $quesTable = mysqli_query($conn, $quesQuery);
    $question = mysqli_fetch_array($quesTable);

    // Customer table data
    $qcid = $question['Cid'];
    $qcustquery =   "SELECT * FROM CUSTOMER WHERE Cid= '$qcid'";
    $asker = mysqli_query($conn, $qcustquery);
    $asker = mysqli_fetch_array($asker);

    // Answer table data
    
    $ansQuery = "SELECT * FROM ANSWER WHERE Qid = '$qid'";
    $answers = mysqli_query($conn, $ansQuery);


?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Quora</title>
        <meta name="description" content="">
        <link rel="stylesheet" href="../CSS/questionPage.css">
    </head>
    <body>
        <header>
            <?php require_once 'navbar.php' ?>
        </header>

        <main class="container d-flex p-4">
           
            <div class="d-flex flex-column w-100" >
                
                <div class="jumbotron w-100">
                    <h1 class="display-4">Question</h1>
                    <p class="lead"><?php echo $asker['C_name']; ?></p>
                    <hr class="my-4">
                    <p style="font-size: larger;"><?php echo $question['Ques_desc']; ?>?</p>
                    <small class="text-muted">posted on <?php echo $question['Asked_date']; ?></small><br>
                    <small class="text-muted">Tags: <?php echo $question['Q_cat']; ?></small>
                </div>
                
                <div class="card p-3">
                    <span>Post your answer here</span>
                    <form method="post" action="submitAnswer.php">
                        <textarea name="answerfield" id="answerfield" rows="5" class="w-100 my-2 p-2" placeholder="Please explain your answer in detail..."></textarea>
                        <?php echo "<input name='qid' type='text' value='$qid' style='display:none;'>"; ?>
                        <div class="d-flex justify-content-end">
                            <input type="submit" id="anssubmit" name="anssubmit" class="btn btn-primary" value="answer">
                        </div>
                    <form>
                </div>
                

             



                <?php
                if(mysqli_num_rows($answers) > 0){
                    while($ans = mysqli_fetch_array($answers)){ 

                        $a_cid = $ans['Cid'];
                        $ans_body = $ans['ans_body'];
                        $ans_date = $ans['Answered_date'];

                        $ansCustQuery = "SELECT * FROM CUSTOMER WHERE Cid = '$a_cid'";
                        $ansCust = mysqli_query($conn, $ansCustQuery);
                        $ansCust = mysqli_fetch_array($ansCust);

                        $acustname = $ansCust['C_name'];
                        $acustdp = $ansCust['DP_name']; 
                        
                        echo "<div class='card my-1 p-3'>
                        <div class= 'd-flex flex-column'>
                            <div class='d-flex'>
                                <img src='$acustdp' width='36' height='36' class='rounded-circle m-1'>
                                <div class='d-flex flex-column mx-2'>
                                    <span class='text-muted'>$acustname</span>
                                    <small class='text-muted'>$ans_date</small>
                                </div>
                            </div>
                            <span class='my-2 mx-1'>
                                $ans_body
                            </span>
                        </div>
                    </div>";

                    }
                }else{
                    echo 
                    "
                    <div class='d-flex flex-column align-items-center w-100'>
                        <img src='../Images/postbox.png' style='width:15%' class='mt-5'>
                        <span id='empty-message' class='text-muted'>There are no answers yet for this question.<br> Be the first to answer!</span>
                    </div>"
                    ;
                }
                
                ?>

            </div>


        </main>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

 
            

<?php mysqli_close($conn); ?>
    </body>
</html>