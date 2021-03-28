<?php
include 'config.php';

// Connect to the database
function db_connect() {
    try {
        $connectionString = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME;
        $pdo = new PDO($connectionString, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
    }
}