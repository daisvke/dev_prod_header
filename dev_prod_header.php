<?php
// Development = 1, production = anything else
$devOrProd = 1;

if ($devOrProd == 1) { // If development, enter data from your local settings
    // URL from localhost
    define("URL", "http://localhost/mywebsite");
    // PDO request
    define("DB_HOST", "localhost");
    define("DB_NAME", "mylocal_db_name");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    // reCAPTCHA
    define("RECAPTCHA_SUCCESS", "true");
} else { // If production, enter data from your host settings
    define("URL", "https://mywebsite");
    define("DB_HOST", "myhostname");
    define("DB_NAME", "mydbname");
    define("DB_USER", "mydbusername");
    define("DB_PASSWORD", "mydbpassword");
    define("RECAPTCHA_SUCCESS", "$recaptcha->success == true && $recaptcha->score >= 0.5 && $recaptcha->action == 'contact'");
}

// Reach database
try {
    $db = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}
?>
