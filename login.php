<?php
// login.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Direct redirect if already logged in based on role
if(isset($_SESSION['user_id'])) {
    if($_SESSION['role'] === 'admin') header("Location: admin/dashboard.php");
    else header("Location: staff/dashboard.php");
    exit;
}
include 'includes/header.php';
?>

<div class="min-h-[80vh] flex items-center justify-center bg-slate-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
        
        <div class="text-center mb-10">
            <div class="mx-auto bg-bislaim/10 w-20 h-20 rounded-full flex items-center justify-center mb-6">
                <i class="fa-solid fa-shield-halved text-4xl text-bislaim"></i>
            </div>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Access Portal</h2>
            <p class="text-slate-500 mt-2">Sign in to your Administrator or Staff account</p>
        </div>

        <?php if(isset($_SESSION['login_error'])): ?>
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm text-center font-medium flex items-center justify-center gap-2">
                <i class="fa-solid fa-circle-exclamation"></i>
                <?php 
                    echo $_SESSION['login_error']; 
                    unset($_SESSION['login_error']);
                ?>
            </div>
        <?php endif; ?>

        <form action="authenticate.php" method="POST" class="space-y-6">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Email Address</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <input type="email" name="email" required placeholder="admin@pthealthcare.in" class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-bislaim focus:border-bislaim outline-none transition text-slate-800 font-medium">
                </div>
            </div>
            
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <input type="password" name="password" required placeholder="••••••••" class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-bislaim focus:border-bislaim outline-none transition text-slate-800 font-medium">
                </div>
            </div>
            
            <button type="submit" class="w-full bg-slate-900 text-white font-bold py-4 px-6 rounded-xl hover:bg-black transition shadow-md flex justify-center items-center gap-2">
                Sign In <i class="fa-solid fa-arrow-right text-sm"></i>
            </button>
        </form>
        
        <div class="mt-8 text-center text-sm text-slate-400">
            <p>Protected area. Unauthorized access is strictly prohibited.</p>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
