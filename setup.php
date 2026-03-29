<?php
// setup.php - ONE TIME SETUP SCRIPT
// Run this file once in your browser on Hostinger to create the tables.
// e.g., go to https://ptcare.co.in/setup.php

require_once __DIR__ . '/includes/db.php';

try {
    // Read the schema.sql file
    $sql = file_get_contents(__DIR__ . '/database/schema.sql');
    
    // Execute the SQL commands
    $pdo->exec($sql);
    
    echo "<h1 style='color: green;'>Database Setup Successful!</h1>";
    echo "<p>All tables (users, products, orders, order_items) have been created and initial data was inserted.</p>";
    echo "<p><strong>IMPORTANT:</strong> For security reasons, please delete this <code>setup.php</code> file from your server after you see this success message.</p>";
    echo "<a href='index.php'>Go to Homepage</a>";
    
} catch(PDOException $e) {
    echo "<h1 style='color: red;'>Database Setup Failed</h1>";
    echo "<p>Error details: " . $e->getMessage() . "</p>";
}
?>
