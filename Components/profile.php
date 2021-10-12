<!DOCTYPE html>

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

        <style>
            header{
                position : sticky;
                top : 0;
                z-index : 1000;
            }
        </style>

    </head>
    <body>
        <header>
            <?php include_once 'navbar.php' ?>
        </header>
        <main >
            <div class="container">
                <div class="d-flex flex-row" id="basicinfo">
                    
                    <div class="d-flex col-md-8">
                        <div class="d-flex col-md-4">
                            <img id="profileimg"src="../Images/person.jpg" alt="profile image" >
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex row">
                                <h1>Name Surn</h1>
                            </div>
                            <div class="d-flex row">
                                <p>6 followers</p>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-md-4" id="sidecredentialcontainer">
                        
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
                                <div class="d-flex row"><p>ascni</p></div>
                                <div class="d-flex row"><p>ascni</p></div>
                            </div>
                        </div>

                        <div class=" row">
                            <div class=" col">
                                <div class="d-flex row">
                                    <div>
                                        <h6>Knows about</h6>
                                        <button class="rounded-circle edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                        </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="d-flex row"><hr></div>
                                <div class="d-flex row"><p>ascni</p></div>
                                <div class="d-flex row"><p>ascni</p></div>
                            </div>
                        </div>

                       
                       
                    </div>


                </div>
            </div>
        </main>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>