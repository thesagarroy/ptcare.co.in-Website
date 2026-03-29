<?php
// config/config.php

// Dynamic configuration to support both Localhost and Hostinger
// Dynamic configuration to support both Localhost and Hostinger
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$domain = $_SERVER['HTTP_HOST'] ?? 'localhost';

if (strpos($domain, 'localhost') !== false || $domain === '127.0.0.1') {
    // ---- LOCALHOST (XAMPP) DATABASE CREDENTIALS ----
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'pthealthcare');
    define('SITE_URL', 'http://localhost/PTCARE%20WEBSITE');
} else {
    // ---- HOSTINGER (PRODUCTION) DATABASE CREDENTIALS ----
    define('DB_HOST', 'localhost'); // Server hostname is usually localhost when running ON Hostinger
    define('DB_USER', 'u476804574_thesagarroy'); 
    define('DB_PASS', '#ParichitiStudios@SGurd23Hostinger'); 
    define('DB_NAME', 'u476804574_PTCarePHP');
    
    define('SITE_URL', $protocol . '://' . $domain);
}

define('SITE_NAME', 'P.T. HEALTHCARE PVT. LTD');
?>
