<?php

    session_start();
    
    if(!isset($_SESSION['Cid']) || $_SESSION['Cid']==false){
        header('location: login.php');
    }
    
    
    $dbhost = 'localhost';
    $dbUsername = 'root';
    $dbpassword = '';
    $dbname = "Project_DB";

    $conn = mysqli_connect($dbhost,$dbUsername,$dbpassword, $dbname);
    $cid = $_SESSION['Cid'];
    $custQuery = "SELECT * FROM CUSTOMER WHERE Cid = '$cid'";

                                    
    $custTable = mysqli_query($conn, $custQuery);
    $row = mysqli_fetch_array($custTable);
    $cname = $row['C_name'];
    $joined = $row['Joined'];
    $DP_name = $row['DP_name'];


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
        <link rel="stylesheet" href="../CSS/index.css">
    </head>
    <body>
        <header>
            <?php require_once 'navbar.php' ?>
        </header>

        <main>
           
            <div class="container d-flex p-4">
                
                <!-- LEFT SIDE BAR -->
                <div class="col-md-2 d-flex flex-column justify-content-start" id="leftcol">
                    <button onclick="showques()" class="leftcolbtn my-1 py-2  text-muted rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                        Add question
                    </button>


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

                <!-- MIDDLE CONTENT -->
                <div class="col-md-7">
                    <div class="card p-2 mb-2" onclick="showques()">
                        <div class="d-flex flex-column">
                            <div class="m-1">
                                <?php echo "<img id='qcardavatar' name='qcardavatar' src='$DP_name'>" ?>
                                <span class="text-muted"><?php echo $cname; ?></span>
                            </div>
                            <span class="d-block font-weight-bold m-1 text-muted" id="quesHeading">What is your question ?</span>
                        </div>
                    </div>
                    <!-- QUESTIONS -->
                    <div class="card mb-2" id="qid">
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
                                Above are the Italian clowns and below is the king of them all. Silvio Berlusconi. Justin, got the gwap and swag(pun intended) Erdogan put an artist in jail for sharing this meme, so he has to be on this list. Someone who rubs puls
                                </span>
                            </div>
                            <img src="../Images/sachinpost.png" class="w-100">
                        </div>
                    </div>
                    
                    <div class="card mb-2" id="qid">
                        <div class="d-flex flex-column">
                            <div class="d-flex m-1 p-2 justify-content-between">
                                <div class="d-flex">
                                    <img id="qidAvatar" name="qidAvatar" class="postimg" src="../Images/userdefault.png">
                                    <div class="mx-2 d-flex flex-column">
                                        <span class="font-weight-bold postname h-50">Person name</span>  
                                        <span class="text-muted postdate  h-50">posted-on date so</span>  
                                    </div>
                                </div>
                                <form method="post" action="question.php"> <button id="qid" class="answerbtn">answer</button> </form>
                            </div>
                            <div class="px-2 pb-2">
                                <span class="postdesc">
                                Above are the Italian clowns and below is the king of them all. Silvio Berlusconi. Justin, got the gwap and swag(pun intended) Erdogan put an artist in jail for sharing this meme, so he has to be on this list. Someone who rubs puls
                                </span>
                            </div>
                            <img src="../Images/sachinpost.png" class="w-100">
                        </div>
                    </div>


                    <?php
                        $quesQuery = "SELECT * FROM QUESTION";
                        $quesTable = mysqli_query($conn, $quesQuery);
                        
                        if(mysqli_num_rows($quesTable) > 0){
                            while ($row = mysqli_fetch_array($quesTable)){
                                
                                $qid = $row['Qid'];
                                $qcid = $row['Cid'];
                                $Ques_desc = $row['Ques_desc'];
                                $Asked_date = $row['Asked_date'];
                                $Q_name = $row['Q_name'];
                                $Q_cat = $row['Q_cat'];

                                $cust = mysqli_query($conn, "SELECT * FROM CUSTOMER WHERE Cid = '$qcid'");
                                $cust = mysqli_fetch_array($cust);
                                $custName = $cust['C_name'];
                                $custImg = $cust['DP_name'];

                                if($Q_name == ""){
                                    echo
                                    "<div class='card mb-2' id='$qid-container'>
                                        <div class='d-flex flex-column'>
                                            <div class='d-flex m-1 p-2 justify-content-between'>
                                                <div class='d-flex'>
                                                    <img id='$qid-Avatar' name='$qid-Avatar' class='postimg' src='$custImg'>
                                                    <div class='mx-2 d-flex flex-column'>
                                                        <span class='font-weight-bold postname h-50'>$custName</span>  
                                                        <span class='text-muted postdate  h-50'>posted-on $Asked_date</span>  
                                                    </div>
                                                </div>
                                                <form method='post' action='question.php?id=$qid'> <button id='$qid' class='answerbtn p-2 px-4 rounded btn btn-primary'>Answer</button> </form>
                                            </div>
                                            <div class='px-2 pb-2'>
                                                <span class='postdesc'>
                                                    $Ques_desc
                                                </span>
                                            </div>
                                        </div>
                                    </div>"
                                ;
                                }else{
                                    echo
                                        "<div class='card mb-2' id='$qid-container'>
                                            <div class='d-flex flex-column'>
                                                <div class='d-flex m-1 p-2 justify-content-between'>
                                                    <div class='d-flex'>
                                                        <img id='$qid-Avatar' name='$qid-Avatar' class='postimg' src='$custImg'>
                                                        <div class='mx-2 d-flex flex-column'>
                                                            <span class='font-weight-bold postname h-50'>$custName</span>  
                                                            <span class='text-muted postdate  h-50'>posted-on $Asked_date</span>  
                                                        </div>
                                                    </div>
                                                    <form method='post' action='question.php?id=$qid'> <button id='$qid' class='answerbtn p-2 px-4 rounded btn btn-primary'>Answer</button> </form>
                                                </div>
                                                <div class='px-2 pb-2'>
                                                    <span class='postdesc'>
                                                        $Ques_desc
                                                    </span>
                                                </div>
                                                <img src='$Q_name' class='w-100'>
                                            </div>
                                        </div>"
                                    ;
                                }

                            }

                        }else{
                            echo "<br> no such row";
                        }
                    
                    
                    ?>
                    

                </div>



                <div class="col-md-3">
                    
                </div>
            </div>


        </main>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script>
            posts = document.getElementsByClassName("postdesc");
            for(var i=0; i<posts.length; i++){
                posts[i].onclick = function () {
                this.style['-webkit-line-clamp'] = 10000;
                //this.style['line-clamp'] = 'none';
            }
            }
            
        </script>

<?php mysqli_close($conn); ?>
    </body>
</html>