<?php

// Start the session
session_start();

class sessionHandle
{
    // Go to login.php?login if not logged in
    public function isLoggedIn() {
        if (!isset($_SESSION["id"]) && !isset($_SESSION["email"]) && !isset($_SESSION["name"]) && !isset($_SESSION["username"]) && $_SESSION["loggedin"] != true) {
            header("location: login.php?login");
            exit;
        }
    }

    // Go to the index.php once logged in
    public function proceedToLogin() {
        if (isset($_SESSION["id"]) && isset($_SESSION["email"]) && isset($_SESSION["name"]) && isset($_SESSION["username"]) && $_SESSION["loggedin"] == true) {
            header("location: ./index.php");
            exit;
        }
    }
}