<?php
// includes/db.php
require_once __DIR__ . '/../config/config.php';

/*
// --- REAL DATABASE CONNECTION (TEMPORARILY DISABLED) --- //
try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    die("Database Connection failed: " . $e->getMessage());
}
*/

// --- MOCK DATABASE CONNECTION (SO THE WEBSITE SHOWS UP) --- //
// Once the database is fixed, delete the Mock class below and uncomment the real connection above.

global $mock_products;
$mock_products = [
    ['id' => 1, 'name' => 'Bipraj Premium Water 1L', 'brand' => 'Bipraj', 'size' => '1L', 'price' => 20.00, 'created_at' => '2026-01-01'],
    ['id' => 2, 'name' => 'Bipraj Standard 5L', 'brand' => 'Bipraj', 'size' => '5L', 'price' => 65.00, 'created_at' => '2026-01-01'],
    ['id' => 3, 'name' => 'Bislaim Mineral Edge 500ml', 'brand' => 'Bislaim', 'size' => '500ml', 'price' => 10.00, 'created_at' => '2026-01-01'],
    ['id' => 4, 'name' => 'Bislini Crystal Clear 2L', 'brand' => 'Bislini', 'size' => '2L', 'price' => 30.00, 'created_at' => '2026-01-01'],
    ['id' => 5, 'name' => 'Bislini Family Pack 20L', 'brand' => 'Bislini', 'size' => '20L', 'price' => 80.00, 'created_at' => '2026-01-01']
];

class MockPDO {
    public function query($sql) { return new MockStatement($sql); }
    public function prepare($sql) { return new MockStatement($sql); }
}

class MockStatement {
    public function execute($params = []) { return true; }
    public function fetchAll() { 
        global $mock_products; 
        return $mock_products; 
    }
    public function fetch() { 
        global $mock_products; 
        return $mock_products[0] ?? null; 
    }
    public function fetchColumn() { return 0; }
}

$pdo = new MockPDO();
?>
