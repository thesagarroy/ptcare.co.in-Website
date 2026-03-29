<?php
// admin/users.php
require_once __DIR__ . '/../includes/auth.php';
requireRole('admin');
require_once __DIR__ . '/../includes/db.php';

// Add Staff logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_staff') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if(!empty($name) && !empty($email) && !empty($password)) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'staff')");
        try {
            $stmt->execute([$name, $email, $hashed]);
            header("Location: users.php?msg=added");
            exit;
        } catch(PDOException $e) {
            $error = "Email already exists!";
        }
    }
}

// Fetch Users
$users = $pdo->query("SELECT * FROM users ORDER BY created_at DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users | Admin</title>
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
            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 hover:text-white rounded-xl font-medium transition">
                <i class="fa-solid fa-cart-shopping w-5"></i> Orders
            </a>
            <a href="users.php" class="flex items-center gap-3 px-4 py-3 bg-bislaim/10 text-white rounded-xl font-medium transition">
                <i class="fa-solid fa-users w-5"></i> Users
            </a>
        </nav>
    </aside>

    <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <header class="h-20 bg-white border-b border-slate-200 flex justify-between items-center px-8 shrink-0">
            <h1 class="text-2xl font-bold text-slate-800">User Management</h1>
            <button onclick="document.getElementById('addModal').classList.remove('hidden')" class="bg-slate-900 hover:bg-black text-white px-4 py-2 rounded-lg font-bold text-sm transition flex items-center gap-2">
                <i class="fa-solid fa-plus"></i> Add Staff
            </button>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            <?php if(isset($_GET['msg']) && $_GET['msg'] === 'added'): ?>
                <div class="bg-green-50 text-green-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-circle-check"></i> Staff account created successfully.
                </div>
            <?php endif; ?>
            <?php if(isset($error)): ?>
                <div class="bg-red-50 text-red-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-circle-exclamation"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-slate-500 text-sm border-b border-slate-200">
                                <th class="py-3 px-6 font-medium">Name</th>
                                <th class="py-3 px-6 font-medium">Email</th>
                                <th class="py-3 px-6 font-medium">Role</th>
                                <th class="py-3 px-6 font-medium">Registered Date</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <?php foreach($users as $user): ?>
                            <tr class="border-b border-slate-100 hover:bg-slate-50 transition">
                                <td class="py-4 px-6 font-bold text-slate-800 flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-500 font-bold">
                                        <?php echo substr($user['name'], 0, 1); ?>
                                    </div>
                                    <?php echo htmlspecialchars($user['name']); ?>
                                </td>
                                <td class="py-4 px-6 text-slate-600"><?php echo htmlspecialchars($user['email']); ?></td>
                                <td class="py-4 px-6">
                                    <?php if($user['role'] === 'admin'): ?>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-purple-100 text-purple-800"><i class="fa-solid fa-crown mr-1"></i> Admin</span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-100 text-blue-800"><i class="fa-solid fa-user-tie mr-1"></i> Staff</span>
                                    <?php endif; ?>
                                </td>
                                <td class="py-4 px-6 text-slate-500"><?php echo date('M j, Y', strtotime($user['created_at'])); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div id="addModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden flex items-center justify-center z-50">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 m-4">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-xl text-slate-900">Create Staff Account</h3>
                <button onclick="document.getElementById('addModal').classList.add('hidden')" class="text-slate-400 hover:text-slate-600"><i class="fa-solid fa-times text-xl"></i></button>
            </div>
            
            <form method="POST">
                <input type="hidden" name="action" value="add_staff">
                <div class="space-y-4 mb-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Full Name</label>
                        <input type="text" name="name" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-bislaim outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Email Address</label>
                        <input type="email" name="email" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-bislaim outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Password</label>
                        <input type="password" name="password" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-bislaim outline-none">
                    </div>
                </div>
                <button type="submit" class="w-full bg-bislaim text-white font-bold py-3 rounded-xl hover:bg-emerald-500 transition">Create Account</button>
            </form>
        </div>
    </div>
</body>
</html>
