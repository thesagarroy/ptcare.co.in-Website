<?php
// staff/orders.php
require_once __DIR__ . '/../includes/auth.php';
requireRole('staff');
require_once __DIR__ . '/../includes/db.php';

// Handle Action (Change Status)
if (isset($_POST['update_status']) && isset($_POST['order_id']) && isset($_POST['status'])) {
    $stmt = $pdo->prepare("UPDATE orders SET status = ? WHERE id = ?");
    $stmt->execute([$_POST['status'], $_POST['order_id']]);
    header("Location: orders.php?msg=updated");
    exit;
}

// Fetch pending and recent orders
$pendingOrders = $pdo->query("SELECT * FROM orders WHERE status = 'pending' ORDER BY created_at ASC")->fetchAll();
$completedOrders = $pdo->query("SELECT * FROM orders WHERE status != 'pending' ORDER BY created_at DESC LIMIT 20")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Orders | Staff</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans flex min-h-screen">
    
    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col shrink-0">
        <div class="h-20 flex items-center px-8 border-b border-slate-800">
            <span class="text-xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-headset text-blue-400"></i> Staff Panel
            </span>
        </div>
        <nav class="flex-1 px-4 py-8 space-y-2">
            <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 hover:text-white rounded-xl font-medium transition">
                <i class="fa-solid fa-chart-line w-5"></i> Overview
            </a>
            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 bg-blue-500/10 text-white rounded-xl font-medium transition">
                <i class="fa-solid fa-clipboard-check w-5"></i> Process Orders
            </a>
        </nav>
    </aside>

    <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <header class="h-20 bg-white border-b border-slate-200 flex justify-between items-center px-8 shrink-0">
            <h1 class="text-2xl font-bold text-slate-800">Process Orders</h1>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            <?php if(isset($_GET['msg']) && $_GET['msg'] === 'updated'): ?>
                <div class="bg-green-50 text-green-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-2 shadow-sm border border-green-100">
                    <i class="fa-solid fa-circle-check"></i> Order status updated successfully.
                </div>
            <?php endif; ?>

            <h2 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2"><i class="fa-solid fa-clock text-orange-400"></i> Awaiting Action</h2>
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden mb-10">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-slate-500 text-sm border-b border-slate-200">
                                <th class="py-3 px-6 font-medium">Order ID</th>
                                <th class="py-3 px-6 font-medium">Customer Details</th>
                                <th class="py-3 px-6 font-medium">Items Total</th>
                                <th class="py-3 px-6 font-medium text-right">Update Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <?php foreach($pendingOrders as $order): ?>
                            <tr class="border-b border-slate-100 hover:bg-slate-50 transition border-l-4 border-l-orange-400">
                                <td class="py-4 px-6 font-medium text-slate-900">#<?php echo str_pad($order['id'], 5, '0', STR_PAD_LEFT); ?></td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-slate-800 mb-1"><?php echo htmlspecialchars($order['customer_name']); ?></div>
                                    <div class="text-slate-500 text-xs mb-1"><i class="fa-solid fa-phone mr-1"></i><?php echo htmlspecialchars($order['phone']); ?></div>
                                    <div class="text-slate-500 text-xs bg-slate-100 p-2 rounded inline-block"><i class="fa-solid fa-location-dot mr-1"></i><?php echo htmlspecialchars($order['address']); ?></div>
                                </td>
                                <td class="py-4 px-6 font-bold text-slate-700 text-lg">₹<?php echo number_format($order['total'], 2); ?></td>
                                <td class="py-4 px-6 text-right">
                                    <form method="POST" class="flex items-center justify-end gap-2">
                                        <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                        <input type="hidden" name="update_status" value="1">
                                        <select name="status" class="bg-slate-50 border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-400 outline-none">
                                            <option value="pending" selected>Pending</option>
                                            <option value="delivered">Delivered</option>
                                            <option value="cancelled">Cancelled</option>
                                        </select>
                                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg text-sm font-bold transition shadow-sm">
                                            Save
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if(empty($pendingOrders)): ?>
                            <tr><td colspan="4" class="py-8 text-center text-slate-500">No pending orders.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <h2 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2"><i class="fa-solid fa-list-check text-green-500"></i> Recently Completed/Cancelled</h2>
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden opacity-75 hover:opacity-100 transition">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-slate-500 text-sm border-b border-slate-200">
                                <th class="py-3 px-6 font-medium">Order ID</th>
                                <th class="py-3 px-6 font-medium">Customer</th>
                                <th class="py-3 px-6 font-medium">Status</th>
                                <th class="py-3 px-6 font-medium text-right">Change</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <?php foreach($completedOrders as $order): ?>
                            <tr class="border-b border-slate-100">
                                <td class="py-3 px-6 font-medium text-slate-600">#<?php echo str_pad($order['id'], 5, '0', STR_PAD_LEFT); ?></td>
                                <td class="py-3 px-6 text-slate-600"><?php echo htmlspecialchars($order['customer_name']); ?></td>
                                <td class="py-3 px-6">
                                    <?php if($order['status'] === 'delivered'): ?>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold bg-green-100 text-green-800">Delivered</span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold bg-red-100 text-red-800">Cancelled</span>
                                    <?php endif; ?>
                                </td>
                                <td class="py-3 px-6 text-right">
                                    <!-- Give option to revert -->
                                    <form method="POST">
                                        <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                        <input type="hidden" name="update_status" value="1">
                                        <input type="hidden" name="status" value="pending">
                                        <button type="submit" class="text-xs text-blue-500 hover:text-blue-700 underline font-medium" onclick="return confirm('Revert back to pending?');">Revert to Pending</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
</body>
</html>
