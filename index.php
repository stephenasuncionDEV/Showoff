<?php
// Error Handlers
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Functionalities
require_once 'database/database.php';
require_once 'templates/functions/sessionHandler.php';
require_once 'templates/functions/loginHandler.php';
require_once 'templates/functions/profileHandler.php';
require_once 'templates/functions/postHandler.php';
require_once 'templates/functions/otherHandler.php';

// Connecting to the database
$pdo = db_connect();

// Containers and Global Vars
$RECENT_POST_LIMIT = 5;
$TOP_ARTIST_LIMIT = 10;
$postContainer = [];
$postMostLikesContainer = [];

// Handlers
$post = new postHandle();
$profile = new profileHandle();
$login = new loginHandle();
$session = new sessionHandle();
$session->isLoggedIn(); // Check if user is not logged in
$login->logout(); // Logout user (from post request)
$post->get_posts(); // Get all posts
$post->get_posts_most_likes(); // Get all posts with most likes
$post->addLikes(); // Handler to add likes to post

//Display the Main Page
include 'templates/index.php';