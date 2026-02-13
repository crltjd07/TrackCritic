<?php
    /* DATABASE CONNECTION AND SESSION MANAGEMENT */
    include ('../setup/config/db_connect.php');
    session_start();

    /* USER AUTHENTICATION CHECK - REDIRECTS TO LOGIN IF NOT LOGGED IN */
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
        <title>TrackCritic | Review</title>
        <link rel="icon" type="image/png" href="../trackCriticIcon.png">
        <link rel="stylesheet" href="../trackCritic.css">
        <link rel="stylesheet" href="trackCriticReview.css">
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.1.min.js"></script>
        <script src="../trackCritic.js"></script>
        
        <script>
            $(document).ready(function() {
                const params = new URLSearchParams(window.location.search);
                const search = params.get('search');
                if (search) {
                    $('#searchBar').val(search);
                    $('.card').each(function() {
                        const text = $(this).text().toLowerCase();
                        if (text.includes(search.toLowerCase())) {
                            $(this).show();
                            $(this).css('box-shadow', '0 0 0 3px #1DB954');
                        } else {
                            $(this).hide();
                            $(this).css('box-shadow', '');
                        }
                    });
                }
            });
        </script>
    </head>

    <body>
        <!-- MAIN CONTENT CONTAINER WITH MASONRY GRID -->
        <div class="grid-container">
            <!-- PAGE HEADER WITH HOT PICKS TITLE -->
            <h1><a href="trackCriticReview.php">HOT </a>PICKS TODAY🔥</h1>

             <!-- REVIEW CARDS -->
            <div class="card">
                <img src="../COVERPHOTO/hitMeHardAndSoft.webp" alt="Billie Eilish – Hit Me Hard and Soft">
                <div class="card-content">
                    <h3>Billie Eilish – Hit Me Hard and Soft</h3>
                    <p>
                        Billie Eilish's latest album, "Hit Me Hard and Soft," showcases 
                        her evolution as an artist, blending introspective lyrics with 
                        innovative production.
                    </p>
                    <p>Rating: 9.5 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/soCloseToWhat.webp" alt="Tate McRae – So Close to What">
                <div class="card-content">
                    <h3>Tate McRae – So Close to What</h3>
                    <p>
                        Tate McRae's third studio album, "So Close to What," combines pop, 
                        dance-pop, and R&B elements, reflecting her growth as a songwriter 
                        and performer.
                    </p>
                    <p>Rating: 8.7 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/kaliUchis_artist.png" alt="Kali Uchis – Sincerely">
                <div class="card-content">
                    <h3>Kali Uchis – Sincerely</h3>
                    <p>
                        Kali Uchis' fifth studio album, "Sincerely," blends neo-soul, dream 
                        pop, and R&B, offering a heartfelt tribute to her late mother and 
                        exploring themes of love and loss.
                    </p>
                    <p>Rating: 9.2 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/love&Hyperbole.jpg" alt="Alessia Cara – Love & Hyperbole">
                <div class="card-content">
                    <h3>Alessia Cara – Love & Hyperbole</h3>
                    <p>
                        Alessia Cara's fourth studio album, "Love & Hyperbole," received universal 
                        acclaim for its production, songwriting, and vocal performances, showcasing 
                        her maturity as an artist.
                    </p>
                    <p>Rating: 8.9 / 10</p>
                </div>
            </div>

            <div class="card">
                 <iframe allow="autoplay *; encrypted-media *; fullscreen *; clipboard-write" 
                    frameborder="0" 
                    height="450" 
                    style="width:100%;max-width:660px;overflow:hidden;border-radius:20px;" 
                    sandbox="allow-forms allow-popups allow-same-origin allow-scripts 
                        allow-storage-access-by-user-activation allow-top-navigation-by-user-activation" 
                    src="https://embed.music.apple.com/us/playlist/top-100-global/pl.d25f5d1181894928af76c85c967f8f31?theme=dark"></iframe>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/aDangerToOurselves.jpg" alt="Lucrecia Dalt – A Danger to Ourselves">
                <div class="card-content">
                    <h3>Lucrecia Dalt – A Danger to Ourselves</h3>
                    <p>
                        Lucrecia Dalt's upcoming album, "A Danger to Ourselves," set to release on 
                        September 5, 2025, promises a cinematic exploration of love and improbability, 
                        featuring collaborations with notable artists.
                    </p>
                    <p>Rating: 8.5 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/lucyBedroque.png" alt="Lucy Bedroque – Unmusique">
                <div class="card-content">
                    <h3>Lucy Bedroque – Unmusique</h3>
                    <p>
                        Lucy Bedroque's mixtape, "Unmusique," offers a chaotic and electrifying entry 
                        into experimental rap, blending "rage 2.0" with maximalist EDM influences.
                    </p>
                    <p>Rating: 8.0 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/hypnotizedAnyma&Ellie.jpg" alt="Anyma & Ellie Goulding – Hypnotized">
                <div class="card-content">
                    <h3>Anyma & Ellie Goulding – Hypnotized</h3>
                    <p>
                        "Hypnotized" is a melodic techno collaboration between Anyma and Ellie Goulding, 
                        debuting at The Sphere in Las Vegas and captivating audiences with its immersive visuals.
                    </p>
                    <p>Rating: 8.3 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/endOfTheWorld_mileyCyrus.jpg" alt="Miley Cyrus – End of the World">
                <div class="card-content">
                    <h3>Miley Cyrus – End of the World</h3>
                    <p>
                        Miley Cyrus's single "End of the World" from her album "Something Beautiful" blends 
                        disco-influenced pop with introspective lyrics, reflecting on living fully amid uncertainty.
                    </p>
                    <p>Rating: 9.0 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/sweetener_arianaGrande.jpg" alt="Ariana Grande - Sweetener">
                <div class="card-content">
                    <h3>Evolving Aesthetics – From Sweetener to Now</h3>
                    <p>
                        Compared to the pastel, feminine visuals of *Sweetener*, *Eternal Sunshine* uses bold reds 
                        and minimalist concepts to reflect a more mature, self-reflective Ariana. It’s her most 
                        thematically cohesive look yet.
                    </p>
                    <p>Rating: 8.8 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/mapOfTheBlueCity.jpg" alt="Marc Ribot – Map of a Blue City">
                <div class="card-content">
                    <h3>Marc Ribot – Map of a Blue City</h3>
                    <p>Marc Ribot's first vocal album, "Map of a Blue City," mixes chamber music, protest songs, 
                        and poetic reflections, showcasing his versatility and creative freedom.
                    </p>
                    <p>Rating: 8.4 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/jemAndTheHolograms.jpg" alt="Jem and the Holograms – Remastered Soundtrack">
                <div class="card-content">
                    <h3>Jem and the Holograms – Remastered Soundtrack</h3>
                    <p>To celebrate the 40th anniversary of "Jem and the Holograms," remastered tracks from the show's 
                        original soundtrack are now available on streaming platforms for the first time.
                    </p>
                    <p>Rating: 7.5 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/catchTheseFists_wetLeg.jpg" alt="Wet Leg – Catch These Fists">
                <div class="card-content">
                    <h3>Wet Leg – Catch These Fists</h3>
                    <p>Wet Leg's single "Catch These Fists" combines catchy hooks with witty lyrics, marking a strong 
                        return for the band and building anticipation for their upcoming album.
                    </p>
                    <p>Rating: 8.6 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/eternalSunshine_arianaGrande.jpg" alt="Ariana Grande – Eternal Sunshine">
                <div class="card-content">
                    <h3>Ariana Grande – Eternal Sunshine</h3>
                    <p>
                        In contrast to the dreamy softness of *Positions*, *Eternal Sunshine* feels more emotionally raw 
                        and introspective. It blends pop, synth, and personal storytelling in a concept album inspired 
                        by heartbreak and self-awareness.
                    </p>
                    <p>Rating: 9.0 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/yesAnd_arianaGrande.png" alt="yes, and? – A Confident Return">
                <div class="card-content">
                    <h3>yes, and? – A Confident Return</h3>
                    <p>
                        A bold shift from the whispered intimacy of *Positions*, this house-inspired single recalls the 
                        confidence of *Dangerous Woman*, paired with lyrical assertiveness rooted in growth.
                    </p>
                    <p>Rating: 8.7 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/anxiety_doechii.jpg" alt="Doechii – Anxiety">
                <div class="card-content">
                    <h3>Doechii – Anxiety</h3>
                    <p>
                        Doechii's single "Anxiety" delves into personal struggles with raw emotion and innovative beats, 
                        solidifying her place in the contemporary rap scene.
                    </p>
                    <p>Rating: 8.2 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/stillWoozy_fridaKahlo.jpg" alt="Still Woozy – Frida Kahlo">
                <div class="card-content">
                    <h3>Still Woozy – Frida Kahlo</h3>
                    <p>
                        Still Woozy's "Frida Kahlo" is a vibrant indie track that pays homage to the iconic artist, 
                        blending psychedelic sounds with heartfelt lyrics.
                    </p>
                    <p>Rating: 8.1 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/weCantBeFriends_arianaGrande.jpg" alt="we can't be friends">
                <div class="card-content">
                    <h3>we can’t be friends – The New ballad style</h3>
                    <p>
                        Gone is the orchestral drama of “pov” or “ghostin.” This ballad delivers soft vocals over glitchy 
                        production, showing Ariana’s ability to stay current while expressing emotional depth.
                    </p>
                    <p>Rating: 9.2 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/nobodysSoldier_hozier.jpg" alt="Hozier – Nobody's Soldier">
                <div class="card-content">
                    <h3>Hozier – Nobody's Soldier</h3>
                    <p>
                        Hozier's "Nobody's Soldier" combines soulful melodies with poignant storytelling, reflecting 
                        on themes of resistance and personal conviction.
                    </p>
                    <p>Rating: 9.1 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/thankUNext_arianaGrande.jpg" alt="Eternal Sunshine vs thank u, next">
                <div class="card-content">
                    <h3>Eternal Sunshine vs. thank u, next</h3>
                    <p>
                        While *thank u, next* captured public healing and empowerment, *Eternal Sunshine* feels quieter 
                        and more internal. Both are breakup albums, but this one leans into nuance, with layered 
                        production and subtle storytelling.
                    </p>
                    <p>Rating: 9.1 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/brightLights_theKillers.jpg" alt="The Killers – Bright Lights">
                <div class="card-content">
                    <h3>The Killers – Bright Lights</h3>
                    <p>
                        The Killers' "Bright Lights" is a high-energy anthem that captures the essence of their 
                        signature sound, resonating with both new and longtime fans.
                    </p>
                    <p>Rating: 8.4 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/thatsShowbizBaby_JADE.jpg" alt="Jade – That's Showbiz Baby!">
                <div class="card-content">
                    <h3>Jade – That's Showbiz Baby!</h3>
                    <p>
                        Jade, formerly of Little Mix, impresses with her debut solo album "That's Showbiz Baby!," 
                        delivering powerful vocals and theatrical flair.
                    </p>
                    <p>Rating: 8.5 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/BRAT_charliXCX.jpg" alt="Charli XCX – BRAT">
                <div class="card-content">
                    <h3>Charli XCX – BRAT</h3>
                    <p>
                        Charli XCX's album "BRAT" pushes the boundaries of hyperpop with club-ready tracks, confessional 
                        lyrics, and a rebellious edge that defines her unique sonic style.
                    </p>
                    <p>Rating: 9.0 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/theSecretOfUs_gracieAbrams.jpg" alt="Gracie Abrams – The Secret of Us">
                <div class="card-content">
                    <h3>Gracie Abrams – The Secret of Us</h3>
                    <p>
                        Gracie Abrams' sophomore album "The Secret of Us" includes emotionally driven songs and a standout 
                        collaboration with Taylor Swift, deepening her impact on pop music.
                    </p>
                    <p>Rating: 8.6 / 10</p>
                </div>
            </div>

            



            <div class="card">
                <img src="../COVERPHOTO/folklore_taylorSwift.jpg" alt="Taylor Swift – Folklore">
                <div class="card-content">
                    <h3>Taylor Swift – Folklore</h3>
                    <p>
                        Taylor Swift's "Folklore" marks a departure from her pop roots, embracing indie folk and alternative rock influences. The album's introspective lyrics and subdued production showcase her storytelling prowess.
                    </p>
                    <p>Rating: 9.0 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/futureNostalgia_duaLipa.jpg" alt="Dua Lipa – Future Nostalgia">
                <div class="card-content">
                    <h3>Dua Lipa – Future Nostalgia</h3>
                    <p>
                        "Future Nostalgia" blends retro disco vibes with modern pop, delivering danceable tracks that solidify Dua Lipa's position in the pop landscape.
                    </p>
                    <p>Rating: 8.8 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/afterHours_theWeeknd.jpg" alt="The Weeknd – After Hours">
                <div class="card-content">
                    <h3>The Weeknd – After Hours</h3>
                    <p>
                        The Weeknd's "After Hours" delves into themes of heartbreak and self-reflection, combining synth-pop and R&B elements to create a hauntingly atmospheric album.
                    </p>
                    <p>Rating: 9.1 / 10</p>
                </div>
            </div>

            <div class="card">
                <iframe style="border-radius:12px" 
                    src="https://open.spotify.com/embed/playlist/37i9dQZEVXbMDoHDwVN2tF?utm_source=generator&theme=0" 
                    width="100%" 
                    height="450" 
                    frameBorder="0" 
                    allowfullscreen="" 
                    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" 
                    loading="lazy"></iframe>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/evermore_taylorSwift.jpg" alt="Taylor Swift – Evermore">
                <div class="card-content">
                    <h3>Taylor Swift – Evermore</h3>
                    <p>
                        As a sister album to "Folklore," "Evermore" continues Taylor Swift's exploration of indie folk, featuring collaborations and storytelling that expand her musical horizons.
                    </p>
                    <p>Rating: 8.9 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/positions_arianaGrande.jpg" alt="Ariana Grande – Positions">
                <div class="card-content">
                    <h3>Ariana Grande – Positions</h3>
                    <p>
                        "Positions" showcases Ariana Grande's versatility, blending R&B and pop with themes of love and empowerment, highlighting her vocal agility.
                    </p>
                    <p>Rating: 8.5 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/chemtrails_lanaDelRey.jpg" alt="Lana Del Rey – Chemtrails Over the Country Club">
                <div class="card-content">
                    <h3>Lana Del Rey – Chemtrails Over the Country Club</h3>
                    <p>
                        Lana Del Rey's "Chemtrails Over the Country Club" offers a dreamy, melancholic journey through Americana, with introspective lyrics and ethereal melodies.
                    </p>
                    <p>Rating: 8.7 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/planetHer_dojaCat.jpg" alt="Doja Cat – Planet Her">
                <div class="card-content">
                    <h3>Doja Cat – Planet Her</h3>
                    <p>
                        "Planet Her" is a genre-blending album that showcases Doja Cat's versatility, combining pop, R&B, and hip-hop with futuristic themes and catchy hooks.
                    </p>
                    <p>Rating: 8.6 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/happierThanEver_billieEilish.jpg" alt="Billie Eilish – Happier Than Ever">
                <div class="card-content">
                    <h3>Billie Eilish – Happier Than Ever</h3>
                    <p>
                        Billie Eilish's sophomore album, "Happier Than Ever," delves into themes of fame and personal growth, featuring a more mature sound and introspective lyrics.
                    </p>
                    <p>Rating: 9.0 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/montero_lilNasX.jpg" alt="Lil Nas X – Montero">
                <div class="card-content">
                    <h3>Lil Nas X – Montero</h3>
                    <p>
                        "Montero" is a bold debut album from Lil Nas X, blending hip-hop and pop with personal storytelling and unapologetic expression of identity.
                    </p>
                    <p>Rating: 8.4 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/30_adele.jpg" alt="Adele – 30">
                <div class="card-content">
                    <h3>Adele – 30</h3>
                    <p>
                        Adele's "30" is a deeply personal album that explores themes of heartbreak and self-discovery, delivered through her powerful vocals and emotive ballads.
                    </p>
                    <p>Rating: 9.3 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/renaissance_beyonce.jpg" alt="Beyoncé – Renaissance">
                <div class="card-content">
                    <h3>Beyoncé – Renaissance</h3>
                    <p>
                        "Renaissance" sees Beyoncé return with a dance-heavy, house-inspired album that celebrates freedom, queer culture, and Black artistry in electrifying style.
                    </p>
                    <p>Rating: 9.4 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/mrMorale_kendrickLamar.jpg" alt="Kendrick Lamar – Mr. Morale & the Big Steppers">
                <div class="card-content">
                    <h3>Kendrick Lamar – Mr. Morale & the Big Steppers</h3>
                    <p>
                        Kendrick Lamar’s introspective double album explores vulnerability, trauma, and healing through layered storytelling and sharp lyricism.
                    </p>
                    <p>Rating: 9.5 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/midnights_taylorSwift.jpg" alt="Taylor Swift – Midnights">
                <div class="card-content">
                    <h3>Taylor Swift – Midnights</h3>
                    <p>
                        "Midnights" is a synth-pop reflection on sleepless nights, past regrets, and personal growth, blending introspection with Taylor Swift’s signature lyrical craft.
                    </p>
                    <p>Rating: 8.8 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/herLoss_drake21savage.jpg" alt="Drake & 21 Savage – Her Loss">
                <div class="card-content">
                    <h3>Drake & 21 Savage – Her Loss</h3>
                    <p>
                        A collaborative album between Drake and 21 Savage, "Her Loss" delivers swaggering flows and trap-heavy production, offering a balance of melody and grit.
                    </p>
                    <p>Rating: 7.9 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/sos_sza.jpg" alt="SZA – SOS">
                <div class="card-content">
                    <h3>SZA – SOS</h3>
                    <p>
                        "SOS" expands SZA’s emotional range, blending R&B with alt-pop and hip-hop, as she explores heartbreak, self-worth, and vulnerability with raw honesty.
                    </p>
                    <p>Rating: 9.2 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/holdTheGirl_rixe.jpg" alt="Rina Sawayama – Hold the Girl">
                <div class="card-content">
                    <h3>Rina Sawayama – Hold the Girl</h3>
                    <p>
                        Rina Sawayama fuses pop, rock, and dance elements in "Hold the Girl," exploring themes of identity, trauma, and healing with emotional clarity and sonic boldness.
                    </p>
                    <p>Rating: 8.7 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/speciaal_måneskin.png" alt="Måneskin – RUSH!">
                <div class="card-content">
                    <h3>Måneskin – RUSH!</h3>
                    <p>
                        "RUSH!" is a high-octane glam rock record from Italian band Måneskin, blending punk attitude and classic rock influence with modern flair.
                    </p>
                    <p>Rating: 7.8 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/brokenByDesire_lewisCapaldi.jpg" alt="Lewis Capaldi – Broken By Desire To Be Heavenly Sent">
                <div class="card-content">
                    <h3>Lewis Capaldi – Broken By Desire To Be Heavenly Sent</h3>
                    <p>
                        This emotionally rich album sees Lewis Capaldi leaning into themes of heartbreak and longing, carried by his powerful, raspy vocals and heartfelt ballads.
                    </p>
                    <p>Rating: 8.2 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/thisIsWhy_paramore.jpg" alt="Paramore – This Is Why">
                <div class="card-content">
                    <h3>Paramore – This Is Why</h3>
                    <p>
                        "This Is Why" marks Paramore's return with a post-punk edge, reflecting on societal anxiety and personal detachment through dynamic instrumentation and sharp lyrics.
                    </p>
                    <p>Rating: 8.6 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/guts_oliviaRodrigo.jpg" alt="Olivia Rodrigo – GUTS">
                <div class="card-content">
                    <h3>Olivia Rodrigo – GUTS</h3>
                    <p>
                        On "GUTS," Olivia Rodrigo expands her sound with energetic rock influences and candid songwriting about youth, jealousy, and emotional confusion.
                    </p>
                    <p>Rating: 9.1 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/uTopia_travisScott.jpg" alt="Travis Scott – UTOPIA">
                <div class="card-content">
                    <h3>Travis Scott – UTOPIA</h3>
                    <p>
                        "UTOPIA" is an ambitious project filled with cinematic production and experimental structures, showing Travis Scott pushing the boundaries of modern hip-hop.
                    </p>
                    <p>Rating: 8.9 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/theRecord_boygenius.jpg" alt="boygenius – the record">
                <div class="card-content">
                    <h3>boygenius – the record</h3>
                    <p>
                        The indie supergroup’s full-length debut blends the distinct voices of Phoebe Bridgers, Lucy Dacus, and Julien Baker into a cohesive, emotionally raw experience.
                    </p>
                    <p>Rating: 9.3 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/oneMoreTime_blink182.jpg" alt="blink-182 – One More Time…">
                <div class="card-content">
                    <h3>blink-182 – One More Time…</h3>
                    <p>
                        Reunited with Tom DeLonge, blink-182 returns with "One More Time…", a nostalgic and heartfelt album balancing maturity and the band’s signature pop-punk energy.
                    </p>
                    <p>Rating: 8.3 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/1989tv_taylorSwift.jpg" alt="Taylor Swift – 1989 (Taylor’s Version)">
                <div class="card-content">
                    <h3>Taylor Swift – 1989 (Taylor’s Version)</h3>
                    <p>
                        Taylor Swift reclaims her pop breakthrough album with polished production, five vault tracks, and a mature delivery that breathes new life into old hits.
                    </p>
                    <p>Rating: 9.0 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/scarlet_dojaCat.jpg" alt="Doja Cat – Scarlet">
                <div class="card-content">
                    <h3>Doja Cat – Scarlet</h3>
                    <p>
                        “Scarlet” marks a darker, more rap-centered pivot for Doja Cat, showcasing her lyrical agility and willingness to defy genre expectations.
                    </p>
                    <p>Rating: 8.4 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/eternalSunshine_arianaGrande.jpg" alt="Ariana Grande – eternal sunshine">
                <div class="card-content">
                    <h3>Ariana Grande – eternal sunshine</h3>
                    <p>
                        Ariana Grande’s "eternal sunshine" blends sleek pop production with introspective lyrics and subtle sci-fi motifs, reflecting on love, healing, and identity.
                    </p>
                    <p>Rating: 9.0 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/theTorturedPoets_taylorSwift.jpg" alt="Taylor Swift – The Tortured Poets Department">
                <div class="card-content">
                    <h3>Taylor Swift – The Tortured Poets Department</h3>
                    <p>
                        A sprawling double album, “The Tortured Poets Department” sees Taylor Swift diving into poetic melancholy and confessional storytelling across 31 tracks.
                    </p>
                    <p>Rating: 8.7 / 10</p>
                </div>
            </div>

            <div class="card">
                <iframe style="border-radius:12px" 
                    src="https://open.spotify.com/embed/playlist/2OEMX8cjJ3jyGFL2CQTetW?utm_source=generator&theme=0" 
                    width="100%" 
                    height="380" 
                    frameBorder="0" 
                    allowfullscreen="" 
                    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" 
                    loading="lazy"></iframe>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/whereYouStand_travis.jpg" alt="Travis – Where You Stand">
                <div class="card-content">
                    <h3>Travis – Where You Stand</h3>
                    <p>
                        "Where You Stand" is a heartfelt return to form for Scottish band Travis, filled with melodic soft rock and reflections on love, aging, and resilience.
                    </p>
                    <p>Rating: 7.5 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/surf_mattMartians.png" alt="Donnie Trumpet & The Social Experiment – Surf">
                <div class="card-content">
                    <h3>Donnie Trumpet & The Social Experiment – Surf</h3>
                    <p>
                        A genre-defying collaborative album, “Surf” blends jazz, hip-hop, and soul into an uplifting, eclectic experience led by Chance the Rapper and friends.
                    </p>
                    <p>Rating: 8.6 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/igor_tyler.jpg" alt="Tyler, The Creator – IGOR">
                <div class="card-content">
                    <h3>Tyler, The Creator – IGOR</h3>
                    <p>
                        "IGOR" is a genre-blending masterpiece that explores love and loss through experimental production, cementing Tyler’s evolution as an artist and producer.
                    </p>
                    <p>Rating: 9.5 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/fossora_bjork.jpg" alt="Björk – Fossora">
                <div class="card-content">
                    <h3>Björk – Fossora</h3>
                    <p>
                        "Fossora" is a rich, earthy sonic exploration where Björk delves into themes of motherhood, grief, and fungi, blending electronic textures with clarinets and bass.
                    </p>
                    <p>Rating: 8.7 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/lana_oceanblvd.jpg" alt="Lana Del Rey – Did You Know That There’s a Tunnel Under Ocean Blvd">
                <div class="card-content">
                    <h3>Lana Del Rey – Did You Know That There’s a Tunnel Under Ocean Blvd</h3>
                    <p>
                        A sprawling, introspective album where Lana reflects on legacy, family, and mortality, wrapped in poetic storytelling and lush piano ballads.
                    </p>
                    <p>Rating: 9.4 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/rammstein_zeit.jpg" alt="Rammstein – Zeit">
                <div class="card-content">
                    <h3>Rammstein – Zeit</h3>
                    <p>
                        On “Zeit,” Rammstein reflects on time and mortality through thunderous industrial rock, showcasing both brutality and unexpected vulnerability.
                    </p>
                    <p>Rating: 8.0 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/burnaboy_loveDamini.jpg" alt="Burna Boy – Love, Damini">
                <div class="card-content">
                    <h3>Burna Boy – Love, Damini</h3>
                    <p>
                        Burna Boy’s "Love, Damini" blends Afrobeats, reggae, and pop, presenting a personal and global soundscape of love, loss, and celebration.
                    </p>
                    <p>Rating: 8.4 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/pinkPantheress_heaven.jpg" alt="PinkPantheress – Heaven knows">
                <div class="card-content">
                    <h3>PinkPantheress – Heaven knows</h3>
                    <p>
                        "Heaven knows" captures PinkPantheress’s signature blend of UK garage, drum & bass, and confessional pop in a polished and emotionally resonant debut.
                    </p>
                    <p>Rating: 8.6 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/jazmineHotels.jpg" alt="Jazmine Sullivan – Heaux Tales">
                <div class="card-content">
                    <h3>Jazmine Sullivan – Heaux Tales</h3>
                    <p>
                        A bold and intimate R&B project, “Heaux Tales” blends powerful vocals and personal narratives about love, insecurity, and agency from a Black woman’s lens.
                    </p>
                    <p>Rating: 9.1 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/callMeIfYouGetLost.jpg" alt="Tyler, The Creator – Call Me If You Get Lost">
                <div class="card-content">
                    <h3>Tyler, The Creator – Call Me If You Get Lost</h3>
                    <p>
                        A lavish hip-hop travelogue, Tyler mixes braggadocio with emotional honesty, drawing from jazz, soul, and synth-funk in this Grammy-winning masterpiece.
                    </p>
                    <p>Rating: 9.3 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/fleetFoxes_shore.jpg" alt="Fleet Foxes – Shore">
                <div class="card-content">
                    <h3>Fleet Foxes – Shore</h3>
                    <p>
                        "Shore" is a warm, optimistic folk album that radiates calm and resilience, filled with rich harmonies and Robin Pecknold’s introspective songwriting.
                    </p>
                    <p>Rating: 8.5 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/fkaTwigs_caprisongs.jpg" alt="FKA twigs – CAPRISONGS">
                <div class="card-content">
                    <h3>FKA twigs – CAPRISONGS</h3>
                    <p>
                        A vibrant mixtape full of experimentation and joy, “CAPRISONGS” showcases FKA twigs embracing her pop instincts while staying rooted in avant-garde artistry.
                    </p>
                    <p>Rating: 8.8 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/silkSonic.jpg" alt="Silk Sonic – An Evening With Silk Sonic">
                <div class="card-content">
                    <h3>Silk Sonic – An Evening With Silk Sonic</h3>
                    <p>
                        Bruno Mars and Anderson .Paak deliver a silky-smooth retro soul and funk album filled with charm, romance, and timeless grooves.
                    </p>
                    <p>Rating: 9.0 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/lizzo_special.jpg" alt="Lizzo – Special">
                <div class="card-content">
                    <h3>Lizzo – Special</h3>
                    <p>
                        “Special” is an empowering and exuberant pop record, with Lizzo’s signature confidence and positivity backed by vibrant production and catchy hooks.
                    </p>
                    <p>Rating: 8.1 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/mitski_laurelHell.jpg" alt="Mitski – Laurel Hell">
                <div class="card-content">
                    <h3>Mitski – Laurel Hell</h3>
                    <p>
                        On “Laurel Hell,” Mitski confronts artistic burnout and personal disillusionment through glossy synth-pop textures and introspective lyricism.
                    </p>
                    <p>Rating: 8.6 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/beabadoobee_beatopia.jpg" alt="beabadoobee – Beatopia">
                <div class="card-content">
                    <h3>beabadoobee – Beatopia</h3>
                    <p>
                        "Beatopia" is a dreamy, genre-blending journey of bedroom pop, grunge, and shoegaze that explores inner worlds and emotional complexity.
                    </p>
                    <p>Rating: 8.3 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/pvris_evergreen.jpg" alt="PVRIS – EVERGREEN">
                <div class="card-content">
                    <h3>PVRIS – EVERGREEN</h3>
                    <p>
                        "EVERGREEN" pushes PVRIS toward electronic rock with sharp, haunting vocals and themes of rebirth, self-preservation, and transformation.
                    </p>
                    <p>Rating: 8.0 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/nicki_pinkFriday2.jpg" alt="Nicki Minaj – Pink Friday 2">
                <div class="card-content">
                    <h3>Nicki Minaj – Pink Friday 2</h3>
                    <p>
                        “Pink Friday 2” is a confident return to form for Nicki Minaj, combining punchline-heavy bars with genre-hopping production and global influences.
                    </p>
                    <p>Rating: 8.2 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/gorillaz_crackerIsland.jpg" alt="Gorillaz – Cracker Island">
                <div class="card-content">
                    <h3>Gorillaz – Cracker Island</h3>
                    <p>
                        With star-studded collaborations and sleek production, “Cracker Island” sees Gorillaz continue their dystopian funk-pop journey with infectious grooves.
                    </p>
                    <p>Rating: 8.5 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/janelleMonae_ageOfPleasure.jpg" alt="Janelle Monáe – The Age of Pleasure">
                <div class="card-content">
                    <h3>Janelle Monáe – The Age of Pleasure</h3>
                    <p>
                        A celebration of queer Black joy, "The Age of Pleasure" blends reggae, Afrobeats, and funk into a lush, liberating sonic experience.
                    </p>
                    <p>Rating: 8.7 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/theSmile_wallOfEyes.jpg" alt="The Smile – Wall of Eyes">
                <div class="card-content">
                    <h3>The Smile – Wall of Eyes</h3>
                    <p>
                        On their second album, Radiohead offshoot The Smile blend jazz-inflected rhythms, moody guitar, and experimental atmospheres in cryptic beauty.
                    </p>
                    <p>Rating: 8.9 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/noahKahan_stickSeason.jpg" alt="Noah Kahan – Stick Season">
                <div class="card-content">
                    <h3>Noah Kahan – Stick Season</h3>
                    <p>
                        “Stick Season” channels raw emotionality through rustic folk-pop storytelling, earning Noah Kahan acclaim for his honest and relatable songwriting.
                    </p>
                    <p>Rating: 8.4 / 10</p>
                </div>
            </div>

            <div class="card">
                <img src="../COVERPHOTO/boyNextDoor_how.png" alt="BOYNEXTDOOR – HOW?">
                <div class="card-content">
                    <h3>BOYNEXTDOOR – HOW?</h3>
                    <p>
                        Rising K-pop group BOYNEXTDOOR offers catchy melodies and youthful energy in “HOW?”, blending playful R&B and pop with heartfelt lyricism.
                    </p>
                    <p>Rating: 7.9 / 10</p>
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
                    We believe music is a universal language that transcends borders, and we’re here to help you discover new artists, albums, and genres that might not always make it to the mainstream spotlight.
                </p>
                <p>
                    Whether you're a curious newcomer or a lifelong fan of global music, our site offers a unique and personal take on what’s worth listening to — and why it matters.
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
    </body>
</html>