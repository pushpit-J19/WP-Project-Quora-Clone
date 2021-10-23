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
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Write answers</title>
        <meta name="description" content="">
        <link rel="stylesheet" href="../CSS/index.css">
    </head>
    <body>
        <header>
            <?php require_once 'navbar.php' ?>
        </header>

        <main>
           
            <div class="container d-flex p-4">
                <div class="col-md-2 d-flex flex-column justify-content-start" id="leftcol">
                   
                    <?php 

                        $categoriesQuery = "SELECT * FROM CATEGORIES";
                        
                        if($categoriestable = mysqli_query($conn, $categoriesQuery)){
                            if(mysqli_num_rows($categoriestable) > 0){
                                //echo "<br>whole table : <br>"; 
                                while ($row = mysqli_fetch_array($categoriestable)){
                                    $catName = $row['Cat_name'];
                                    $catImg = $row['Cat_img'];
                                    echo 
                                    "<button class='leftcolbtn my-1 py-2  text-muted rounded'>
                                        <img src='$catImg' alt='' width='20' height='20'>
                                        $catName
                                    </button>";
                                    
                                }
        
                            }else{
                                echo "<br> no such row";
                            }
                        }
        
                        

                    ?>

                </div>


                <div class="col-md-7">
                    
                    <?php 

                        $dbhost = 'localhost';
                        $dbUsername = 'root';
                        $dbpassword = '';
                        $dbname = "Project_DB";
                        $conn = mysqli_connect($dbhost,$dbUsername,$dbpassword, $dbname);

                        $questionsQuery = "SELECT * FROM QUESTION";
                        if($questions = mysqli_query($conn, $questionsQuery)){
                            if(mysqli_num_rows($questions) > 0){
                                $i = 0;
                                while ($row = mysqli_fetch_array($questions) && $i<3){
                                    $qid = $row['Qid'];
                                    $qdate = $row['Asked_date'];
                                    $cid = $row['Cid'];
                                    $desc = $row['Ques_desc'];

                                    $qcustQuery = "SELECT * FROM CUSTOMER WHERE Cid=$cid";
                                    $qcustomer = mysqli_fetch_array(mysqli_query($conn, $qcustQuery));
                                    $qcustname = $qcustomer["C_name"];
                                    $qcustdp = $qcustomer["DP_name"];
                                    if($qcustdp == ""){
                                        $qcustdp = "../Images/userdefault.png";
                                    }

                                    $avatarid = $qid.'Avatar';

                                    echo 
                                    "<div class='card mb-2' id='$qid'>
                                        <div class='d-flex flex-column'>
                                            <div class='d-flex m-1 p-2'>
                                                <img id='$avatarid' name='$avatarid' class='postimg' src='$qcustdp'>
                                                <div class='mx-2 d-flex flex-column'>
                                                    <span class='font-weight-bold postname h-50'>$qcustname</span>  
                                                    <span class='text-muted postdate  h-50'>posted-on $qdate</span>  
                                                </div>
                                            </div>
                                            <div class='px-2 pb-2'>
                                                <span class='postdesc'>
                                                    $desc
                                                </span>
                                            </div>
                                        </div>
                                    </div>"
                                    ;
                                    $i++;
                                    
                                }
        
                            }
                            else {
                                echo 
                                "<div class='row  w-100 py-2 d-flex flex-column align-items-center'>
                                    <img src='../Images/postbox.png' style='width:15%' class='mt-5'>
                                    <span id='empty-message' class='text-muted'>There are no questions in the database. Try some other category or post a question!</span>
                                    <button id='showques' class='btn btn-primary mt-5' onclick='showques()' style='border-radius: 20px;'>Ask questions</button>
                                </div>"
                                ;
                            }
                        }
                        
                        
                    ?>
                    
                    <div class="card mb-2" id="qid2">
                        <div class="d-flex flex-column">
                            <div class="d-flex m-1 p-2">
                                <img id="qidAvatar" name="qidAvatar" class="postimg" src="../Images/userdefault.png">
                                <div class="mx-2 d-flex flex-column">
                                    <span class="font-weight-bold postname h-50">Person name</span>  
                                    <span class="text-muted postdate  h-50">posted-on date so</span>  
                                </div>
                            </div>
                            <div class="px-2 pb-2">
                                <span class="postdesc">
                                Above are the Italian clowns and below is the king of them all. Silvio Berlusconi. Justin, got the gwap and swag(pun intended) Erdogan put an artist in jail for sharing this meme, so he has to be on this list. Someone who rubs puls
                                </span>
                            </div>
                            <img src="../Images/sachinpost.png" class="w-100">
                        </div>
                    </div>
                    

                </div>



                <div class="col-md-3">
                    
                </div>
            </div>


        </main>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php mysqli_close($conn); ?>
    </body>
</html>