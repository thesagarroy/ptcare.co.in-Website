<?php
// config/config.php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'pthealthcare');

// Dynamic URL configuration to support both Localhost and Hostinger automatic deployment
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$domain = $_SERVER['HTTP_HOST'] ?? 'localhost';

if ($domain === 'localhost' || $domain === '127.0.0.1') {
    define('SITE_URL', 'http://localhost/PTCARE%20WEBSITE');
} else {
    // If hosted on Hostinger (e.g., ptcare.co.in)
    define('SITE_URL', $protocol . '://' . $domain);
}

define('SITE_NAME', 'P.T. HEALTHCARE PVT. LTD');
?>
