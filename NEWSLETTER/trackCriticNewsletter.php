<?php
    /* DATABASE CONNECTION AND SESSION INITIALIZATION */
    include ('../setup/config/db_connect.php');
    session_start();

    /* CHECK IF USER IS LOGGED IN AND FETCH USER DATA */
    if (isset($_SESSION['UserID'])) {
    $sql = "SELECT * FROM trackcriticuser
        WHERE UserID = ?";
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

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
        <title>TrackCritic | Newsletter</title>
        <link rel="icon" type="image/png" href="../trackCriticIcon.png">
        <link rel="stylesheet" href="../trackCritic.css">
        <link rel="stylesheet" href="trackCriticNewsletter.css">
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.1.min.js"></script>
        <script src="../trackCritic.js"></script>
    </head>

    <body>
        <!-- MAIN NEWSLETTER CONTENT CONTAINER -->
        <div id="newsletterContent">
            <!-- NEWSLETTER HEADER WITH TITLE AND DATE -->
            <div class="newsletter-header">
                <h2>🎵 TrackCritic Weekly</h2>
                <p class="newsletter-date">May 28, 2025</p>
            </div>

            <!-- FEATURED REVIEW SECTION WITH ALBUM COVER -->
            <div class="newsletter-section">
                <img src="../COVERPHOTO/hitMeHardAndSoft_album.jpg" alt="">
                <h3>🔥 Featured Review: Billie Eilish – Hit Me Hard and Soft</h3>
                <p>
                    Billie Eilish's new album, <b>Hit Me Hard and Soft</b>, is making waves with its introspective lyrics and genre-blending sound. Our review dives into the album's standout tracks and Billie's evolution as an artist.
                    <a href="../REVIEW/trackCriticReview.php">Read other reviews.</a>
                </p>
            </div><hr><br><br>

            <!-- THREE-COLUMN LAYOUT FOR NEWSLETTER SECTIONS -->
            <div class="columnNewsletter">
                <!-- TOP ALBUM REVIEWS SECTION -->
                <div class="newsletter-section">
                    <img src="../COVERPHOTO/soCloseToWhat.webp" alt="">
                    <h3>🌟 Top Album Reviews This Week</h3>
                    <ul>
                        <li><b>Tate McRae – So Close to What:</b> A pop and R&B journey, praised for songwriting and performance. <b>8.7/10</b></li>
                        <li><b>Kali Uchis – Sincerely:</b> Dream pop and neo-soul blend for a heartfelt tribute. <b>9.2/10</b></li>
                        <li><b>Alessia Cara – Love & Hyperbole:</b> Universal acclaim for production and vocals. <b>8.9/10</b></li>
                        <li><b>Lucrecia Dalt – A Danger to Ourselves:</b> Cinematic, experimental, and deeply emotional. <b>8.5/10</b></li>
                        <li><b>Lucy Bedroque – Unmusique:</b> Experimental rap and EDM with electrifying energy. <b>8.0/10</b></li>
                    </ul>
                </div>

                <!-- EMBEDDED SPOTIFY PLAYER -->
                <div class="newsletter-section">
                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/1UrwJzlNC2oaTlxj1OZmcu?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                </div>

                <!-- ARTIST SPOTLIGHT SECTION -->
                <div class="newsletter-section">
                    <img src="../COVERPHOTO/featuredartist.webp" alt="">
                    <h3>🎤 Artist Spotlight: Ariana Grande</h3>
                    <p>
                        Ariana Grande's <b>Eternal Sunshine</b> era continues to impress with its blend of pop, synth, and personal storytelling. Her single "yes, and?" brings house-inspired confidence, while "we can't be friends" delivers emotional depth.
                    </p>
                </div>

                <!-- POLL ANALYSIS AND TRENDING MUSIC SECTION -->
                <div class="newsletter-section">
                    <h3>🔎 Poll Analysis: What's Hot This Week?</h3>
                    <p>
                        Our latest polls and reviews show a strong preference for innovative pop and introspective songwriting. Billie Eilish's "Hit Me Hard and Soft" leads with a 9.5/10, while Ariana Grande's "Eternal Sunshine" and "we can't be friends" continue to resonate with fans and critics alike. Newcomers like Lucy Bedroque and Jade are also making waves with bold, experimental releases.
                    </p>
                    <ul>
                        <li><b>Miley Cyrus – End of the World:</b> Disco-influenced pop with introspective lyrics, rated <b>9.0/10</b>.</li>
                        <li><b>Anyma & Ellie Goulding – Hypnotized:</b> Melodic techno collaboration, immersive visuals, <b>8.3/10</b>.</li>
                        <li><b>Wet Leg – Catch These Fists:</b> Catchy hooks and witty lyrics, <b>8.6/10</b>.</li>
                        <li><b>Charli XCX – BRAT:</b> Hyperpop boundary-pusher, club-ready tracks, <b>9.0/10</b>.</li>
                    </ul>
                    <p>
                        Stay tuned for more reviews and don't forget to vote in our next poll!
                    </p>
                </div>

                <!-- SECOND EMBEDDED SPOTIFY PLAYER -->
                <div class="newsletter-section">
                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/0IsIY8pfu1yaGkPUD7pkDx?utm_source=generator" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                </div>
                
                <!-- QUICK NEWS AND TRENDS SECTION -->
                <div class="newsletter-section">
                    <h3>📰 Quick News & Trends</h3>
                    <ul>
                        <li>Billie Eilish teases a new single for June.</li>
                        <li>Drake announces a surprise collab with SZA.</li>
                        <li>TrackCritic mobile app launching soon!</li>
                        <li>Billboard Hot 100: <b>Luther</b> holds #1, <b>Ordinary</b> and <b>Die With A Smile</b> follow.</li>
                        <li>Billboard Artist 100: <b>Sleep Token</b> and <b>Morgan Wallen</b> lead the chart.</li>
                        <li>Ariana Grande's "we can't be friends" receives a 9.2/10 and is praised for its emotional depth and glitchy production.</li>
                        <li>Jade, formerly of Little Mix, debuts solo with "That's Showbiz Baby!" (8.5/10), impressing critics and fans alike.</li>
                        <li>Charli XCX's "BRAT" sets a new standard for hyperpop, earning a 9.0/10 from TrackCritic reviewers.</li>
                        <li>Gracie Abrams' collaboration with Taylor Swift on "The Secret of Us" is a highlight of her new album (8.6/10).</li>
                        <li>Lucrecia Dalt's "A Danger to Ourselves" (8.5/10) is one of the most anticipated experimental releases of the year.</li>
                    </ul>
                </div>
            </div><br><br><hr><br>

            <!-- NEWSLETTER SUBSCRIPTION SIGNUP FORM -->
            <div id="newsletterSignUp">
                <form action="../setup/insert_newsletter.php" method="post" class="subscribe-form">
                    <h1>Subscribe to our Newsletter</h1>
                    <p>Stay updated with the latest news and insights from TrackCritic.</p>
                    
                    <?php
                    /* CHECK IF USER IS LOGGED IN FOR SUBSCRIPTION FORM */
                    if (isset($_SESSION['UserID'])) {
                    /* CHECK IF USER IS ALREADY SUBSCRIBED TO NEWSLETTER */
                    $check = $conn->prepare("SELECT SubscriberID FROM newslettersubscriber WHERE Email = ?");
                    $check->bind_param("s", $row["Email"]);
                    $check->execute();
                    $check->store_result();
                    
                    /* DISPLAY SUBSCRIPTION STATUS OR FORM BASED ON EXISTING SUBSCRIPTION */
                    if ($check->num_rows > 0) {
                        /* USER ALREADY SUBSCRIBED MESSAGE */
                        echo "<p style='color: red; margin: 0;'>" . htmlspecialchars($row["Username"]) . ", you are already a subscriber!</p>";
                    } else {
                        /* SUBSCRIPTION FORM FOR NEW SUBSCRIBERS */
                        echo '<input type="email" class="input-field" name="email" value="' . htmlspecialchars($row["Email"]) . '" required>';
                        echo '<br>';
                        echo '<button type="submit" class="special-button">Subscribe</button>';
                    }
                    /* CLOSE DATABASE CONNECTION */
                    $check->close();
                    }
                    ?>
                </form>
            </div>

            <!-- NEWSLETTER FOOTER WITH CLOSING MESSAGE -->
            <div class="newsletter-footer">
                <p>
                    Thank you for being part of the TrackCritic community!<br>
                    <small>Want more? Visit <a href="../HOMEPAGE/trackCriticHome.html">TrackCritic</a> for daily updates and join the conversation.</small>
                </p>
            </div>
        </div>

        <!-- MAIN SITE FOOTER WITH COMPANY INFORMATION -->
        <div id="footer">

            <!-- LEFT FOOTER SECTION - ABOUT US -->
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
                <!-- SOCIAL MEDIA LINKS -->
                <div>
                <a href="https://facebook.com/TrackCriticOfficial" target="_blank">Facebook</a>
                <a href="https://twitter.com/TrackCriticOfficial" target="_blank">Twitter</a>
                <a href="https://instagram.com/TrackCriticOfficial" target="_blank">Instagram</a>
                <a href="https://reddit.com/TrackCriticOfficial" target="_blank">Reddit</a>
                </div>
            </div>

            <!-- CENTER FOOTER SECTION - CONTACT INFORMATION -->
            <div class="footerCenter">
                <h3>Office Directory</h3>

                <p>
                    Email: <a href="mailto:emailUs@trackcritic.com">emailUs@trackcritic.com</a><br>
                    Phone: <a href="tel:+639123456789">+63 912 345 6789</a><br>
                    Location: Manila, Philippines
                </p>

                <!-- FEEDBACK FORM LINK -->
                <h3>Got feedback? Send it through our <a href="../HOMEPAGE/trackCriticHome.php#ratingSection">suggestion form</a>.</h3>
            </div>

            <!-- RIGHT FOOTER SECTION - LEGAL AND COPYRIGHT -->
            <div class="footerRight">
                <h3>Legal Matters</h3>
                <div>
                    <a href="#footer">Terms of Use</a> | <a href="#footer">Privacy Policy</a>
                </div>
                <!-- COPYRIGHT AND BRAND INFORMATION -->
                <p>&copy; 2025 TrackCritic. All rights reserved.</p><br>
                <p>"Drop the Track, We'll Drop the Truth" 🎶📈</p>
                <i>Powered by passion for global music.</i>
            </div>
        </div>
    </body>
</html>