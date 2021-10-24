<?php 

    
    session_start();
    /*if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']==false){
        header('location: login.php');
    }
    */

    $dbhost = 'localhost';
    $dbUsername = 'root';
    $dbpassword = '';
    $dbname = "Project_DB";
    $conn = mysqli_connect($dbhost,$dbUsername,$dbpassword, $dbname);

    function answers(){
        echo 
        "<img src='../Images/postbox.png' style='width:15%' class='mt-5'><span id='empty-message' class='text-muted'>You haven't answered any questions yet.</span><button id='activitybtn'class='btn btn-primary mt-5' onclick='gotoHome()' style='border-radius: 20px;'>Answer questions</button>"
        ;
    }

    function question() {

        

        $cid = 1; //  $_SESSION['cid'];
        $quesQuery = "SELECT * FROM QUESTION WHERE Cid = $cid";
        if($questions = mysqli_query($conn, $questionsQuery)){
            if(mysqli_num_rows($questions) > 0){
                while ($row = mysqli_fetch_array($questions)){
                    $desc = $row['Ques_desc'];
                    echo
                        "<div class='card'>
                            $desc
                        </div>"
                    ;
                }
            }else{
                echo 
                "<img src='../Images/postbox.png' style='width:15%' class='mt-5'><span id='empty-message' class='text-muted'>You haven't asked any questions yet.</span><button id='activitybtn'class='btn btn-primary mt-5' onclick='showques()' style='border-radius: 20px;'>Ask questions</button>"
                ;
            }
        } 

        mysqli_close($conn);
        
    }

    $dbhost = 'localhost';
    $dbUsername = 'root';
    $dbpassword = '';
    $dbname = "Project_DB";

    $conn = mysqli_connect($dbhost,$dbUsername,$dbpassword, $dbname);
    $cid = 1; //$_SESSION['cid'];
    $custQuery = "SELECT * FROM CUSTOMER WHERE Cid = '$cid'";

                                    
    $categoriestable = mysqli_query($conn, $custQuery);
    $row = mysqli_fetch_array($categoriestable);
    $cname = $row['C_name'];
    $works = $row['works'] != "" ? $row['works'] : "NA" ;
    $study = $row['study'] != "" ? $row['study'] : "NA" ;
    $lives = $row['lives'] != "" ? $row['lives'] : "NA" ;
    $joined = $row['Joined'];
    $DP_name = $row['DP_name'];
    $categories = $row['Fav_cats'];
    

    
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title></title>
        <meta name="description" content="">
        <link rel="stylesheet" href="../CSS/profile.css">


    </head>
    <body>
        <header>
            <?php require_once 'navbar.php' ?>
        </header>
        <main >
            <div class="container d-flex" id="basicinfo">
                    
                <div class="d-flex col-md-8 flex-column">           <!-- Left region -->
                    
                    <!-- DP and Name -->
                    <div class="row  w-100">
                        <div class="d-flex flex-column col-md-4"> 
                            <?php echo "<img id='profileimg' src='$DP_name' alt='profile image'>"; ?>
                            <div id="profileoverlay" class="justify-content-center align-items-center" onclick="changeavt()">
                                <div id="profileedit" class="bg-primary rounded-circle py-2 px-3">
                                    <svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </div>
                            </div>
                            <form action="changeDp.php" method="post" id="form" enctype="multipart/form-data">
                                <input type="file" name="profilepicfield" id="profilepicfield" >
                                <input type="submit" name="submit" id="changeprofile">
                            </form>

                        </div>
                        <div class="col-md-8 p-4">
                            <div class="d-flex row">
                                <?php echo "<h3>$cname</h3>"; ?>
                            </div>
                            
                        </div>
                    </div>
                
                    <!-- Ques and Ans list -->
                    <div class="row  w-100  mt-4 border-bottom">
                        <div class="d-flex justify-content-start w-100">
                            <div style="font-size:small; color: #A82400; font-weight: bold" class="single-tab p-2" onclick="changeTabs(this)">Questions</div> <!-- add class text muted when not in use -->
                            <div style="font-size:small; color: #A82400;" class="single-tab p-2 text-muted"  onclick="changeTabs(this)">Answers</div>
                        </div>
                    </div>
                    
                    <div class="row  w-100 py-2 border-bottom" id="tabtitle">
                        Questions
                    </div>

                    <div class="row  w-100 py-2 d-flex flex-column align-items-center" id="tabcontent">
                        <!--- if no data in this tab then this-->

                    <img src='../Images/postbox.png' style='width:15%' class='mt-5'>
                    <span id='empty-message' class='text-muted'>You haven't asked any questions yet.</span>
                    <button id='activitybtn'class='btn btn-primary mt-5' onclick='showques()' style='border-radius: 20px;'>Ask questions</button>
                        

                        <!-- else -->
                    </div>
                
                </div>

                <div class="col-md-4" id="sidecredentialcontainer">
                    
                    <!--general info details-->
                    <div class=" row">
                        <div class=" col">
                            <div class="d-flex row">
                                <div>
                                    <h6>Credentials & Highlights</h6>
                                    <button class="rounded-circle edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="d-flex row"><hr></div>
                            
                            <div class="d-flex row">
                                <span style="border-radius:50%; background-color:#eee;" class="px-1 mr-2 my-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                                <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" fill="#000"/>
                                <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" fill="#000"/>
                                </svg> </span>
                                works at 
                                <?php echo "a $works"; ?> 
                            </div>
                            <div class="d-flex row">
                                <span style="border-radius:50%; background-color:#eee;" class="px-1 mr-2 my-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                                </svg> </span>
                                Studied at <?php echo " $study"; ?>
                            </div>
                            <div class="d-flex row">
                                <span style="border-radius:50%; background-color:#eee;" class="px-1 mr-2 my-1"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                                </svg> </span>
                                Lives at <?php echo " $lives"; ?>
                            </div>
                            <div class="d-flex row">
                                <span style="border-radius:50%; background-color:#eee;" class="px-1 mr-2 my-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                </svg> </span>
                                Joined at <?php echo " $joined"; ?>
                            </div>
                        </div>
                    </div>

                    <!-- category details -->
                    <div class=" row">
                        <div class=" col">
                            <div class="d-flex row">
                                <div>
                                    <h6>Knows about</h6>
                                    <button class="rounded-circle edit">
                                </div>
                            </div>
                            <div class="d-flex row"><hr></div>
                            <div class="d-flex row">
                                
                                <?php
                                
                                    if($categories != ""){
                                        $categories = explode(" ",$categories);
                                        foreach($categories as $cat){
                                            $img = "../Images/".strtolower($cat).".png" ;
                                            echo 
                                            "
                                            <div class='d-flex m-1 p-2 w-100'>
                                                <img class='categories my-1' src='$img'>
                                                <div class='mx-2 d-flex flex-column'>
                                                    <span class='font-weight-bold catname h-50 my-0'>$cat</span>  
                                                </div>
                                            </div>
                                            ";
                                        }
                                    }else{
                                        echo  "<br><span class=' catname h-50 my-0'>No categories selected</span>";
                                    }
    
                                ?>
                            </div>
                        </div>
                    </div>

                    
                    
                </div>


            </div>
        </main>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!--         <script src="../JS/profile.js">
        </script> -->
        <script>

            function changeTabs(elem) {
                
                var tabs = document.getElementsByClassName("single-tab");
            
                for(var j=0; j<tabs.length; j++){
                tabs[j].classList.add("text-muted");
                tabs[j].style.fontWeight = "normal";
                }
                elem.classList.remove("text-muted");
                elem.style.fontWeight = "bold";
                document.getElementById("tabtitle").innerHTML = elem.innerHTML;
                if(elem.innerHTML == "Questions"){
                    document.getElementById("empty-message").innerHTML = "You haven't asked any questions yet.";
                    document.getElementById("activitybtn").onclick = showques;
                    document.getElementById("activitybtn").innerHTML = "Ask questions";
                    var result ="<?php question(); ?>";
                    document.getElementById("tabcontent").innerHTML = result;
                }
                else if(elem.innerHTML == "Answers"){
                    document.getElementById("empty-message").innerHTML = "You haven't answered any questions yet.";
                    document.getElementById("activitybtn").onclick = gotoHome;
                    document.getElementById("activitybtn").innerHTML = "Answer questions";
                    var result ="<?php answers(); ?>";
                    document.getElementById("tabcontent").innerHTML = result;
                }
                
            }
            
            function changeavt(){
                document.getElementById("profilepicfield").click();
            }
            function gotoHome(){
                window.location.href = "answer.php";
            }
            function gotoAnswers(){
                window.location.href = "index.php";
            }
            
            document.getElementById("profilepicfield").onchange = function() {
                console.log("h1");
                document.getElementById("changeprofile").click();
                console.log("h1");
            };
        </script>


    </body>
</html>

<?php mysqli_close($conn); ?>
