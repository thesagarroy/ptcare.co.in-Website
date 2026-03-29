<?php
// config/config.php

// Dynamic configuration to support both Localhost and Hostinger
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$domain = $_SERVER['HTTP_HOST'] ?? 'localhost';

if ($domain === 'localhost' || $domain === '127.0.0.1') {
    // ---- LOCALHOST DATABASE CREDENTIALS ----
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'pthealthcare');
    define('SITE_URL', 'http://localhost/PTCARE%20WEBSITE');
} else {
    // ---- HOSTINGER (PRODUCTION) DATABASE CREDENTIALS ----
    // You MUST change these values to match your Hostinger MySQL database details!
    define('DB_HOST', 'localhost'); // Usually 'localhost' on Hostinger
    define('DB_USER', 'u476804574_thesagarroy'); // Change this! (e.g. u1234567_ptcare)
    define('DB_PASS', '#ParichitiStudios@SGurd23Hostinger'); // Change this!
    define('DB_NAME', 'u476804574_PTCarePHP');     // Change this! (e.g. u1234567_pthealthcare)
    
    define('SITE_URL', $protocol . '://' . $domain);
}

define('SITE_NAME', 'P.T. HEALTHCARE PVT. LTD');
?>
