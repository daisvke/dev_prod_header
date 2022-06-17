<?php

define ("DEV", 0);
define ("PROD", 1);
$devOrProd = DEV;

if ($devOrProd == DEV)
{ // If development, enter data from your local settings
    // URL from localhost
    define("URL", "http://localhost/mywebsite");
    // PDO request
    define("DB_HOST", "localhost");
    define("DB_NAME", "mylocal_db_name");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    // Show all PHP errors
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
else
{ // If production, enter data from your host settings
    define("URL", "https://mywebsite");
    define("DB_HOST", "myhostname");
    define("DB_NAME", "mydbname");
    define("DB_USER", "mydbusername");
    define("DB_PASSWORD", "mydbpassword");
    // Hide all PHP errors
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Reach database
try {
    $db = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
        // For error checking
        if ($devOrProd == 1) { // If development mode
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}
