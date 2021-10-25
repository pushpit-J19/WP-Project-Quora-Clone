
<?php 


$dbhost = 'localhost';
$dbUsername = 'root';
$dbpassword = '';
$dbname = "Project_DB";

$conn = mysqli_connect($dbhost,$dbUsername,$dbpassword, $dbname);
$cid = $_SESSION['Cid'];
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



<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title></title>
        <meta name="description" content="">
        <link rel="stylesheet" href="../CSS/navbar.css">

        <link rel="stylesheet" href="../CSS/question.css">
      <!--   <script src="../JS/postQues.js"></script> -->

        

    </head>
    <body>

        <div class="navbar d-flex justify-content-center bg-white">
            <div class="navlogo">
                <img id="navlogoimg" src="../Images/logo.png" alt="Quora logo" height="30px" class="mr-3">
            </div>
            <div class="navicon grayicon" title="Home" id="home">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                </svg>
            </div>
            <div class="navicon grayicon" title="Answer" id="answer">
                <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
            </div>
            <div class="navicon grayicon" title="Notifications">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                </svg>
            </div>
            <div class="navsearch">
                <label for="navinput">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </label>
                <input id="navinput" type="text" placeholder="Search Quora">
            </div>

            <div class="navavatar">
               <?php echo "<img class='avatar' src='$DP_name'  onclick='showProfile()'>"; ?> 
            </div>
            <div class="navicon grayicon" title="Language">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                </svg>
            </div>
            <div class="navbutton">
                <button id="addquesbtn" type="button" class="btn btn-danger" onclick="showques()">Add question</button>
            </div>
        </div>

        <form action="logout.php" class="logout-btn" method="POST">
            <div id="profiledropdown" class="flex-column align-items-center">
                <div class="arrowup"></div>
                <div class="d-flex flex-column card p-2">
                    <div class="pointer d-flex pt-2 bg-white" onclick="window.location.href='profile.php'">
                        <div class="col-md-4">
                            <?php echo "<img class='avatar' src='$DP_name'  onclick='showProfile()'>"; ?>
                        </div>
                        <div class="col-md-8">
                            <span style="font-size: larger; font-weight:bolder; position:relative; top:10%; left: -15%"><?php echo $cname; ?></span>
                        </div>
                    </div> <hr>
                    <div class="pointer">
                        <button id="logout" class="text-muted bg-transparent border-0 w-100 text-left">Logout</button>
                    </div><hr>
                    <div>
                        About Careers.Terms.Privacy.Acceptable.Use Businesses.Press.Your Ad Choices
                    </div>
                </div>
            </div>
        </form>

        <form action="insert-question.php" class="submit_question" method="POST" enctype="multipart/form-data">
            <section id="question-section">
            <div class="overlay">
            </div>
            <div id="question-card-container">
                <div class="qcardcontainer">
                    <div class="qcard" id="qcard">

                        <div class="qcardheader d-flex">
                            <div id="closebutton" class="col-md-1" onclick="hideques()">
                                <button class="close" id="qcardclose">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="col-md-11 d-flex justify-content-center">
                                <select id="qtype" name="qtype">
                                    <option>Add Question</option>
                                    <option>Share link</option>
                                </select>
                            </div>
                        </div>

                        <div class="qcardbody">
                            <div class="qcardinfo d-flex">
                            <?php echo "<img src='$DP_name' id='qcardavatar' name='qcardavatar' onclick='showProfile()'>"; ?> 
                                <span><?php echo $cname; ?></span>
                                <span>&nbspasked</span>
                            </div>
                            <div class="qcardques d-flex">
                                <textarea placeholder="Start your question with What, Why, How etc." id="quesfield" name="quesfield"></textarea>
                            </div>
                            <span id="quesError">Please fill this field first</span>

                        </div>

                        <div class="qcardfooter d-flex justify-content-between">
                            <div> 
                                <button type="button" class="btn bg-light text-muted" id="quesphotobtn">Add photo</button>
                                <span class="text-muted" id="qname-msg" style="font-size: x-small;"></span>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button id="qcancel" onclick="hideques()">cancel</button>
                                <button type="button" id="qnext" name="qnext" class="btn btn-primary" onclick="showCat()">Add Question</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </section>

        <input type="file" name="q_name" id="q_name">
        <section id="question-categories">
            <div id="question-cat-container">
                <div class="qcardcontainer">
                    <div class="qcard" id="catcard">
                            
                        <div class="qcardheader d-flex">
                            <div id="qback" class="col-md-1" onclick="document.getElementById('question-categories').style.display = 'none'">
                                <button class="close" id="qcardback">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                </svg>
                                </button>
                            </div>
                            <div class="col-md-11 d-flex justify-content-center">
                                Select categories
                            </div>
                        </div>

                        <div class="qcardbody">
                            <div class="qcardinfo d-flex">
                            <?php echo "<img src='$DP_name' id='qcardavatar' name='qcardavatar' onclick='showProfile()'>"; ?> 
                            
                                <span><?php echo $cname?></span>
                                <span>&nbspasked</span>
                            </div>
                            <div class="qcardques d-flex flex-column">
                                <span class="py-2">Choose the categories of your question for better and quicker answers</span>
                                
                                <?php 
                                    $dbhost = 'localhost';
                                    $dbUsername = 'root';
                                    $dbpassword = '';
                                    $dbname = "Project_DB";
                                    $conne = mysqli_connect($dbhost,$dbUsername,$dbpassword, $dbname);
                                    
                                    $categoriesQuery = "SELECT * FROM CATEGORIES";
                                    if($categoriestable = mysqli_query($conne, $categoriesQuery)){
                                        if(mysqli_num_rows($categoriestable) > 0){
                                            while ($row = mysqli_fetch_array($categoriestable)){
                                                $catName = $row['Cat_name'];
                                                echo 
                                                "<div class='form-check form-switch py-1'>
                                                    <input class='form-check-input' type='checkbox' id='$catName' name='cat_check[]' value='$catName'>
                                                    <label class='form-check-label' for='$catName'>$catName</label>
                                                </div>";
                                                
                                            }
                    
                                        }
                                    }
                                    mysqli_close($conne);
                                ?>
                            </div>
                        </div>

                        <div class="qcardfooter">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button id="qcancel" onclick="hideques()">cancel</button>
                                <button id="submit" name="submit" class="btn btn-primary">Add Question</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </section>
        </form>
        



        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script>
            
            navicons = document.getElementsByClassName("navicon");
            for (let i=0; i<navicons.length; i++){
                navicons[i].onclick = function() {
                    for (let j=0; j<navicons.length; j++){
                        navicons[j].classList.add("grayicon");
                        navicons[j].classList.remove("activenavicon");
                        // console.log(navicons[j]);
                    }
                    // console.log(i);
                    this.classList.add("activenavicon");
                }
            }
        </script>

        <script>
            
            // document.getElementById("addquesbtn").onclick = function () {
            function showques() {
                document.getElementById("question-section").style.display = "inline";
                document.getElementById("quesfield").focus();
            }
            function showCat() {
                if (document.getElementById("quesfield").value == ""){
                    document.getElementById("quesError").style.display = "flex";
                }else{
                    document.getElementById('question-categories').style.display ='inline';
                    document.getElementById("quesError").style.display = "none";
                }
            }
            document.getElementById("quesfield").onkeyup = function (){
                if (document.getElementById("quesfield").value != "")
                    document.getElementById("quesError").style.display = "none";
            }

            function hideques() {
                document.getElementById("question-section").style.display = "none";
                document.getElementById("quesfield").value = "" ;
                document.getElementById("quesfield").style.height = "26px" ;
                document.getElementById("question-categories").style.display = "none";
                checks = document.getElementsByClassName("form-check-input");
                for(var i=0; i<checks.length; i++){
                    checks[i].checked = false;
                }   
            }

            window.addEventListener('mouseup',function(event){
                
                qcard = document.getElementById("qcard");
                catcard = document.getElementById("catcard");
                section = document.getElementById("question-section");
                catsection = document.getElementById("question-categories");
                if(section.style.display == "inline"){
                    if(catsection.style.display == "inline"||catsection.style.display == "block")
                    {    if( event.target != catcard  && event.target.parentNode != catcard && event.target.parentNode.parentNode != catcard && event.target.parentNode.parentNode.parentNode != catcard && event.target.parentNode.parentNode.parentNode.parentNode != catcard && event.target.parentNode.parentNode.parentNode.parentNode.parentNode != catcard )
                        {
                            hideques();
                            //console.log(event.target, "a");
                        }
                    }
                    else if( event.target != qcard  && event.target.parentNode != qcard && event.target.parentNode.parentNode != qcard && event.target.parentNode.parentNode.parentNode != qcard )
                    {
                        hideques();
                        //console.log(event.target, "b");
                    }
                }
            });

            document.getElementById("quesfield").onkeydown = function(){ //textAreaAdjust
                console.log("here");
                elem = document.getElementById("quesfield");
                elem.style.height = (elem.scrollHeight)+"px";
            }

            function showProfile() {
                document.getElementById("profiledropdown").style.display = "flex";
            }
            window.addEventListener('mouseup',function(event){
                
                profilecard = document.getElementById("profiledropdown")
                
                if(profilecard.style.display == "flex" && event.target != profilecard){
                    profilecard.style.display = "none";
                }
            });

            

            document.getElementById("home").onclick = function() {
                window.location.href = "index.php";
            };
            document.getElementById("answer").onclick = function() {
                window.location.href = "index.php";
            };


            document.getElementById("quesphotobtn").onclick = function(){
                document.getElementById("q_name").click();
            }
            document.getElementById("q_name").onchange = function(){
                document.getElementById("qname-msg").innerText = document.getElementById("q_name").value;
            }

        </script>
    </body>
<!-- </html> -->

<!--
#A82400 and #801B00 
The top bar, various boxes, question answer box are all #EAEAEA

-->