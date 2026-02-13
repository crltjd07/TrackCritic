<?php
include ('../setup/config/db_connect.php');
session_start();

// Check user login and fetch data once
$user_data = null;
$is_logged_in = isset($_SESSION['UserID']);

if ($is_logged_in) {
    $sql = "SELECT GivenName, Username, Email FROM trackcriticuser WHERE UserID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_SESSION['UserID']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- META TAGS FOR RESPONSIVE DESIGN AND CHARACTER ENCODING -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- GOOGLE FONTS IMPORT FOR NUNITO FONT FAMILY -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <!-- PAGE TITLE AND FAVICON -->
    <title>TrackCritic | Home</title>
    <link rel="icon" type="image/png" href="../trackCriticIcon.png">
    <!-- CSS STYLESHEETS - MAIN AND NEWSLETTER SPECIFIC -->
    <link rel="stylesheet" href="../trackCritic.css">
    <link rel="stylesheet" href="trackCriticHome.css">
    <!-- JQUERY LIBRARY FOR JAVASCRIPT FUNCTIONALITY -->
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.1.min.js"></script>
    <!-- MAIN JAVASCRIPT FILE -->
    <script src="../trackCritic.js"></script>

    <script>
        $(document).ready(function() {
            function hideParts() {
                if (window.innerWidth <= 925) {
                    $("#westPanel").css("display", "none");
                    $("#eastPanel").css("display", "none");
                    $("#centerPanel").css("width", "100%");
                    $("#playPauseButton").css("display", "none");
                } else {
                    $("#westPanel").css("display", "flex");
                    $("#eastPanel").css("display", "flex");
                }
            }
            hideParts();
            $(window).on("resize", hideParts);
        });
    </script>
</head>

<body>
    <div id="home">
        <div id="westPanel">
            <h1>Discover More!</h1>
            
            <iframe allow="autoplay *; encrypted-media *; fullscreen *; clipboard-write" 
                frameborder="0" 
                height="450" 
                style="width:100%;max-width:660px;overflow:hidden;border-radius:20px;" 
                sandbox="allow-forms allow-popups allow-same-origin allow-scripts 
                    allow-storage-access-by-user-activation allow-top-navigation-by-user-activation" 
                src="https://embed.music.apple.com/us/playlist/top-100-global/pl.d25f5d1181894928af76c85c967f8f31?theme=dark"></iframe>
            
            <iframe style="border-radius:12px" 
                src="https://open.spotify.com/embed/playlist/37i9dQZEVXbMDoHDwVN2tF?utm_source=generator&theme=0" 
                width="100%" 
                height="450" 
                frameBorder="0" 
                allowfullscreen="" 
                allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" 
                loading="lazy"></iframe>

            <div id="featuredArtistContent">
                <h2>About the Author</h2>
                <div class="img-wrapper">
                    <a href="https://www.instagram.com/crltjd.07/" target="_blank">
                        <img src="../trackCriticAuthor.jpg" alt="">
                    </a>
                    <div class="hover-text"><b>carl tejada</b>| Instagram</div>
                </div>  
                <p style="text-align: justify;">
                    <strong>carl tejada, 20,</strong> is a music enthusiast, writer, and critic from the Philippines with a strong focus on foreign music. 
                    Fascinated by sounds beyond borders, Carl dives deep into global music scenes, exploring everything from Western pop
                    to lesser-known international gems. His writing bridges cultural gaps and brings fresh perspectives to music lovers looking to expand 
                    their horizons. When he's not reviewing albums, he's curating playlists, discovering underground artists, and sharing the universal 
                    language of music with his audience.
                </p>
            </div>

            <iframe style="border-radius:12px" 
                src="https://open.spotify.com/embed/playlist/2OEMX8cjJ3jyGFL2CQTetW?utm_source=generator&theme=0" 
                width="100%" 
                height="380" 
                frameBorder="0" 
                allowfullscreen="" 
                allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" 
                loading="lazy"></iframe>
        </div>

        <div id="centerPanel">
            <div id="centerPanelContent">
                <div id="topCenterPanel">
                    <h1>TrackCritic</h1>
                    <p>Your ultimate foreign music and world charts tracking platform.</p>
                    <div>
                        <a href="../SIGNUP/trackCriticSignUp.php">
                            <button id="registerButton" style="background-color: #1DB954; color:#000000;">Get Ultimate Now!</button>
                        </a>
                        <a href="../PROFILE/trackCriticProfile.php">
                            <button id="logInButton">My Account</button>
                        </a>
                        <a href="#footer">
                            <button id="loginButton">About Us</button>    
                        </a>
                    </div>
                </div>
            </div>

            <div id="quotePanelContent">
                <h2>"Drop the Track, We'll Drop the Truth" 🎶📈</h2>
            </div>

            <div id="hot100billboardContent">
                <div class="billboard-images">
                    <div class="img-wrapper">
                        <img src="../COVERPHOTO/luther_song.png" alt="Luther">
                        <div class="hover-text"><b>#1 - </b>Luther</div>
                    </div>
                    <div class="img-wrapper">
                        <img src="../COVERPHOTO/ordinary_song.jpg" alt="Ordinary">
                        <div class="hover-text"><b>#2 - </b>Ordinary</div>
                    </div>
                    <div class="img-wrapper">
                        <img src="../COVERPHOTO/dieWithASmile_song.jpg" alt="Die With A Smile">
                        <div class="hover-text"><b>#3 - </b>Die With A Smile</div>
                    </div>
                    <div class="img-wrapper">
                        <img src="../COVERPHOTO/aBarSongTipsy_song.jpg" alt="A Bar Song (Tipsy)">
                        <div class="hover-text"><b>#4 - </b>A Bar Song (Tipsy)</div>
                    </div>
                    <div class="img-wrapper">
                        <img src="../COVERPHOTO/nokia_song.png" alt="Nokia">
                        <div class="hover-text"><b>#5 - </b>Nokia</div>
                    </div>
                </div>
                <h2><a href="https://www.billboard.com/charts/hot-100/" target="_blank">Billboard Hot 100™</a></h2>
                <small>Week of May 24, 2025</small>
            </div>

            <div class="music-grid">
                <div class="music-card">
                    <h3>Entertainment News</h3>
                    <p>Catch up on the latest headlines in the global music scene—from surprise album drops to record-breaking tours.</p>
                </div>

                <div class="music-card">
                    <h3>Song Critique</h3>
                    <p>Dive deep into detailed reviews and breakdowns of the latest hits, analyzing lyrics, production, and impact.</p>
                </div>

                <div class="music-card">
                    <h3>Upcoming Albums</h3>
                    <p>Stay ahead with release dates, pre-save links, and early insights into the most anticipated albums of the season.</p>
                </div>
                
                <div class="music-card">
                    <h3>Artist Spotlights</h3>
                    <p>Get to know emerging and established foreign artists making waves across genres and regions.</p>
                </div>

                <div class="music-card">
                    <h3>Track Trends</h3>
                    <p>Which songs are trending worldwide? Discover what's viral across streaming platforms and social media.</p>
                </div>

                <div class="music-card">
                    <h3>Fan Picks & Polls</h3>
                    <p>Vote on your favorite tracks, rank albums, and see how your opinions stack up with other music lovers.</p>
                </div>
            </div>
            
            <div id="artist100billboardContent">
                <div class="billboard-images">
                    <div class="img-wrapper">
                        <img src="../COVERPHOTO/sleeptoken_artist.png" alt="Sleep Token">
                        <div class="hover-text"><b>#1 - </b>Sleep Token</div>
                    </div>
                    <div class="img-wrapper">
                        <img src="../COVERPHOTO/morganWallen_artist.png" alt="Morgan Wallen">
                        <div class="hover-text"><b>#2 - </b>Morgan Wallen</div>
                    </div>
                    <div class="img-wrapper">
                        <img src="../COVERPHOTO/kendrickLamar_artist.jpg" alt="Kendrick Lamar">
                        <div class="hover-text"><b>#3 - </b>Kendrick Lamar</div>
                    </div>
                    <div class="img-wrapper">
                        <img src="../COVERPHOTO/kaliUchis_artist.png" alt="Kala Uchis">
                        <div class="hover-text"><b>#4 - </b>Kala Uchis</div>
                    </div>
                    <div class="img-wrapper">
                        <img src="../COVERPHOTO/theWeeknd_artist.png" alt="The Weeknd">
                        <div class="hover-text"><b>#5 - </b>The Weeknd</div>
                    </div>
                </div>
                <h2><a href="https://www.billboard.com/charts/artist-100/" target="_blank">Billboard Artist 100™</a></h2>
                <small>Week of May 24, 2025</small>
            </div>

            <form id="ratingSection" action="../setup/submit_suggestionform.php" method="post">
                <h1><small>Rate Your Experience</small></h1><br>
                <p>
                    We'd love to hear how you feel about TrackCritic!
                    <small><i>(leftmost button is 1, rightmost is 5)</i></small>
                </p><br>

                <div class="rateWebsite">
                    <input type="radio" name="rating" value="1" required>
                    <input type="radio" name="rating" value="2">
                    <input type="radio" name="rating" value="3">
                    <input type="radio" name="rating" value="4">
                    <input type="radio" name="rating" value="5">
                </div><br>

                <?php
                if ($is_logged_in) {
                    echo '<input type="email" name="email" value="' . htmlspecialchars($user_data["Email"]) . '" class="form-email" required><br>';
                } else {
                    echo '<input type="email" name="email" placeholder="Enter Email Address..." class="form-email" required><br>';
                }
                ?>

                <textarea placeholder="Leave a comment..." name="comment" required></textarea><br><br>
                <button type="submit">Submit Feedback</button>
            </form>
        </div>

        <div id="eastPanel">
            <div id="eastPanelContent1">
                <?php
                if ($is_logged_in) {
                    echo "<b style='color: red;'>Hi, " . htmlspecialchars($user_data["GivenName"]) . 
                         " (" . htmlspecialchars($user_data["Username"]) . ") !</b>";
                }
                ?>
                <h1>Welcome to TrackCritic</h1>
                <p>Your one-stop destination for tracking and reviewing your favorite foreign artists and music.</p>
                <a href="../REVIEW/trackCriticReview.php">
                    <button id="getStartedButton">Get Started</button>
                </a>
            </div>

            <div id="featuredArtistContent">
                <h2>TrackCritic's Featured Artist</h2>
                <div class="img-wrapper">
                    <a href="https://disney.fandom.com/wiki/Ariana_Grande" target="_blank">
                        <img src="../COVERPHOTO/featuredartist.webp" alt="">
                    </a>
                    <div class="hover-text"><b>Ariana Grande </b>| Disney Wiki | Fandom</div>
                </div>  
            </div>

            <div id="eastPanelContent2">
                <small>Week of May 24, 2025</small>
                <h2><a href="https://www.billboard.com/charts/billboard-200/" target="_blank">Billboard 200™</a></h2>
                
                <div class="img-wrapper">
                    <img src="../COVERPHOTO/evenInArcadia.jpg" alt="Even in Arcadia">
                    <div class="hover-text"><b>#1 - </b>Even in Arcadia</div>
                </div>
                <div class="img-wrapper">
                    <img src="../COVERPHOTO/sincerely,.png" alt="Sincerely,">
                    <div class="hover-text"><b>#2 - </b>Sincerely,</div>
                </div>
                <div class="img-wrapper">
                    <img src="../COVERPHOTO/sos.webp" alt="SOS">
                    <div class="hover-text"><b>#3 - </b>SOS</div>
                </div>
                <div class="img-wrapper">
                    <img src="../COVERPHOTO/oneThingAtATime.jpg" alt="One Thing at a Time">
                    <div class="hover-text"><b>#4 - </b>One Thing at a Time</div>
                </div>
                <div class="img-wrapper">
                    <img src="../COVERPHOTO/$ome$exy$ongs4U.jpg" alt="$ome $exy $ongs 4 U">
                    <div class="hover-text"><b>#5 - </b>$ome $exy $ongs 4 U</div>
                </div>
            </div>
        </div>
    </div>

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
            <h3>Subscribe to Our Newsletter. TODAY!</h3>

            <form action="../NEWSLETTER/TrackCriticNewsletter.php" method="post">
                <?php
                if ($is_logged_in) {
                    $sql_newsletter = "SELECT 1 FROM newslettersubscriber WHERE Email = ? LIMIT 1";
                    $stmt_newsletter = $conn->prepare($sql_newsletter);
                    $stmt_newsletter->bind_param("s", $user_data["Email"]);
                    $stmt_newsletter->execute();
                    $is_subscribed = $stmt_newsletter->get_result()->num_rows > 0;
                    $stmt_newsletter->close();

                    if ($is_subscribed) {
                        echo "<p style='color: red; margin: 0;'>" . htmlspecialchars($user_data["Username"]) . ", you are already a subscriber!</p>";
                    } else {
                        echo '<input type="email" value="' . htmlspecialchars($user_data["Email"]) . '" required readonly>';
                        echo '<button type="submit">Subscribe</button>';
                    }
                } else {
                    echo '<input type="email" placeholder="Enter your email" required>';
                    echo '<button type="submit">Subscribe</button>';
                }
                ?>
            </form>

            <h3>Office Directory</h3>
            <p>
                Email: <a href="mailto:emailUs@trackcritic.com">emailUs@trackcritic.com</a><br>
                Phone: <a href="tel:+639123456789">+63 912 345 6789</a><br>
                Location: Manila, Philippines
            </p>

            <h3>Got feedback? Send it through our <a href="#ratingSection">suggestion form</a>.</h3>
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
</body>
</html>