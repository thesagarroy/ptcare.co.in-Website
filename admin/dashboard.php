<?php
// admin/dashboard.php
require_once __DIR__ . '/../includes/auth.php';
requireRole('admin');
require_once __DIR__ . '/../includes/db.php';

// Quick Stats
$totalOrders = $pdo->query("SELECT COUNT(*) FROM orders")->fetchColumn();
$pendingOrders = $pdo->query("SELECT COUNT(*) FROM orders WHERE status = 'pending'")->fetchColumn();
$totalRevenue = $pdo->query("SELECT SUM(total) FROM orders WHERE status = 'delivered'")->fetchColumn() ?: 0;
$totalProducts = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();

// Recent Orders
$recentOrders = $pdo->query("SELECT * FROM orders ORDER BY created_at DESC LIMIT 5")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | P.T Healthcare</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: { extend: { colors: { bipraj: '#b1e7ff', bislaim: '#01d2b6' } } }
        }
    </script>
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
            <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 bg-bislaim/10 text-white rounded-xl font-medium transition">
                <i class="fa-solid fa-chart-line w-5"></i> Dashboard
            </a>
            <a href="add-product.php" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 hover:text-white rounded-xl font-medium transition">
                <i class="fa-solid fa-box-open w-5"></i> Products
            </a>
            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 hover:text-white rounded-xl font-medium transition">
                <i class="fa-solid fa-cart-shopping w-5"></i> Orders
            </a>
            <a href="users.php" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 hover:text-white rounded-xl font-medium transition">
                <i class="fa-solid fa-users w-5"></i> Users
            </a>
        </nav>
        <div class="p-4 border-t border-slate-800">
            <a href="../logout.php" class="flex items-center gap-3 px-4 py-3 hover:bg-red-500/10 hover:text-red-400 rounded-xl font-medium transition">
                <i class="fa-solid fa-right-from-bracket w-5"></i> Logout
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <!-- Top header -->
        <header class="h-20 bg-white border-b border-slate-200 flex justify-between items-center px-8 shrink-0">
            <h1 class="text-2xl font-bold text-slate-800">Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?> 👋</h1>
            <a href="../index.php" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-2 px-4 rounded-lg transition text-sm">
                View Website <i class="fa-solid fa-arrow-up-right-from-square ml-1"></i>
            </a>
        </header>

        <!-- Dashboard Content -->
        <div class="flex-1 overflow-y-auto p-8">
            
            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                    <div class="w-14 h-14 rounded-xl bg-blue-50 text-blue-500 flex items-center justify-center text-2xl shrink-0"><i class="fa-solid fa-cart-arrow-down"></i></div>
                    <div>
                        <p class="text-sm font-medium text-slate-500">Total Orders</p>
                        <h3 class="text-2xl font-bold text-slate-900"><?php echo $totalOrders; ?></h3>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                    <div class="w-14 h-14 rounded-xl bg-orange-50 text-orange-500 flex items-center justify-center text-2xl shrink-0"><i class="fa-solid fa-clock"></i></div>
                    <div>
                        <p class="text-sm font-medium text-slate-500">Pending Orders</p>
                        <h3 class="text-2xl font-bold text-slate-900"><?php echo $pendingOrders; ?></h3>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                    <div class="w-14 h-14 rounded-xl bg-emerald-50 text-emerald-500 flex items-center justify-center text-2xl shrink-0"><i class="fa-solid fa-indian-rupee-sign"></i></div>
                    <div>
                        <p class="text-sm font-medium text-slate-500">Total Revenue</p>
                        <h3 class="text-2xl font-bold text-slate-900">₹<?php echo number_format((float)$totalRevenue, 2); ?></h3>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                    <div class="w-14 h-14 rounded-xl bg-purple-50 text-purple-500 flex items-center justify-center text-2xl shrink-0"><i class="fa-solid fa-box-open"></i></div>
                    <div>
                        <p class="text-sm font-medium text-slate-500">Total Products</p>
                        <h3 class="text-2xl font-bold text-slate-900"><?php echo $totalProducts; ?></h3>
                    </div>
                </div>
            </div>

            <!-- Recent Orders Table -->
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-100 flex justify-between items-center">
                    <h3 class="font-bold text-lg text-slate-800">Recent Orders</h3>
                    <a href="orders.php" class="text-sm font-medium text-bislaim hover:text-emerald-500">View All</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-slate-500 text-sm border-b border-slate-200">
                                <th class="py-3 px-6 font-medium">Order ID</th>
                                <th class="py-3 px-6 font-medium">Customer</th>
                                <th class="py-3 px-6 font-medium">Amount</th>
                                <th class="py-3 px-6 font-medium">Status</th>
                                <th class="py-3 px-6 font-medium">Date</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <?php foreach($recentOrders as $order): ?>
                            <tr class="border-b border-slate-100 hover:bg-slate-50 transition">
                                <td class="py-4 px-6 font-medium text-slate-900">#<?php echo str_pad($order['id'], 5, '0', STR_PAD_LEFT); ?></td>
                                <td class="py-4 px-6 text-slate-600"><?php echo htmlspecialchars($order['customer_name']); ?></td>
                                <td class="py-4 px-6 font-bold text-slate-700">₹<?php echo number_format($order['total'], 2); ?></td>
                                <td class="py-4 px-6">
                                    <?php if($order['status'] === 'pending'): ?>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">Pending</span>
                                    <?php elseif($order['status'] === 'delivered'): ?>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Delivered</span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Cancelled</span>
                                    <?php endif; ?>
                                </td>
                                <td class="py-4 px-6 text-slate-500"><?php echo date('M j, Y', strtotime($order['created_at'])); ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if(empty($recentOrders)): ?>
                            <tr>
                                <td colspan="5" class="py-8 text-center text-slate-500">No recent orders.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
</body>
</html>
