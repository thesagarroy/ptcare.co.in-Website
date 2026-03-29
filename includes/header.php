<?php
// includes/header.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../config/config.php';
$base_url = SITE_URL . '/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        bipraj: '#b1e7ff',
                        bislaim: '#01d2b6',
                        bislini: '#00b098', // darker shade for bislini accents
                    }
                }
            }
        }
    </script>
    
    <!-- Minor Custom CSS for overrides -->
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; color: #1e293b; }
        .swiper-button-next, .swiper-button-prev { color: #1e293b; background: rgba(255,255,255,0.7); width: 50px; height: 50px; border-radius: 50%; }
        .swiper-button-next:after, .swiper-button-prev:after { font-size: 1.2rem; font-weight: bold; }
        .dropdown:hover .dropdown-menu { display: block; }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    <!-- Global Header -->
    <header class="bg-white/90 backdrop-blur-md sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <a href="<?php echo $base_url; ?>index.php" class="flex items-center gap-2 text-2xl font-extrabold text-bislaim">
                    <i class="fa-solid fa-droplet pb-1"></i>
                    <span>PT Healthcare</span>
                </a>
                
                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="<?php echo $base_url; ?>index.php" class="text-gray-700 hover:text-bislaim font-medium transition">Home</a>
                    <a href="<?php echo $base_url; ?>about.php" class="text-gray-700 hover:text-bislaim font-medium transition">About</a>
                    
                    <!-- Brands Dropdown -->
                    <div class="relative dropdown group">
                        <button class="text-gray-700 hover:text-bislaim font-medium transition flex items-center gap-1">
                            Brands <i class="fa-solid fa-chevron-down text-xs transition group-hover:rotate-180"></i>
                        </button>
                        <div class="dropdown-menu absolute hidden pt-4 w-48 -left-4 z-50">
                            <div class="bg-white rounded-xl shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                <a href="<?php echo $base_url; ?>brands/bipraj.php" class="block px-4 py-3 text-sm text-gray-700 hover:bg-bipraj hover:text-black transition">Bipraj</a>
                                <a href="<?php echo $base_url; ?>brands/bislaim.php" class="block px-4 py-3 text-sm text-gray-700 hover:bg-bislaim hover:text-white transition">Bislaim</a>
                                <a href="<?php echo $base_url; ?>brands/bislini.php" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-bislaim hover:to-bipraj hover:text-black transition">Bislini</a>
                            </div>
                        </div>
                    </div>
                    
                    <a href="<?php echo $base_url; ?>products.php" class="text-gray-700 hover:text-bislaim font-medium transition">Products</a>
                    <a href="<?php echo $base_url; ?>contact.php" class="text-gray-700 hover:text-bislaim font-medium transition">Contact</a>
                </nav>

                <!-- Action Icons -->
                <div class="flex items-center gap-5">
                    <a href="<?php echo $base_url; ?>cart.php" class="relative text-gray-700 hover:text-bislaim transition text-lg">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span id="headerCartCount" class="absolute -top-2 -right-3 bg-bislaim text-white text-[10px] font-bold h-5 w-5 rounded-full flex items-center justify-center shadow-md">0</span>
                    </a>
                    
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <a href="<?php echo $base_url; ?><?php echo $_SESSION['role'] === 'admin' ? 'admin' : 'staff'; ?>/dashboard.php" class="text-gray-700 hover:text-bislaim transition text-xl" title="Dashboard">
                            <i class="fa-solid fa-circle-user"></i>
                        </a>
                    <?php else: ?>
                        <a href="<?php echo $base_url; ?>login.php" class="text-gray-700 hover:text-bislaim transition text-lg" title="Login">
                            <i class="fa-solid fa-user"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Main Content Wrapper (Grows to push footer down) -->
    <main class="flex-grow">
