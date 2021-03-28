<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Showoff</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="title" content="Showoff: Share your own song worldwide">
        <meta name="description" content="Home - Social Media for sharing your songs">
        <meta name="keywords" content="Showoff, Home">
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="src/style-main.css">
        <script src="https://kit.fontawesome.com/537b282863.js" crossorigin="anonymous"></script>
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
                <div id="profile-container">
                    <img src="images/user.png" alt="User Profile Picture">
                    <a href="index.php?profile=<?php echo $_SESSION['id'] ?>">
                        <div id="profile-info">
                            <p><?php $profile->get_Name(); ?> ( <?php $profile->get_Username(); ?> )</p>
                            <p><?php $profile->get_Email(); ?></p>
                            <p>User ID: <?php $profile->get_ID(); ?></p>
                        </div>
                    </a>
                    <div id="logout-button">
                        <form name="logout" method="post">
                            <button type='submit' name='logout' class='main-button button-red'>Logout</button>
                        </form>
                    </div>
                </div>
                <div class="arrow-container"><i class="fas fa-chevron-up"></i></div>
                <?php
                    $profile->get_profile();
                ?>
                <div class="main-container">
                    <div class="container">
                        <div class="container-wrapper">
                            <h1 class="container-title">Post your song</h1>
                            <form action="index.php" name="newpost" method="post">
                                <label for='title'>Title:</label><input type='text' name='title' id='title'>
                                <label for='content'>Lyrics:</label><textarea name='content' id='content' rows="6"></textarea>
                                <div id='post-button'>
                                    <p id="post-errors"><?php echo $post->post_handler(); ?></p>
                                    <p id="content-count">(0, 255)</p>
                                    <button type='submit' name='postcontent' id="post-button-act" class='main-button'>Post Content</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div>
                        <?php
                            $post->displayPosts();
                        ?>
                    </div>
                </div>
                <?php
                    $post->displayTop10Artist();
                ?>
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
        <script src="src/main.js"></script>
    </body>
</html>