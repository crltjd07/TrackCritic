<?php
    /* DATABASE CONNECTION AND SESSION INITIALIZATION */
    include ('../setup/config/db_connect.php');
    session_start();

    /* FETCH USER DATA FROM DATABASE IF SESSION EXISTS */
    if (isset($_SESSION['UserID'])) {
        $sql = "SELECT * FROM trackcriticuser WHERE UserID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $_SESSION['UserID']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    }

    /* REDIRECT TO LOGIN IF USER IS NOT AUTHENTICATED */
    if (!isset($_SESSION['UserID'])) {
        echo '<script>
            alert("Please log in or create an account to access your profile.");
            window.location.href = "../LOGIN/trackCriticLogIn.php";
        </script>';
        exit();
    }
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <title>TrackCritic | Profile</title>
    <link rel="icon" type="image/png" href="../trackCriticIcon.png">
    <link rel="stylesheet" href="../trackCritic.css">
    <link rel="stylesheet" href="trackCriticProfile.css">
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.1.min.js"></script>
    <script src="../trackCritic.js"></script>
</head>

<body>
    <!-- MAIN DASHBOARD HEADER -->
    <div id="dashboardContainer">
        <h1>MY DASHBOARD</h1>
    </div>

    <!-- MAIN PROFILE CONTAINER WITH TWO SECTIONS -->
    <div id="profileContainer">
        <!-- LEFT SECTION - PROFILE HEADER AND FEATURES -->
        <section id="profileContainerLeft">
            <!-- PROFILE HEADER SECTION -->
            <div id="profileHeader">
                <!-- WELCOME MESSAGE WITH DYNAMIC USER NAME -->
                <div id="profileHeader1">
                    <h1>Hey there, 
                        <?php echo htmlspecialchars($row["GivenName"]); ?>    
                        !👋
                    </h1>
                    <h2>Ready to soundtrack your story?</h2>
                    <p>
                        Welcome to your music sanctuary — a place curated just for your ears. 
                        Here, you're not just a listener — you're a reviewer, a curator, a tastemaker in the global music scene.
                    </p>
                </div>

                <!-- GETTING STARTED GUIDE -->
                <div id="profileHeader2">
                    <h2>Not sure where to start?</h2>
                    <div>
                        <p>🌍 Explore foreign albums trending this week.</p>
                        <p>📝 Write your first review — even just a few lines makes a difference.</p>
                        <p>🎧 Revisit your most-played genre and dive deeper.</p>
                    </div>
                </div>  
            </div>

            <!-- PROFILE FEATURES SECTION -->
            <div id="profileFeatures">
                <!-- DUPLICATE GETTING STARTED SECTION -->
                <div id="profileFeatures1">
                    <h2>Not sure where to start?</h2>
                    <div>
                        <p>🌍 Explore foreign albums trending this week.</p>
                        <p>📝 Write your first review — even just a few lines makes a difference.</p>
                        <p>🎧 Revisit your most-played genre and dive deeper.</p>
                    </div>
                </div>
                
                <!-- COMMUNITY ENGAGEMENT SECTION -->
                <div id="profileFeatures2">
                    <h2>Join the conversation</h2>
                    <p>
                        Connect with fellow listeners, drop comments on reviews, and help spotlight sounds that deserve to be heard.
                        Because here, we don't just consume music — we champion it.
                    </p>
                </div>
            </div>
        </section>
        
        <!-- RIGHT SECTION - PERSONAL INFORMATION -->
        <section id="profileContainerRight">
            <div id="profilePersonal">
                <!-- HEADER WITH LOGOUT FUNCTIONALITY -->
                <div id="logOut">
                    <h1>User's Personal Information</h1>
                    <!-- LOGOUT FORM WITH CONFIRMATION -->
                    <form action="../setup/logout.php" onsubmit="return confirmSignOut();">
                        <input type="submit" value="Sign Out">
                    </form>
                </div>

                <!-- JAVASCRIPT CONFIRMATION FOR LOGOUT -->
                <script>
                    function confirmSignOut() {
                        return confirm("Are you sure you want to sign out? Click 'OK' to Confirm");
                    }
                </script>

                <!-- USER INFORMATION TABLE -->
                <table>
                    <!-- FULL NAME DISPLAY -->
                    <tr>
                        <td>Name:</td>
                        <td>
                            <?php
                                echo htmlspecialchars($row["LastName"]) . ", " . 
                                     htmlspecialchars($row["GivenName"]) . ", " . 
                                     htmlspecialchars($row["MiddleName"]) . ", " . 
                                     htmlspecialchars($row["ExtName"]);
                            ?>
                        </td>
                    </tr>
                    <!-- USERNAME DISPLAY -->
                    <tr>
                        <td>Username:</td>
                        <td><?php echo htmlspecialchars($row["Username"]); ?></td>
                    </tr>
                    <!-- EMAIL DISPLAY -->
                    <tr>
                        <td>Email:</td>
                        <td><?php echo htmlspecialchars($row["Email"]); ?></td>
                    </tr>
                    <!-- DATE OF BIRTH DISPLAY -->
                    <tr>
                        <td>Date of Birth:</td>
                        <td><?php echo htmlspecialchars($row["DateOfBirth"]); ?></td>
                    </tr>
                    <!-- LOCATION DISPLAY WITH COUNTRY LOOKUP -->
                    <tr>
                        <td>Location:</td>
                        <td>
                            <?php
                                /* FETCH COUNTRY NAME FROM COUNTRIES TABLE */
                                if (isset($_SESSION['UserID'])) {
                                    $sql1 = "SELECT * FROM listofcountries WHERE CountryID = ?";
                                    $stmt1 = $conn->prepare($sql1);
                                    $stmt1->bind_param("i", $row["CountryID"]);
                                    $stmt1->execute();
                                    $result1 = $stmt1->get_result();
                                    $row1 = $result1->fetch_assoc();
                                }

                                echo htmlspecialchars($row1["CountryName"]);
                            ?>
                        </td>
                    </tr>
                    <!-- ACCOUNT CREATION DATE -->
                    <tr>
                        <td>Account Created:</td>
                        <td><?php echo htmlspecialchars($row["CreatedAt"]); ?></td>
                    </tr>
                    <!-- TIME OF LAST SESSION -->
                    <tr>
                        <td>Last Session:</td>
                        <td><?php echo htmlspecialchars($row["lastsession"]); ?></td>
                    </tr>
                </table>
                                    
                <!-- ACCOUNT MODIFICATION NOTICE -->
                <div style="margin-top: 15px; padding: 10px; border-left: 4px solid white;">
                    <p>
                        If you need to request edits or deletion of your account information, please email us at 
                        <a href="mailto:account@trackcritic.com">account@trackcritic.com</a>.
                    </p>
                </div>
            </div>
        </section>
    </div>

    <hr>

    <!-- MUSIC REVIEW CREATION SECTION -->
    <div id="createMusicReview">
        <h1>Create a Music Review</h1>
        <!-- EMAIL SUBMISSION BUTTON -->
        <a href="mailto:official@trackcritic.com">
            <button type="button" class="submit">Submit Review Thru Email 📧</button>
        </a>
    </div>

    <hr>

    <!-- FOOTER WITH TAGLINE -->
    <div id="profileFooter">
        <p>"Drop the Track, We'll Drop the Truth" 🎶📈</p>
    </div>

    <!-- PHOTO CREDITS SECTION -->
    <section class="credits">
        Photo by 
        <a href="https://unsplash.com/@chamooomile0?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash" target="_blank">
            Roman Melnychuk
        </a> on 
        <a href="https://unsplash.com/photos/brown-acoustic-guitar-beside-green-plant-j5I80kLda3c?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash" target="_blank">
            Unsplash
        </a>
    </section>
</body>
</html>