<?php
    // DATABASE CONNECTION SETUP
    include ('../setup/config/db_connect.php');
    // START SESSION TO TRACK USER LOGIN STATE
    session_start();

    // CHECK IF USER IS ALREADY LOGGED IN
    if (isset($_SESSION['UserID'])) {
        // PREVENT DOUBLE LOGIN - REDIRECT TO HOME IF ALREADY AUTHENTICATED
        echo '<script>
            alert("You are already logged in. Please log out before accessing another account.");
            window.location.href = "../HOMEPAGE/trackCriticHome.php";
            </script>';
        exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- RESPONSIVE DESIGN VIEWPORT CONFIGURATION -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- GOOGLE FONTS IMPORT FOR NUNITO FONT FAMILY -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
        <title>TrackCritic | Log In</title>
        <!-- FAVICON SETUP -->
        <link rel="icon" type="image/png" href="../trackCriticIcon.png">
        <!-- MAIN CSS STYLESHEET -->
        <link rel="stylesheet" href="../trackCritic.css">
        <!-- LOGIN PAGE SPECIFIC STYLING -->
        <link rel="stylesheet" href="trackCriticLogIn.css">
        <!-- JQUERY LIBRARY FROM CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
        <!-- MAIN JAVASCRIPT FILE -->
        <script src="../trackCritic.js"></script>
        <!-- LOGIN PAGE SPECIFIC JAVASCRIPT -->
        <script src="trackCriticLogIn.js"></script>

        <script>
            // WAIT FOR DOM TO BE FULLY LOADED
            $(document).ready(function() {
                // RESPONSIVE LOGO VISIBILITY FUNCTION
                function hideParts() {
                    // CHECK IF SCREEN WIDTH IS MOBILE/TABLET SIZE
                    if (window.innerWidth <= 925) {
                        // HIDE LOGO ON SMALLER SCREENS
                        $("#logo").hide();
                    } else {
                        // SHOW LOGO ON LARGER SCREENS
                        $("#logo").show();
                    }
                }

                // INITIAL CALL TO SET VISIBILITY ON PAGE LOAD
                hideParts();
                // LISTEN FOR WINDOW RESIZE EVENTS TO ADJUST LAYOUT
                $(window).on("resize", hideParts);
            });
        </script>
    </head>

    <body>
        <!-- MAIN LOGIN CONTAINER -->
        <div id="login">
            <!-- LOGO SECTION -->
            <div id="logo">
                <img id="bigLogoPreview" src="../trackCriticLogo.png" alt="TrackCritic Logo">
            </div>
            <!-- LOGIN FORM SUBMISSION TO USER_LOGIN.PHP -->
            <form action="../setup/user_login.php" method="post"> 
                <!-- MAIN TITLE AND TAGLINE -->
                <h1 class="loginheader"><i>TrackCritic</i></h1>
                <h4 class="loginheader">"Drop the Track, We'll Drop the Truth" 🎶📈</h4>
                <br>
                <!-- EMAIL/USERNAME INPUT FIELD -->
                <input type="text" class="username" placeholder="Email / Username" name="emailUsernameInput" required><br>
                <!-- PASSWORD INPUT FIELD -->
                <input type="password" class="password" placeholder="Password" name="passwordInput" required>
                <br>
                <!-- SUBMIT BUTTON FOR LOGIN -->
                <input type="submit" class="submit" value="Log In">
                <br>
                <!-- FORGOT PASSWORD LINK (CURRENTLY PLACEHOLDER) -->
                <span><a href="#" class="access"><small><i>Forgot Password?</i></small></a></span>
                <!-- SIGN UP LINK FOR NEW USERS -->
                <span><small>Don't have an account yet? <a href="../SIGNUP/trackCriticSignUp.php" class="access">Sign Up</a></small></span>
            </form>
        </div>

        <!-- PHOTO CREDITS FOR BACKGROUND IMAGE -->
        <div class="credits">
            Photo by <a href="https://unsplash.com/@chamooomile0?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash" target="_blank">
                Roman Melnychuk
            </a> on 
            <a href="https://unsplash.com/photos/brown-acoustic-guitar-beside-green-plant-j5I80kLda3c?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash" target="_blank">
                Unsplash
            </a>
        </div>
    </body>
</html>