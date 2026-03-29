<?php
// staff/dashboard.php
require_once __DIR__ . '/../includes/auth.php';
requireRole('staff');
require_once __DIR__ . '/../includes/db.php';

// Quick Stats
$todayStart = date('Y-m-d 00:00:00');
$todayEnd = date('Y-m-d 23:59:59');

$pendingOrders = $pdo->query("SELECT COUNT(*) FROM orders WHERE status = 'pending'")->fetchColumn();
$todaysOrders = $pdo->prepare("SELECT COUNT(*) FROM orders WHERE created_at BETWEEN ? AND ?");
$todaysOrders->execute([$todayStart, $todayEnd]);
$todaysTotal = $todaysOrders->fetchColumn();

// Recent Pending Orders
$recentPending = $pdo->query("SELECT * FROM orders WHERE status = 'pending' ORDER BY created_at ASC LIMIT 5")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard | P.T Healthcare</title>
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
                <i class="fa-solid fa-headset text-blue-400"></i> Staff Panel
            </span>
        </div>
        <nav class="flex-1 px-4 py-8 space-y-2">
            <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 bg-blue-500/10 text-white rounded-xl font-medium transition">
                <i class="fa-solid fa-chart-line w-5"></i> Overview
            </a>
            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 hover:text-white rounded-xl font-medium transition">
                <i class="fa-solid fa-clipboard-check w-5"></i> Process Orders
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
        <header class="h-20 bg-white border-b border-slate-200 flex justify-between items-center px-8 shrink-0">
            <h1 class="text-2xl font-bold text-slate-800">Staff Portal, <?php echo htmlspecialchars($_SESSION['name']); ?></h1>
            <a href="../index.php" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-2 px-4 rounded-lg transition text-sm">
                View Website <i class="fa-solid fa-arrow-up-right-from-square ml-1"></i>
            </a>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4 border-l-4 border-orange-400">
                    <div class="w-14 h-14 rounded-xl bg-orange-50 text-orange-500 flex items-center justify-center text-2xl shrink-0"><i class="fa-solid fa-hourglass-half"></i></div>
                    <div>
                        <p class="text-sm font-medium text-slate-500">Orders Awaiting Processing</p>
                        <h3 class="text-2xl font-bold text-slate-900"><?php echo $pendingOrders; ?></h3>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4 border-l-4 border-blue-400">
                    <div class="w-14 h-14 rounded-xl bg-blue-50 text-blue-500 flex items-center justify-center text-2xl shrink-0"><i class="fa-solid fa-calendar-day"></i></div>
                    <div>
                        <p class="text-sm font-medium text-slate-500">Orders Received Today</p>
                        <h3 class="text-2xl font-bold text-slate-900"><?php echo $todaysTotal; ?></h3>
                    </div>
                </div>
            </div>

            <!-- Urgent Queue -->
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-100 flex justify-between items-center bg-red-50/50">
                    <h3 class="font-bold text-lg text-red-800"><i class="fa-solid fa-bell mr-2"></i>Urgent Delivery Queue</h3>
                    <a href="orders.php" class="text-sm font-medium text-red-600 hover:text-red-800">Process All</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-slate-500 text-sm border-b border-slate-200">
                                <th class="py-3 px-6 font-medium">Order ID</th>
                                <th class="py-3 px-6 font-medium">Customer</th>
                                <th class="py-3 px-6 font-medium">Amount</th>
                                <th class="py-3 px-6 font-medium">Time Elapsed</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <?php foreach($recentPending as $order): ?>
                                <?php 
                                    $created = new DateTime($order['created_at']);
                                    $now = new DateTime();
                                    $diff = $now->diff($created);
                                    $elapsed = '';
                                    if($diff->d > 0) $elapsed .= $diff->d . 'd ';
                                    if($diff->h > 0) $elapsed .= $diff->h . 'h ';
                                    $elapsed .= $diff->i . 'm';
                                ?>
                            <tr class="border-b border-slate-100 hover:bg-slate-50 transition">
                                <td class="py-4 px-6 font-medium text-slate-900">#<?php echo str_pad($order['id'], 5, '0', STR_PAD_LEFT); ?></td>
                                <td class="py-4 px-6 text-slate-600">
                                    <div class="font-bold text-slate-800"><?php echo htmlspecialchars($order['customer_name']); ?></div>
                                    <div class="text-slate-500 text-xs mt-1 truncate max-w-[200px]" title="<?php echo htmlspecialchars($order['address']); ?>"><?php echo htmlspecialchars($order['address']); ?></div>
                                </td>
                                <td class="py-4 px-6 font-bold text-slate-700">₹<?php echo number_format($order['total'], 2); ?></td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold <?php echo ($diff->d > 0 || $diff->h > 6) ? 'bg-red-100 text-red-800' : 'bg-orange-100 text-orange-800'; ?>">
                                        <i class="fa-solid fa-clock mr-1"></i> <?php echo $elapsed; ?> ago
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if(empty($recentPending)): ?>
                            <tr>
                                <td colspan="4" class="py-8 text-center text-slate-500">Queue is clear! Great job.</td>
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
