<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php $login->title();?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="title" content="Showoff: Share your own song worldwide">
        <meta name="description" content="Login - Login to your account">
        <meta name="keywords" content="Showoff, Login">
        <link rel="icon" href="favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="src/style-login.css">
        <script src="src/jquery-validation-1.19.3/lib/jquery.js"></script>
        <script src="src/jquery-validation-1.19.3/dist/jquery.validate.js"></script>
    </head>

    <body>
        <header>
            <div id="logo">
                <img src="images/logo.png" alt="Showoff Logo">
                <h1>Showoff</h1>
                <p>Share your own song worldwide</p>
            </div>
        </header>
        <main>
            <div class="container">
               <div class="second-container">
                    <?php
                        $login->display_login();
                        $login->status();
                    ?>
                </div>
            </div>
            <?php
                $login->display_second_container();
            ?>
        </main>
        <footer>
            <p>Copyright © 2021 Stephen Asuncion</p>
        </footer>
        <?php
            $login->validate();
        ?>
    </body>
</html>