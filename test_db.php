<?php
// test_db.php
// Diagnostic script to find the correct Database Credentials on Hostinger
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Hostinger Database Diagnostic</h1>";

$user = 'u476804574_thesagarroy';
$pass = '#ParichitiStudios@SGurd23Hostinger'; // Be 100% sure this is correct in hPanel
$dbname = 'u476804574_PTCarePHP';

$hosts_to_test = [
    'localhost',
    '127.0.0.1',
    'srv2109.hstgr.io',
    '82.25.121.80'
];

$success = false;

foreach ($hosts_to_test as $host) {
    echo "<h3>Testing connection to HOST: <code>$host</code>...</h3>";
    try {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_TIMEOUT => 3 // 3 second timeout
        ]);
        echo "<p style='color:green; font-weight:bold;'>✅ SUCCESS! The correct DB_HOST is: $host</p>";
        $success = true;
        // Update the config file automatically
        $config_path = __DIR__ . '/config/config.php';
        if (file_exists($config_path) && is_writable($config_path)) {
            $config_content = file_get_contents($config_path);
            $new_content = preg_replace("/define\('DB_HOST',\s*'.*?'\);/", "define('DB_HOST', '$host');", $config_content);
            file_put_contents($config_path, $new_content);
            echo "<p style='color:blue;'><i>I have automatically updated config/config.php to use $host! Visit your homepage now.</i></p>";
        }
        break;
    } catch (PDOException $e) {
        echo "<p style='color:red;'>❌ FAILED: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
    echo "<hr/>";
}

if (!$success) {
    echo "<h2>Conclusion:</h2>";
    echo "<p style='color:red;'>All connections failed! This proves 100% that either your <strong>Password</strong> is incorrect, or the User <strong>u476804574_thesagarroy</strong> has NOT been assigned to the Database <strong>u476804574_PTCarePHP</strong>.</p>";
    echo "<p>Go to Hostinger -> MySQL Databases -> Find the User and click Change Password. Type a new simple password (e.g. <code>Ptcare12345!</code>), update this test_db.php file with the new password, and try again.</p>";
}
?>
