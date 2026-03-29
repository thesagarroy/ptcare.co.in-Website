<?php
// config/config.php

// Dynamic configuration to support both Localhost and Hostinger
// Universal Hostinger Database Credentials (Works on localhost & live server)
define('DB_HOST', 'srv2109.hstgr.io'); 
define('DB_USER', 'u476804574_thesagarroy');
define('DB_PASS', '#ParichitiStudios@SGurd23Hostinger');
define('DB_NAME', 'u476804574_PTCarePHP');

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$domain = $_SERVER['HTTP_HOST'] ?? 'localhost';

if (strpos($domain, 'localhost') !== false || $domain === '127.0.0.1') {
    define('SITE_URL', 'http://localhost/PTCARE%20WEBSITE');
} else {
    define('SITE_URL', $protocol . '://' . $domain);
}

define('SITE_NAME', 'P.T. HEALTHCARE PVT. LTD');
?>
