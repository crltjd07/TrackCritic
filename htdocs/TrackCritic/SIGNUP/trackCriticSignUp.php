<?php
    /* DATABASE CONNECTION SETUP */
    include ('../setup/config/db_connect.php');
    /* START USER SESSION MANAGEMENT */
    session_start();

    /* CHECK IF USER IS ALREADY LOGGED IN - PREVENT DUPLICATE ACCOUNTS */
    if (isset($_SESSION['UserID'])) {
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
        <title>TrackCritic | Sign Up</title>
        <link rel="icon" type="image/png" href="../trackCriticIcon.png">
        <link rel="stylesheet" href="../trackCritic.css">
        <link rel="stylesheet" href="trackCriticSignUp.css">
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.1.min.js"></script>
        <script src="../trackCritic.js"></script>

        <script>
            $(document).ready(function() {
            /* CREATE SMALL SCREEN WARNING ELEMENT */
            const warning = document.createElement("h1");
            warning.id = "smallScreenWarning";
            warning.textContent = "Your screen is too small to sign up. Please use a larger device or window.";
            /* APPEND WARNING TO DOCUMENT BODY */
            document.body.appendChild(warning);

            /* RESPONSIVE DESIGN FUNCTION - HANDLES SCREEN SIZE ADAPTATIONS */
            function hideParts() {
                /* MEDIUM SCREEN BREAKPOINT - HIDE WELCOME SECTION AND ADJUST LAYOUT */
            if (window.innerWidth <= 1300) {
                    $("#eastOfSignUp").css("display", "none");
                    $(".register-container").addClass("register-fixed");
                    $("#footer").css("display", "none");
                } else {
                    /* RESTORE NORMAL LAYOUT FOR LARGER SCREENS */
                    $("#eastOfSignUp").css("display", "flex");
                    $(".register-container").removeClass("register-fixed");
                    $("#footer").css("display", "flex");
                }

                /* SMALL SCREEN BREAKPOINT - HIDE FORM AND SHOW WARNING */
                if (window.innerWidth <= 925) {
                    $("form").css("display", "none");
                    $("#smallScreenWarning").css("display", "flex");
                } else {
                    /* RESTORE FORM VISIBILITY FOR LARGER SCREENS */
                    $("form").css("display", "flex");
                    $("#smallScreenWarning").css("display", "none");
                }
            }

            /* INITIALIZE RESPONSIVE BEHAVIOR ON PAGE LOAD */
            hideParts();
            /* MONITOR WINDOW RESIZE EVENTS FOR DYNAMIC RESPONSIVENESS */
            $(window).on("resize", hideParts);
        });
        </script>
    </head>

    <body>
        <!-- MAIN SIGNUP CONTAINER -->
        <div id="signUp">
            <!-- REGISTRATION FORM - POSTS TO INSERT SCRIPT -->
            <form action="../setup/insert_signup.php" method="post" id="firstform">
                <div id="firstpart" class="register-container">
                    <!-- SIGNUP HEADER -->
                    <h1>Sign Up</h1><br>
                
                    <!-- WELCOME MESSAGE AND INSTRUCTIONS -->
                    <div class="message-container">
                        <small>
                            Thank you for choosing to join us. To create your account,
                            please fill out the required fields below. Make sure to enter your details accurately.
                        <ul>
                            <li>
                                <b>Password Tips:</b> Your password must be at least 8 characters long,
                                containing a mix of letters, numbers, and special characters for better security.
                            </li>
                            <li>
                                <b>Personal Details:</b> 
                                Kindly provide your full name and email address so we can set up your profile.
                            </li>
                        </ul>
                        If you encounter any issues during the sign-up process, 
                        feel free to <a href="#"><b><i><u>contact our support team</u></i></b></a>.
                        </small>
                    </div><br><br>

                    <!-- NAME INPUT FIELDS CONTAINER - FOUR COLUMN LAYOUT -->
                    <div class="fillname-container">
                        <!-- LAST NAME INPUT - REQUIRED FIELD -->
                        <div>
                            <label><b>Last Name *</b></label>
                            <input 
                                type="text" 
                                class="input-field" 
                                placeholder="Last Name" 
                                name="last_name" 
                                maxlength="30" required>
                        </div>

                        <!-- GIVEN NAME INPUT - REQUIRED FIELD -->
                        <div>
                            <label><b>Given Name *</b></label>
                            <input 
                                type="text"
                                class="input-field" 
                                placeholder="Given Name" 
                                name="given_name"  
                                maxlength="30" required>
                        </div>

                        <!-- MIDDLE NAME INPUT - OPTIONAL FIELD -->
                        <div>
                            <label><b>Middle Name</b></label>
                            <input 
                                type="text" 
                                class="input-field" 
                                placeholder="Middle Name" 
                                name="middle_name" 
                                maxlength="30">
                        </div>   

                        <!-- NAME EXTENSION INPUT - OPTIONAL FIELD -->
                        <div>
                            <label><b>Name Ext.</b></label>
                            <input 
                                type="text" 
                                class="input-field" 
                                placeholder="Sr., Jr., I, II, ..." 
                                name="ext_name" 
                                maxlength="30">
                        </div> 
                    </div><br>

                    <!-- EMAIL ADDRESS INPUT - REQUIRED WITH EMAIL VALIDATION -->
                    <label><b>Email Address *</b></label>

                    <input
                        type="email" 
                        class="input-field" 
                        placeholder="Email" 
                        name="email" required>
                    
                    <br><br>
                    
                    <!-- USERNAME INPUT - ALPHANUMERIC VALIDATION WITH PATTERN -->
                    <label><b>Username *</b> <small>(must be 5-20 characters long, lowercase letters and numbers only)</small></label>
                    <input 
                        type="text" 
                        class="input-field" 
                        placeholder="Username" 
                        name="username" 
                        minlength="5" 
                        maxlength="20" 
                        pattern="(?=.*\d)(?=.*[a-z]).{5,20}" required>
                    <br>

                    <!-- PASSWORD INPUT - COMPLEX VALIDATION PATTERN -->
                    <label><b>Password *</b></label>
                    <input 
                        type="password" 
                        class="input-field" 
                        placeholder="Password" 
                        minlength="8" 
                        maxlength="30" 
                        name="user_password"
                        pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,30}$" required>
                    <br>

                    <!-- CONFIRM PASSWORD INPUT - MATCHES VALIDATION -->
                    <label><b>Confirm Password *</b></label>
                    <input
                        type="password" 
                        class="input-field" 
                        placeholder="Confirm Password" 
                        name="confirm_password" required>

                    <!-- PASSWORD REQUIREMENTS EXPLANATION -->
                    <small>Password must be 8-20 characters long, include at least one uppercase letter, 
                        one lowercase letter, one number, and one special character (@#$%^&+=).</small>

                    <!-- PASSWORD MATCHING VALIDATION SCRIPT -->
                    <script>
                        $(document).ready(function() {
                            /* FORM SUBMISSION VALIDATION FOR PASSWORD MATCHING */
                            $('#firstform').on('submit', function(event) {
                                var password = $('[name="user_password"]').val();
                                var confirmPassword = $('[name="confirm_password"]').val();
                                /* PREVENT SUBMISSION IF PASSWORDS DO NOT MATCH */
                                if (password !== confirmPassword) {
                                    alert('Passwords do not match.');
                                    event.preventDefault();
                                }
                            });
                        });
                    </script>

                    <br><br>

                    <!-- DATE OF BIRTH INPUT - REQUIRED FIELD -->
                    <label><b>Date of Birth *</b></label>
                    <input type="date" class="input-field" name="date_of_birth" required><br>

                    <!-- COUNTRY DROPDOWN - COMPREHENSIVE LIST OF ALL COUNTRIES -->
                    <label><b>Country of Birth *</b></label>
                        <select name="country_of_birth" id="options" required>
                            <option value="" disabled selected>Select Country</option>
                            <!-- COMPLETE ALPHABETICAL LIST OF WORLD COUNTRIES -->
                            <?php
                            $sql = "SELECT CountryName FROM listofcountries ORDER BY CountryName ASC";
                            $result = $conn->query($sql);

                            /* Loop through each country */
                            while ($country = $result->fetch_assoc()) {
                                echo '<option>' . htmlspecialchars($country['CountryName']) . '</option>';
                            }
                            ?>
                        </select><br><br>
                        
                    <!-- TERMS AND CONDITIONS SECTION -->
                    <small>
                        <b>Important Notice</b>
                        <!-- PRIVACY POLICY AND DATA COLLECTION NOTICE -->
                        <p>By proceeding to the next step, you hereby acknowledge and consent to the 
                            collection and use of your personal information, including but not limited 
                            to your name, email address, and other details required for account creation.</p>
                        <p>Your information will be stored securely and will only be used in accordance 
                            with our privacy policy. If you have any concerns about how your data is handled, 
                            please review our <a href="#privacy-policy"><b><i><u>Privacy Policy</u></i></b></a> 
                            before continuing.</p>
                        <p>Do you agree to the terms above?</p>
                        <!-- REQUIRED AGREEMENT CHECKBOX -->
                        <input type="checkbox" id="agree" required> I agree to the terms and conditions
                    </small><br>
                    
                    <!-- FORM SUBMISSION BUTTON -->
                    <input type="submit" class="submit" value="Submit"><br>

                    <!-- LOGIN LINK FOR EXISTING USERS -->
                    <span style="margin: 0 auto;"><small>Already have an account? <a href="../LOGIN/trackCriticLogIn.php" class="access">Login</a></small></span>
                </div>
            </form>

            
            <!-- RIGHT SIDE WELCOME SECTION -->
            <div id="eastOfSignUp">
                <div id="eastOfSignUpText">
                    <!-- WELCOME MESSAGE AND PLATFORM FEATURES -->
                    <h1>Welcome to TrackCritic!</h1>
                    <p>Join us in exploring the world of music and sharing your thoughts with fellow enthusiasts.</p>
                    <p>TrackCritic is a platform where you can discover, review, and discuss your favorite tracks.</p>
                    <p>We are excited to have you on board!</p>

                     <!-- PLATFORM FEATURES LIST -->
                     <ul>
                        <li>📞 <b>Contact Us:</b> Reach out to our support team anytime for assistance or inquiries. We're here to help you make the most of your TrackCritic experience.</li>
                        <li>📝 <b>Write and Read Reviews:</b> Share your thoughts on your favorite tracks and albums, and explore reviews from other music lovers to discover new favorites.</li>
                        <li>📊 <b>Participate in Polls:</b> Make your voice heard! Vote in community polls about trending artists, albums, and songs, and see what the TrackCritic community thinks.</li>
                        <li>📬 <b>Newsletter:</b> Stay up to date with the latest music news, exclusive features, and platform updates by subscribing to our newsletter.</li>
                    </ul>
                </div>
                <!-- WELCOME SECTION LOGO -->
                <img src="../trackCriticLogoGreen.png" alt="Welcome to TrackCritic!" id="eastOfSignUpImage">
            </div>
        </div>

        <!-- BACKGROUND LOGO SECTION -->
        <div id="logo">
                <img id="bigLogoPreview" src="../trackCriticLogo.png" alt="TrackCritic Logo">
        </div>
    </body>
</html>