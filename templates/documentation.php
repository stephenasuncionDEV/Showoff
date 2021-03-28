<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Showoff</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="title" content="Showoff: Share your own song worldwide">
        <meta name="description" content="Documentation - Learn more about Showoff">
        <meta name="keywords" content="Showoff, Documentation">
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="src/style-main.css">
        <link rel="stylesheet" href="src/style-documentation.css">
    </head>

    <body>
        <header>
            <div class="wrapper">
                <a href="index.php" id="logo-anchor">
                    <div id="logo">
                        <img src="images/logo.png" alt="Showoff Logo">
                        <h1>Showoff</h1>
                    </div>
                </a>
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="documentation.php">Documentation</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <div class="wrapper">
                <div class="image addSpaceTop"><img src="images/responsiveness.gif" alt="responsiveness animation"></div>
                <h1 id="documentation-title">Documentation</h1>
                <hr>
                <ul id="table-of-contents">
                    <li><a href="#intro">1 Introduction</a><li>
                    <li>
                        <a href="#overview">2 Overview</a>
                        <li><a href="#register" class="spacer1">2.1 Register</a></li>
                        <li><a href="#login" class="spacer1">2.2 Login</a></li>
                        <li><a href="#navigation" class="spacer1">2.3 Navigation</a></li>
                        <li><a href="#profile" class="spacer1">2.4 Profile Section</a></li>
                        <li><a href="#post" class="spacer1">2.5 Post Section</a></li>
                        <li><a href="#topartist" class="spacer1">2.6 Top Artist Section</a></li>
                        <li><a href="#showcase" class="spacer1">2.7 Implementation Showcase</a></li>
                    <li>
                    <li>
                        <a href="#validation">3 Validation</a>
                        <li><a href="#htmlvalidation" class="spacer1">3.1 HTML Validation</a></li>
                        <li><a href="#cssvalidation" class="spacer1">3.2 CSS Validation</a></li>
                    <li>
                    <li><a href="#future">4 Future Plans</a><li>
                    <li><a href="#references">5 References</a><li>
                </ul>
                <!-- Introduction -->
                <h2 class="subheadings" id="intro">Introduction</h2>
                <hr>
                <p class="subheading-para">To start off, this website was structured based on assignment 7 but I moved each database function to a specific class handlers to make the server-side cleaner and more organized. This project took me 4 days to make. It was meant for song writers to share their own song(s) online (kind of like a social media). It was made up of everything that we've covered in CPSC 2030.</p>
                <p class="subheading-para">This is not my firstime creating a php website connected to a database, I remember I did one last year when I used to sell some computer programs.</p><br>
                <!-- Overview -->
                <h2 class="subheadings" id="overview">Overview</h2>
                <hr>
                <!-- Register -->
                <h3 id="register">Register</h3>
                <p class="subheading-para">Once you go to the website (index.php) you cannot access it if you're not logged in, so you have to <a href="http://localhost/FinalProject/login.php?register">register</a>. You will be redirected to the login page if you're not logged in. To register simply click "register" somewhere below the login button. This uses client-size and server-side validation and sanitizer</p>
                <p class="subheading-para">Requirements: Email must be valid, Username's minimum length is 2 and no special characters. Password's minimum length is 5</p>
                <div class="image"><img src="images/overview_Register.png" alt="where to register picture"></div>
                <!-- Login -->
                <h3 id="login">Login</h3>
                <p class="subheading-para">Similarly to register, you cannot access index.php if you're not logged in, to login you must <a href="http://localhost/FinalProject/login.php?register">register</a> first. To login you can go to this link <a href="http://localhost/FinalProject/login.php?login">Login Page</a>. This uses client-side and server-side validation.</p>
                <p class="subheading-para">Requirements: Username must exist in the database, and Password must match the password in the database</p>
                <div class="image"><img src="images/overview_Login.png" alt="where to login picture"></div>
                <!-- Navigation -->
                <h3 id="navigation">Navigation</h3>
                <p class="subheading-para">This website's navigation is simple as it only has two pages, home page and documentation page.</p>
                <div class="image"><img src="images/overview_Navigation.png" alt="website's navigation"></div>
                <!-- Profile -->
                <h3 id="profile">Profile Section</h3>
                <p class="subheading-para">Profile section is where you can see your own profile. This is where you can see your Name, Usernaame, Email, and UserID (from the database). But not only that, you can also see the logout button where you can log off.</p>
                <p class="subheading-para">We can also see the animation here made with @keyframes, you can click the arrow up button to hide the profile container and you can click it back to unhide.</p>
                <div class="image"><img src="images/overview_Profile.png" alt="profile section"></div>
                <p class="subheading-para">You can also click the your name and your profile would show like below.</p>
                <div class="image"><img src="images/overview_Profile2.png" alt="profile"></div>
                <!-- Post -->
                <h3 id="post">Post Section</h3>
                <p class="subheading-para">Post section is where you can post your own song.</p>
                <p class="subheading-para">Requirements: Title must have between 2 and 30 characters, Content must have between 5 and 255 characters.</p>
                <div class="image"><img src="images/overview_Post.png" alt="post section"></div>
                <!-- Top Artist -->
                <h3 id="topartist">Top Artist Section</h3>
                <p class="subheading-para">Top Artist Section is where you can see top posters based on one of their post's likes. I used a masonry layout for this using flexbox and it was inspired by assignment 4 where we used masonry layout to display random pictures.</p>
                <div class="image"><img src="images/overview_Top.png" alt="top artist section"></div>
                <p class="subheading-para">You can also click on their name and their profile would show below your profile section.</p>
                <div class="image"><img src="images/overview_Top2.png" alt="top artist profile"></div>
                <!-- Implementation Showcase -->
                <h3 id="showcase">Implementation Showcase⭐</h3>
                <p class="subheading-para">I have implemented functionalities that I did not know I could make such as: The fire button, the collapsable profile container, and the icons on the top 10 artist.</p>
                <p class="subheading-para">Fire Button:</p>
                <div class="image"><img src="images/show_fireButton.png" alt="fire button"></div>
                <p class="subheading-para">Collapsable profile container:</p>
                <div class="image"><img src="images/show_collapsableDemo.gif" alt="collapsable profile container"></div>
                <p class="subheading-para">Top 10 artist Icons:</p>
                <div class="image"><img src="images/show_TopArtists.png" alt="top artist section"></div><br>
                <!-- Validation -->
                <h2 class="subheadings" id="validation">Validation</h2>
                <hr>
                <h3 id="htmlvalidation">HTML Validation</h3>
                <details>
                    <summary>Login</summary>
                    <img src="images/validation_Login.png" alt="login html validation">
                </details>
                <details>
                    <summary>Register</summary>
                    <img src="images/validation_Register.png" alt="register html validation">
                </details>
                <details>
                    <summary>Index</summary>
                    <img src="images/validation_Index.png" alt="index html validation">
                </details>
                <details>
                    <summary>Documentation</summary>
                    <img src="images/validation_Documentation.png" alt="documentation html validation">
                </details>
                <h3 id="cssvalidation">CSS Validation</h3>
                <details>
                    <summary>Main</summary>
                    <img src="images/css_validation_Main.png" alt="login html validation">
                </details>
                <details>
                    <summary>Login</summary>
                    <img src="images/css_validation_Login.png" alt="register html validation">
                </details>
                <details>
                    <summary>Documentation</summary>
                    <img src="images/css_validation_documentation.png" alt="index html validation">
                </details><br>
                <!-- Future Plans -->
                <h2 class="subheadings" id="future">Future Plans</h2>
                <hr>
                <p class="subheading-para">This site already has some good functionalities but I would like to add more such as limiting users to like a post multiple times. Also, I would like to increase the size of how many characters you can submit (it is currently 255). I'm also' planning on putting this project on my github after this semester.</p>
                <!-- References -->
                <h2 class="subheadings" id="references">References</h2>
                <hr>
                <div class="reference-container">
                    <p class="subheading-para">-Flexbox layout was inspired from Kevin Powell's youtube <a href="https://www.youtube.com/watch?v=vQAvjof1oe4">channel</a>.</p>
                </div>
                <div class="reference-container">
                    <p class="subheading-para">-Validate email (server-side) <a href="https://www.w3schools.com/php/php_form_url_email.asp">w3schools</a></p>
                </div>
                <div class="reference-container">
                    <p class="subheading-para" style="float: left">-Logo Icon:</p>
                    <img src="images/logo.png" alt="Showoff Logo" style="transform: scale(0.8)">
                    <div class="flat-icon">Icons made by <a href="https://www.flaticon.com/authors/eucalyp" title="Eucalyp">Eucalyp</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
                </div>
                <div class="reference-container">
                    <p class="subheading-para" style="float: left">-User Icon:</p>
                    <img src='images/user.png' alt='user icon' style="transform: scale(0.8)">
                    <div class="flat-icon">Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
                </div>
                <div class="reference-container">
                    <p class="subheading-para" style="float: left">-Top 1 Crown Icon:</p>
                    <img src='images/top1.png' alt='top 1 icon' style="transform: scale(0.8)">
                    <div class="flat-icon">Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
                </div>
                <div class="reference-container">
                    <p class="subheading-para" style="float: left">-Top 2 Crown Icon:</p>
                    <img src='images/top2.png' alt='top 2 icon' style="transform: scale(0.8)">
                    <div class="flat-icon">Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
                </div>
                <div class="reference-container">
                    <p class="subheading-para" style="float: left">-Top 3 Chain Icon:</p>
                    <img src='images/top3.png' alt='top 3 icon' style="transform: scale(0.8)">
                    <div class="flat-icon">Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
                </div>
                <div class="reference-container">
                    <p class="subheading-para">All Lyrics:</p>
                    <ul>
                        <li><a href="https://www.azlyrics.com/lyrics/lilbaby/driptoohard.html">AZlyrics.com (Drip Too Hard) by LilBaby</a></li>
                        <li><a href="https://www.azlyrics.com/lyrics/drake/wantsandneeds.html">AZlyrics.com (Wants and Needs) by Drake</a></li>
                        <li><a href="https://www.azlyrics.com/lyrics/ocdawgs/pauwinako.html">AZlyrics.com (Pauwi Nako) by Flow G</a></li>
                        <li><a href="https://www.azlyrics.com/lyrics/popsmoke/whatyouknowboutlove.html">AZlyrics.com (What You Know Bout Love) by Pop Smoke</a></li>
                        <li><a href="https://www.azlyrics.com/lyrics/chrisbrown/gocrazy.html">AZlyrics.com (Go Crazy) by Chris Brown</a></li>
                        <li><a href="https://www.azlyrics.com/lyrics/kehlani/toxic.html">AZlyrics.com (Toxic) by Kehlani</a></li>
                        <li><a href="https://www.azlyrics.com/lyrics/brysontiller/dont.html">AZlyrics.com (Don't) by Bryson Tiller</a></li>
                        <li><a href="https://www.azlyrics.com/lyrics/luhkel/howtolove.html">AZlyrics.com (How To Love) by Luh Kel</a></li>
                        <li><a href="https://www.azlyrics.com/lyrics/treysongz/slowmotion.html">AZlyrics.com (Slow Motion) by Trey Songz</a></li>
                    </ul>
                </div>
            </div>
        </main>
        <footer>
            <div id="footer-wrapper">
                <div class="wrapper">
                    <p>Showoff 2021</p>
                    <p>Copyright © 2021 Stephen Asuncion</p>
                    <a href="mailto:sasuncion02@mylangara.ca">sasuncion02@mylangara.ca</a>
                </div>
            </div>
        </footer>
    </body>
</html>