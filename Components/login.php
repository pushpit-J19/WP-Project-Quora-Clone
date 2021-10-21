
<?php require_once 'db_prep.php' ?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quora - A place to share knowledge and better understand the world</title>
    <link rel="icon" href="../Images/quora.png" type="image/gif">
    <link rel="stylesheet" href="../CSS/login_style.css">
</head>
<body>
    <main>
        <div class="login-container">
            <div class="login-logo">
                <img src="../Images/quora-main.png" alt="quora">
            </div>
            <div class="login-desc">
                A place to share knowledge and better understand the world
            </div>
            <div class="login-metods">
                <table>
                    <tr>
                        <td>
                            <div class="left">
                                <div class="sign-opt">
                                    <img src="../Images/google-icon.png" alt="google">
                                    <span>Continue with Google</span>
                                </div>
                                <div class="sign-opt">
                                    <img src="../Images/fb-icon.png" alt="facebook">
                                    <span>Continue with Facebook</span>
                                </div>
                                
                                <input class="sign-up" type="button" value="Sign up with email" id="register" name="register">
                            
                                <hr class="left-divide">
                                <p class="agree">
                                    A Web programming project made by Aman Agrawal, Pushpit Jain and Rathin Nair. A clone for Quora.
                                </p>
                            </div>
                        </td>
                        <td>
                            <div class="right">
                                <p>Login</p>
                                <hr class="right-divide">
                                <form class="login-form">
                                    <label id="email-lab" for="email">Email</label>
                                    
                                    <input type="email" id="email" name="email" required placeholder="Your email">
                                    <div class="input-error">
                                        <!--Div for email errors-->
                                    </div>
                                    <label id="pass-lab" for="pass">Password</label>
                                    
                                    <input type="password" id="pass" name="pass" required placeholder="Your password">

                                    <input type="submit" id="log-submit" name="log-submit" value="Login">

                                    <a id="forgot" href="#">Forgot password?</a>
                                </form>
                            </div>
                        </td>
                    </tr>
                </table>
                <hr id="lang-divide">
                <a id="lang" href=#>हिन्दी <span>&nbsp;></span></a>
                <aside id="front-aside">
                    <ul>
                        <li>
                            <a href="https://www.quora.com/about">
                                About
                            </a>
                        </li>
                        <li>
                            <a href="https://www.quora.com/careers">
                                Careers
                            </a>
                        </li>
                        <li>
                            <a href="https://www.quora.com/about/privacy">
                                Privacy
                            </a>
                        </li>
                        <li>
                            <a href="https://www.quora.com/about/tos">
                                Terms
                            </a>
                        </li>
                        <li>
                            <a href="https://help.quora.com/hc/en-us/requests/new">
                                Contact
                        
                            </a>
                        </li>
                        <li>
                            <a href="https://www.quora.com/about/languages">
                                Languages
                  
                            </a>
                        </li>
                        <li>
                            <a href="https://www.quora.com/about/your_ad_choices">
                                Your Ad Choices
                            </a>
                        </li>
                        <li>
                            <a href="https://www.quora.com/press">
                                Press
                            </a>
                        </li>
                        <li>
                            © Quora, Inc. 2021
                        </li>
                    </ul>
                </aside>
            </div>
        </div>

        <div class="register-popup">
            <div class="register-form-container">
                <p class="close">&times;</p>
                <p id="reg-p">Sign up</p>
                <form class="register">
                    <label for="new-name">Name</label>
                    <input type="text" id="new-name" name="new-name" placeholder="What would you like to be called?" required>
                    <div class="name-error">
                       <!--Name error-->
                    </div>
                    <label for="new-email">Email</label>
                    <input type="email" id="new-email" name="new-email" placeholder="Your email" required>
                    <div class="email-error">
                        <!--Email error-->
                    </div>
                    <input type="button" value="Next" id="reg-next" name="reg-next">
                </form>
            </div>
        </div>

        <div class="pass-popup">
            <div class="pass-form-container">
                <p class="close-p">&times;</p>
                <p id="reg-p">Sign up</p>
                <form class="pass">
                    <label for="new-pass">Password</label>
                    <input type="password" id="new-pass" name="new-pass" required>
                    <div class="pass-error">
                        <!--Password error msg-->
                    </div>
                    <input type="button" value="Finish" id="reg-finish" name="reg-finish">
                </form>
            </div>
        </div>
    </main>

    <!--Javascript-->
    <script src="../JS/register.js"></script>
</body>
</html>