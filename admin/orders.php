<?php
// admin/orders.php
require_once __DIR__ . '/../includes/auth.php';
requireRole('admin');
require_once __DIR__ . '/../includes/db.php';

// Handle Action (Delete Order)
if (isset($_POST['delete_order']) && isset($_POST['order_id'])) {
    $stmt = $pdo->prepare("DELETE FROM orders WHERE id = ?");
    $stmt->execute([$_POST['order_id']]);
    header("Location: orders.php?msg=deleted");
    exit;
}

// Fetch all orders
$orders = $pdo->query("SELECT * FROM orders ORDER BY created_at DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders | Admin</title>
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
            <a href="add-product.php" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 hover:text-white rounded-xl font-medium transition">
                <i class="fa-solid fa-box-open w-5"></i> Products
            </a>
            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 bg-bislaim/10 text-white rounded-xl font-medium transition">
                <i class="fa-solid fa-cart-shopping w-5"></i> Orders
            </a>
            <a href="users.php" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 hover:text-white rounded-xl font-medium transition">
                <i class="fa-solid fa-users w-5"></i> Users
            </a>
        </nav>
    </aside>

    <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <header class="h-20 bg-white border-b border-slate-200 flex justify-between items-center px-8 shrink-0">
            <h1 class="text-2xl font-bold text-slate-800">Order Management</h1>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            <?php if(isset($_GET['msg']) && $_GET['msg'] === 'deleted'): ?>
                <div class="bg-green-50 text-green-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-circle-check"></i> Order deleted successfully.
                </div>
            <?php endif; ?>

            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-slate-500 text-sm border-b border-slate-200">
                                <th class="py-3 px-6 font-medium">Order ID</th>
                                <th class="py-3 px-6 font-medium">Customer Details</th>
                                <th class="py-3 px-6 font-medium">Amount</th>
                                <th class="py-3 px-6 font-medium">Status</th>
                                <th class="py-3 px-6 font-medium text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <?php foreach($orders as $order): ?>
                            <tr class="border-b border-slate-100 hover:bg-slate-50 transition">
                                <td class="py-4 px-6 font-medium text-slate-900">#<?php echo str_pad($order['id'], 5, '0', STR_PAD_LEFT); ?></td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-slate-800"><?php echo htmlspecialchars($order['customer_name']); ?></div>
                                    <div class="text-slate-500 text-xs mt-1"><i class="fa-solid fa-phone mr-1"></i><?php echo htmlspecialchars($order['phone']); ?></div>
                                    <div class="text-slate-500 text-xs mt-1 truncate max-w-[200px]" title="<?php echo htmlspecialchars($order['address']); ?>"><i class="fa-solid fa-location-dot mr-1"></i><?php echo htmlspecialchars($order['address']); ?></div>
                                </td>
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
                                <td class="py-4 px-6 text-right">
                                    <form method="POST" onsubmit="return confirm('Are you sure you want to delete this order?');">
                                        <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                        <input type="hidden" name="delete_order" value="1">
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition bg-red-50 hover:bg-red-100 p-2 rounded-lg">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if(empty($orders)): ?>
                            <tr>
                                <td colspan="5" class="py-8 text-center text-slate-500">No orders found.</td>
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
