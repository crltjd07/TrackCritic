<?php
/* DATABASE CONNECTION AND SESSION INITIALIZATION */
include ('../setup/config/db_connect.php');
session_start();

/* AUTHENTICATION CHECK - REDIRECT TO LOGIN IF NOT LOGGED IN */
if (!isset($_SESSION['UserID'])) {
    echo '<script>
        alert("Please log in or create an account to access your profile.");
        window.location.href = "../LOGIN/trackCriticLogIn.php";
        </script>';
    exit();
}

/* FETCH LOGGED-IN USER'S INFORMATION FROM DATABASE */
$sql = "SELECT * FROM trackcriticuser WHERE UserID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['UserID']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
        <title>TrackCritic | Poll</title>
        <link rel="icon" type="image/png" href="../trackCriticIcon.png">
        <link rel="stylesheet" href="../trackCritic.css">
        <link rel="stylesheet" href="trackCriticPoll.css">
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.1.min.js"></script>
        <script src="../trackCritic.js"></script>
    </head>

    <body>
        <div id="pollContainer">
            <h1 id="title">THE POLLS <small>DAILY</small></h1>
            <!-- INTRODUCTION AND INSTRUCTIONS FOR USERS -->
            <p class="pollDescriptionTop">
                Welcome to the TrackCritic polls section — your space to rate the newest music drops, trending singles, 
                and surprise releases from the industry's top artists. Each poll reflects our spotlight tracks for the week, 
                carefully selected to spark discussion and highlight creativity in today's music scene. 
                <br><br>
                We encourage you to vote thoughtfully and objectively. Whether you're a long-time fan or a first-time 
                listener, your honest ratings help us create fair, data-driven feedback for the artists and the community. 
                Please avoid bias and focus on the quality of the music — not just the popularity of the artist. Every vote 
                matters!
            </p>

            <?php
            /* FETCH ALL ACTIVE POLLS THAT HAVEN'T EXPIRED YET */
            $sql = "SELECT * FROM polls WHERE is_active = 1 AND expires_at > NOW() ORDER BY created_at DESC";
            $result = $conn->query($sql);
            $pollNum = 1;
            /* LOOP THROUGH EACH ACTIVE POLL */
            while ($poll = $result->fetch_assoc()) {
            ?>
        
            <!-- POLL FORM SUBMISSION TO HANDLER -->
            <form method="post" action="trackCriticPollHandler.php">
                <!-- HIDDEN FIELD TO IDENTIFY WHICH POLL IS BEING VOTED ON -->
                <input type="hidden" name="poll_id" value="<?php echo $poll['poll_id']; ?>">
                <div class="pollContent">
                    <!-- POLL TITLE AND DESCRIPTION -->
                    <h1><?php echo htmlspecialchars($poll['poll_title']); ?></h1>
                    <p><?php echo htmlspecialchars($poll['poll_description']); ?></p>
                    <!-- POLL METADATA: CREATION AND EXPIRATION DATES -->
                    <span><b>Created at:</b> <?php echo htmlspecialchars($poll['created_at']); ?> | </span>
                    <span><b>Expires at:</b> <?php echo htmlspecialchars($poll['expires_at']); ?></span>
                    <p>by <strong>TrackCritic</strong> · <b>Artist:</b> <?php echo htmlspecialchars($poll['artist_name']); ?></p><br>

                    <?php
                    /* CHECK IF CURRENT USER HAS ALREADY VOTED ON THIS POLL */
                    $userVoteSql = "SELECT rating FROM poll_votes WHERE poll_id = ? AND user_id = ?";
                    $userVoteStmt = $conn->prepare($userVoteSql);
                    $userVoteStmt->bind_param("ii", $poll['poll_id'], $_SESSION['UserID']);
                    $userVoteStmt->execute();
                    $userVoteStmt->bind_result($userRating);
                    $hasVoted = $userVoteStmt->fetch();
                    $userVoteStmt->close();
                    ?>

                    <?php if ($hasVoted): ?>
                        <!-- DISPLAY USER'S PREVIOUS VOTE IF THEY ALREADY VOTED -->
                        <p><b>You have already voted in this poll.</b></p>
                        <label>Your Rating:</label>
                            <span style="font-weight:bold;"><?php echo $userRating; ?> out of 10</span><br>
                        
                    <?php else: ?>
                        <!-- RATING SLIDER FOR NEW VOTES -->
                        <label for="slider<?php echo $pollNum; ?>">Your Rating:</label>
                        <div>
                            <!-- RANGE SLIDER FROM 0 TO 10 WITH DEFAULT VALUE 5 -->
                            <input type="range" min="0" max="10" value="5" name="rating" id="slider<?php echo $pollNum; ?>" oninput="updateSlider(this, 'sliderValue<?php echo $pollNum; ?>')">
                            <span id="sliderValue<?php echo $pollNum; ?>">5 out of 10</span><br>
                        </div><br>
                        <!-- SUBMIT BUTTON FOR VOTE -->
                        <button type="submit">Submit Vote</button>
                    <?php endif; ?>
                </div>

                <!-- POLL STATISTICS SECTION -->
                <div class="pollStats">
                    <div class="pollFooter">
                        <?php
                        /* CALCULATE VOTE COUNT AND AVERAGE RATING FOR THIS POLL */
                        $voteCount = 0;
                        $avgRating = 0;
                        $voteSql = "SELECT COUNT(*) as total, AVG(rating) as avg_rating FROM poll_votes WHERE poll_id = ?";
                        $voteStmt = $conn->prepare($voteSql);
                        $voteStmt->bind_param("i", $poll['poll_id']);
                        $voteStmt->execute();
                        $voteStmt->bind_result($voteCount, $avgRating);
                        $voteStmt->fetch();
                        $voteStmt->close();
                        ?>
                        <div>
                            <!-- DISPLAY TOTAL VOTES AND AVERAGE RATING -->
                            <b>Total votes:</b> <?php echo $voteCount; ?><br>
                            <b>Average rating:</b> <?php echo $voteCount > 0 ? number_format($avgRating, 2) : 'N/A'; ?>
                        </div>
                    </div>
                </div>
            </form>
            <?php
                /* INCREMENT POLL NUMBER FOR UNIQUE SLIDER IDS */
                $pollNum++;
            }   
            ?>

            <!-- DISCLAIMER SECTION AT THE BOTTOM -->
            <p class="pollDescriptionBottom">
                <strong>Disclaimer:</strong> TrackCritic polls are conducted solely for entertainment and feedback purposes.
                Results are anonymous and not affiliated with any official music chart or label. While we encourage objective
                voting based on song quality, individual opinions may vary. TrackCritic does not endorse or oppose any artist
                featured in these polls.
            </p>
        </div>

        <!-- FOOTER SECTION WITH COMPANY INFORMATION -->
        <div id="footer">
            <div class="footerLeft">
                <h3>About Us</h3>
                <p>
                    This platform was founded by Carl Francis Encallado, a dedicated music enthusiast and reviewer from the Philippines with a passion for foreign music.
                    Our mission is to bring global music closer to listeners everywhere by offering thoughtful reviews, curated playlists, and a space to explore sounds from around the world.
                </p>
                <p>
                    We believe music is a universal language that transcends borders, and we're here to help you discover new artists, albums, and genres that might not always make it to the mainstream spotlight.
                </p>
                <p>
                    Whether you're a curious newcomer or a lifelong fan of global music, our site offers a unique and personal take on what's worth listening to — and why it matters.
                </p>
                <div>
                <a href="https://facebook.com/TrackCriticOfficial" target="_blank">Facebook</a>
                <a href="https://twitter.com/TrackCriticOfficial" target="_blank">Twitter</a>
                <a href="https://instagram.com/TrackCriticOfficial" target="_blank">Instagram</a>
                <a href="https://reddit.com/TrackCriticOfficial" target="_blank">Reddit</a>
                </div>
            </div>

            <div class="footerCenter">
                <h3>Office Directory</h3>

                <p>
                    Email: <a href="mailto:emailUs@trackcritic.com">emailUs@trackcritic.com</a><br>
                    Phone: <a href="tel:+639123456789">+63 912 345 6789</a><br>
                    Location: Manila, Philippines
                </p>

                <h3>Got feedback? Send it through our <a href="../HOMEPAGE/trackCriticHome.php#ratingSection">suggestion form</a>.</h3>
            </div>

            <div class="footerRight">
                <h3>Legal Matters</h3>
                <div>
                    <a href="#footer">Terms of Use</a> | <a href="#footer">Privacy Policy</a>
                </div>
                <p>&copy; 2025 TrackCritic. All rights reserved.</p><br>
                <p>"Drop the Track, We'll Drop the Truth" 🎶📈</p>
                <i>Powered by passion for global music.</i>
            </div>
        </div>

        <script>
            /* FUNCTION TO UPDATE SLIDER VALUE DISPLAY IN REAL-TIME */
            function updateSlider(slider, displayId) {
                document.getElementById(displayId).textContent = slider.value + ' out of 10';
            }

            /* FUNCTION TO SHOW RESULT MESSAGES */
            function showResult(id, message) {
                document.getElementById(id).innerText = message;
            }
        </script>
    </body>
</html>