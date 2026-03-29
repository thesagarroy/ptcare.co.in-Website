<?php
// config/config.php

// ---- HOSTINGER (PRODUCTION) DATABASE CREDENTIALS ----
// Only Hostinger database credentials are used here.
define('DB_HOST', 'localhost'); // Server hostname is localhost when running ON Hostinger
define('DB_USER', 'u476804574_thesagarroy'); 
define('DB_PASS', '#ParichitiStudios@SGurd23Hostinger'); 
define('DB_NAME', 'u476804574_PTCarePHP');

// Dynamic URL configuration 
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$domain = $_SERVER['HTTP_HOST'] ?? 'ptcare.co.in';

if (strpos($domain, 'localhost') !== false || $domain === '127.0.0.1') {
    define('SITE_URL', 'http://localhost/PTCARE%20WEBSITE');
} else {
    define('SITE_URL', $protocol . '://' . $domain);
}
define('SITE_NAME', 'P.T. HEALTHCARE PVT. LTD');
?>
