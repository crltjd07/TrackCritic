$(document).ready(function() {
    // WHOLE HEADER
    const header = document.createElement("div");
    header.id = "header";

    // HEADER LEFT
    const headerLeft = document.createElement("div");
    headerLeft.id = "headerLeft";

    const logo = document.createElement("img");
    logo.id = "trackCriticLogo";
    logo.src = "../trackCriticLogo.png";

    const titleLink = document.createElement("a");
    titleLink.href = "../HOMEPAGE/trackCriticHome.php";
    const title = document.createElement("h1");
    title.textContent = "TrackCritic";
    titleLink.append(title);

    const subtitle = document.createElement("p");
    subtitle.textContent = "est.2025";

    headerLeft.append(logo);
    headerLeft.append(titleLink);
    headerLeft.append(subtitle);

    // HEADER RIGHT
    const headerRight = document.createElement("div");
    headerRight.id = "headerRight";

    const navigationInHeader = document.createElement("div");
    navigationInHeader.id = "navigationInHeader";
    const navLinks = [
    { text: "Home", href: "../HOMEPAGE/trackCriticHome.php" },
    { text: "Contacts", href: "../HOMEPAGE/trackCriticHome.php#footer" },
    { text: "Reviews", href: "../REVIEW/trackCriticReview.php" },
    { text: "Polls", href: "../POLL/trackCriticPoll.php" },
    { text: "Newsletter", href: "../NEWSLETTER/trackCriticNewsletter.php" }
    ];

    // LOOP THROUGH NAVIGATION LINKS AND CREATE ANCHOR ELEMENTS
    for (let i = 0; i < navLinks.length; i++) {
        const a = document.createElement("a");
        a.href = navLinks[i].href;
        a.textContent = navLinks[i].text;
        navigationInHeader.append(a);
    }

    const searchBar = document.createElement("input");
    searchBar.type = "text";
    searchBar.placeholder = "Search tracks, albums, artists, genres and more!";
    searchBar.id = "searchBar";

    // EVENT LISTENER FOR MOUSEOVER ON SEARCH BAR TO CHANGE PLACEHOLDER TEXT
    searchBar.addEventListener("mouseover", () => {
        searchBar.placeholder = "Start typing to search...";
    });

    // EVENT LISTENER FOR MOUSEOUT ON SEARCH BAR TO RESTORE ORIGINAL PLACEHOLDER TEXT
    searchBar.addEventListener("mouseout", () => {
        searchBar.placeholder = "Search tracks, albums, artists, genres and more!";
    });

    // EVENT LISTENER FOR KEYDOWN ON SEARCH BAR TO HANDLE ENTER KEY FOR SEARCH
    searchBar.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            const query = searchBar.value.trim();
            if (query) {
                window.location.href = "../REVIEW/trackCriticReview.php?search=" + encodeURIComponent(query);
            }
        }
    });

    const logInLink = document.createElement("a");
    logInLink.href = "../LOGIN/trackCriticLogIn.php";

    const logInButton = document.createElement("button");
    logInButton.textContent = "Log In";
    logInLink.append(logInButton);

    const signUpLink = document.createElement("a");
    signUpLink.href = "../SIGNUP/trackCriticSignUp.php";

    const signUpButton = document.createElement("button");
    signUpButton.textContent = "Sign Up";
    signUpLink.append(signUpButton);

    const userProfileLink = document.createElement("a");
    userProfileLink.href = "../PROFILE/trackCriticProfile.php";

    const userProfile = document.createElement("img");
    userProfile.id = "userProfile";
    userProfile.src = "../defaultProfile.png";

    userProfileLink.append(userProfile);

    // CONDITIONAL RENDERING OF HEADERRIGHT CONTENT BASED ON CURRENT PAGE
    if (window.location.pathname.includes("trackCriticHome.php")) {
        headerRight.append(navigationInHeader);
        headerRight.append(searchBar);
        headerRight.append(logInLink);
        headerRight.append(signUpLink);
        headerRight.append(userProfileLink);
    } else {
        if (window.location.pathname.includes("trackCriticLogIn.php") ||
            window.location.pathname.includes("trackCriticSignUp.php") ||
            window.location.pathname.includes("trackCriticProfile.php")){
            headerLeft.classList.add("centerTitle");
            header.style.border = "none";
            if (window.location.pathname.includes("trackCriticProfile.php")) {
                header.style.backgroundColor = "#00000080";  
            } else {
                header.style.backgroundColor = "#000000bf";
            }
            
        } else {
            header.style.backgroundColor = "#00000080";  
            if (
                window.location.pathname.includes("trackCriticReview.php") ||
                window.location.pathname.includes("trackCriticPoll.php") ||
                window.location.pathname.includes("trackCriticNewsletter.php")
            ) {
                headerRight.append(searchBar);
                headerRight.append(userProfileLink);
            }
        }
    }
    
    // FUNCTION TO TOGGLE HEADER RIGHT VISIBILITY BASED ON WINDOW WIDTH
    function toggleHeaderRight() {
        if (window.innerWidth >= 925) {
            header.append(headerRight);
            headerRight.style.display = "flex";
        } else {
            headerRight.style.display = "none";
        }
    }

    header.append(headerLeft);
    toggleHeaderRight();
    // EVENT LISTENER FOR WINDOW RESIZE TO ADJUST HEADER RIGHT VISIBILITY
    window.addEventListener("resize", toggleHeaderRight);
    document.body.append(header);

    // NAVIGATION BAR
    const nav = document.createElement("div");
    nav.id = "nav";
    const logoNav = document.createElement("img");
    logoNav.id = "logoNav";
    logoNav.src = "../trackCriticLogoSimplified.png";

    const navContent = document.createElement("div");
    navContent.id = "navContent";

    // LOOP THROUGH NAVIGATION LINKS AND CREATE ANCHOR ELEMENTS FOR THE NAV BAR
    for (let i = 0; i < navLinks.length; i++) {
        const a = document.createElement("a");
        a.href = navLinks[i].href;
        a.textContent = navLinks[i].text;
        navContent.append(a);
    }

    // CONDITIONAL STYLING AND BEHAVIOR OF THE NAVIGATION BAR BASED ON CURRENT PAGE
    if (window.location.pathname.includes("/HOMEPAGE/trackCriticHome.php") ||
        window.location.pathname.includes("/LOGIN/trackCriticLogIn.php") ||
        window.location.pathname.includes("/SIGNUP/trackCriticSignUp.php")) 
    {
        nav.style.display = "none";   
    } else {
        navContent.style.display = "none";
        nav.style.width = "max-content";
        nav.style.margin = "0 20px 20px auto";
            // EVENT LISTENERS FOR MOUSEOVER AND MOUSEOUT ON NAV BAR TO SHOW/HIDE CONTENT
            nav.addEventListener("mouseover", () => {
                navContent.style.display = "block";
                navContent.style.width = "max-content";
                navContent.style.marginRight = "50px";
            });

            nav.addEventListener("mouseout", () => {
                navContent.style.display = "none";
            });
    }

    nav.append(navContent);
    nav.append(logoNav);
    
    document.body.append(nav);

    // AJAX CALL TO CHECK LOGIN STATUS
    $.ajax({
        url: "../setup/check_login.php",
        method: "GET",
        success: function(response) {
            // IF USER IS LOGGED IN, REMOVE LOGIN AND SIGN UP LINKS
            if (response == "1") {
                $(logInLink).remove();
                $(signUpLink).remove();
            }
        }
    });
});