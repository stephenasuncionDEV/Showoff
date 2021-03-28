<?php
// Error Handlers
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Functionalities
require_once 'database/database.php';
require_once 'templates/functions/sessionHandler.php';
require_once 'templates/functions/loginHandler.php';

// Connecting to the database
$pdo = db_connect();

// Handlers
$login = new loginHandle();

//Display the login page
include 'templates/login.php';