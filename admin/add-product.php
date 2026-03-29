<?php
// admin/add-product.php
require_once __DIR__ . '/../includes/auth.php';
requireRole('admin');
require_once __DIR__ . '/../includes/db.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $brand = $_POST['brand'] ?? '';
    $size = $_POST['size'] ?? '';
    $price = $_POST['price'] ?? 0;
    
    if (empty($name) || empty($brand) || empty($size) || empty($price)) {
        $error = "All fields are required.";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO products (name, brand, size, price) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $brand, $size, $price]);
            $success = "Product added successfully!";
        } catch(PDOException $e) {
            $error = "Error adding product.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | Admin</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>tailwind.config = { theme: { extend: { colors: { bislaim: '#01d2b6' } } } }</script>
</head>
<body class="bg-slate-50 font-sans flex min-h-screen">
    
    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col shrink-0">
        <div class="h-20 flex items-center px-8 border-b border-slate-800">
            <span class="text-xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-shield-halved text-bislaim"></i> Admin Panel
            </span>
        </div>
        <nav class="flex-1 px-4 py-8 space-y-2">
            <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 hover:text-white rounded-xl font-medium transition">
                <i class="fa-solid fa-chart-line w-5"></i> Dashboard
            </a>
            <a href="add-product.php" class="flex items-center gap-3 px-4 py-3 bg-bislaim/10 text-white rounded-xl font-medium transition">
                <i class="fa-solid fa-box-open w-5"></i> Products
            </a>
            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 hover:text-white rounded-xl font-medium transition">
                <i class="fa-solid fa-cart-shopping w-5"></i> Orders
            </a>
            <a href="users.php" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 hover:text-white rounded-xl font-medium transition">
                <i class="fa-solid fa-users w-5"></i> Users
            </a>
        </nav>
    </aside>

    <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <header class="h-20 bg-white border-b border-slate-200 flex justify-between items-center px-8 shrink-0">
            <h1 class="text-2xl font-bold text-slate-800">Add New Product</h1>
        </header>

        <div class="flex-1 overflow-y-auto p-8 flex justify-center items-start">
            <div class="w-full max-w-2xl bg-white rounded-2xl border border-slate-100 shadow-sm p-8 mt-10">
                
                <?php if($success): ?>
                    <div class="bg-green-50 text-green-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-2">
                        <i class="fa-solid fa-circle-check"></i> <?php echo $success; ?>
                    </div>
                <?php endif; ?>
                
                <?php if($error): ?>
                    <div class="bg-red-50 text-red-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-2">
                        <i class="fa-solid fa-circle-exclamation"></i> <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Product Name</label>
                        <input type="text" name="name" required placeholder="e.g. Bipraj 1L Pack" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-bislaim focus:border-bislaim outline-none transition">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Brand</label>
                            <select name="brand" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-bislaim focus:border-bislaim outline-none transition appearance-none">
                                <option value="Bipraj">Bipraj</option>
                                <option value="Bislaim">Bislaim</option>
                                <option value="Bislini">Bislini</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Size</label>
                            <select name="size" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-bislaim focus:border-bislaim outline-none transition appearance-none">
                                <option value="500ml">500ml</option>
                                <option value="1L">1L</option>
                                <option value="2L">2L</option>
                                <option value="5L">5L</option>
                                <option value="20L">20L</option>
                            </select>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Price (₹)</label>
                        <input type="number" step="0.01" name="price" required placeholder="0.00" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-bislaim focus:border-bislaim outline-none transition">
                    </div>

                    <button type="submit" class="w-full bg-bislaim text-white font-bold py-4 px-6 rounded-xl hover:bg-emerald-500 transition shadow-md flex justify-center items-center gap-2">
                        <i class="fa-solid fa-plus"></i> Add Product
                    </button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
