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
    <title><?php echo defined('SITE_NAME') ? SITE_NAME : 'P.T Healthcare Pvt. Ltd.'; ?></title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bipraj: '#b1e7ff',
                        bislaim: '#01d2b6',
                        ptdark: '#1e293b',
                        ptred: '#dc2626' // For action buttons like RajServices
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                        heading: ['Montserrat', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>
<body class="bg-white font-sans text-slate-800 antialiased pt-[124px]"> <!-- Padding to offset fixed headers -->

    <!-- 1. Top Announcement Bar -->
    <div class="bg-slate-100 border-b border-slate-200 text-slate-600 text-xs py-2 fixed top-0 w-full z-50">
        <div class="w-full px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex items-center gap-4 font-medium">
                <span class="flex items-center gap-1.5 hover:text-ptred transition"><i class="fa-solid fa-truck-fast"></i> Delivery across West Bengal</span>
                <span class="hidden md:inline text-slate-300">|</span>
                <span class="hidden md:flex items-center gap-1.5 hover:text-ptdark transition"><i class="fa-solid fa-leaf text-green-500"></i> ISO 9001:2015 Certified</span>
            </div>
            <div class="flex items-center gap-4 font-bold">
                <a href="<?php echo $base_url; ?>contact.php" class="hover:text-ptred transition"><i class="fa-solid fa-location-dot"></i> Find Distributors</a>
                <span class="hidden md:inline text-slate-300">|</span>
                <a href="tel:+919876543210" class="flex items-center gap-2 bg-white px-3 py-1 rounded-full shadow-sm text-slate-800 hover:text-ptred transition">
                    <i class="fa-solid fa-phone"></i> +91 98765 43210
                </a>
            </div>
        </div>
    </div>

    <!-- 2. Main Stylish Navigation Header -->
    <header class="bg-white shadow-md fixed top-[37px] sm:top-[34px] w-full z-40 transition-all duration-300" id="mainHeader">
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <!-- Logo Zone -->
                <div class="flex-shrink-0 flex items-center pr-8">
                    <a href="<?php echo $base_url; ?>index.php" class="flex items-center gap-3 group">
                        <!-- YOU CAN UPLOAD YOUR LOGO HERE: assets/images/logo/logo.png -->
                        <!-- If logo exists, it will show this, otherwise fallback to the icon -->
                        <div class="relative w-12 h-12 flex items-center justify-center bg-gradient-to-br from-bislaim to-blue-500 rounded-xl text-white shadow-md group-hover:shadow-lg transition">
                            <i class="fa-solid fa-droplet text-2xl"></i>
                        </div>
                        <div class="hidden sm:block">
                            <span class="block text-xl font-heading font-black text-slate-900 tracking-tight leading-none group-hover:text-bislaim transition">P.T. HEALTHCARE</span>
                            <span class="block text-[0.65rem] font-bold text-slate-400 tracking-widest uppercase mt-1">Pvt. Ltd.</span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation Links (Center aligned) -->
                <nav class="hidden md:flex flex-1 items-center justify-center space-x-1 lg:space-x-4 border-slate-100">
                    <a href="<?php echo $base_url; ?>index.php" class="px-4 py-2 text-[15px] font-bold text-slate-700 hover:text-bislaim rounded-lg hover:bg-slate-50 transition">Home</a>
                    <a href="<?php echo $base_url; ?>about.php" class="px-4 py-2 text-[15px] font-bold text-slate-700 hover:text-bislaim rounded-lg hover:bg-slate-50 transition">About Us</a>
                    <a href="<?php echo $base_url; ?>products.php" class="px-4 py-2 text-[15px] font-bold text-slate-700 hover:text-bislaim rounded-lg hover:bg-slate-50 transition">Products</a>
                    <a href="<?php echo $base_url; ?>certificates.php" class="px-4 py-2 text-[15px] font-bold text-slate-700 hover:text-bislaim rounded-lg hover:bg-slate-50 transition">Certificates</a>
                    
                    <!-- Dropdown for Brands -->
                    <div class="relative group">
                        <button class="px-4 py-2 text-[15px] font-bold text-slate-700 hover:text-bislaim rounded-lg hover:bg-slate-50 transition flex items-center gap-1">
                            Brands <i class="fa-solid fa-chevron-down text-[10px] mt-0.5"></i>
                        </button>
                        <div class="absolute left-0 mt-0 w-48 bg-white border border-slate-100 rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50 overflow-hidden">
                            <div class="p-2 space-y-1">
                                <a href="<?php echo $base_url; ?>brands/bipraj.php" class="block px-4 py-2 text-sm font-bold text-slate-600 hover:bg-bipraj/20 hover:text-slate-900 rounded-lg transition">💧 Bipraj</a>
                                <a href="<?php echo $base_url; ?>brands/bislaim.php" class="block px-4 py-2 text-sm font-bold text-slate-600 hover:bg-bislaim/20 hover:text-slate-900 rounded-lg transition">🌿 Bislaim</a>
                                <a href="<?php echo $base_url; ?>brands/bislini.php" class="block px-4 py-2 text-sm font-bold text-slate-600 hover:bg-gradient-to-r from-bislaim/20 to-bipraj/20 hover:text-slate-900 rounded-lg transition">🧊 Bislini</a>
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- Right Side Actions (Buttons & Cart) -->
                <div class="flex flex-shrink-0 items-center justify-end gap-3 sm:gap-4 pl-4 border-l border-slate-100">
                    
                    <!-- Shopping Cart Icon with absolute badge -->
                    <a href="<?php echo $base_url; ?>cart.php" class="relative p-2 text-slate-600 hover:text-ptdark transition group">
                        <i class="fa-solid fa-cart-shopping text-xl group-hover:scale-110 transition"></i>
                        <span id="headerCartCount" class="absolute top-0 right-0 -mt-1 -mr-2 bg-ptred text-white text-[10px] font-bold w-5 h-5 flex items-center justify-center rounded-full border-2 border-white shadow-sm transform scale-0 transition duration-300">0</span>
                    </a>

                    <div class="hidden sm:block w-px h-8 bg-slate-200 mx-1"></div>

                    <!-- Prominent Buttons like RajServices (Call to Action) -->
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <?php $dash_link = ($_SESSION['role'] === 'admin') ? 'admin/dashboard.php' : 'staff/dashboard.php'; ?>
                        <a href="<?php echo $base_url . $dash_link; ?>" class="hidden sm:flex items-center gap-2 bg-slate-900 text-white px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-black transition shadow-md">
                            <i class="fa-solid fa-gauge-high"></i> Dashboard
                        </a>
                    <?php else: ?>
                        <!-- Login / Client Portal -->
                        <a href="<?php echo $base_url; ?>login.php" class="hidden sm:flex items-center gap-2 border-2 border-slate-200 text-slate-700 px-5 py-2 rounded-lg text-sm font-bold hover:border-slate-800 hover:text-slate-900 transition bg-white">
                            <i class="fa-solid fa-user"></i> Log In
                        </a>
                        <a href="<?php echo $base_url; ?>contact.php" class="hidden md:flex items-center gap-2 bg-ptred text-white px-6 py-2.5 rounded-lg text-sm font-bold hover:bg-red-700 transition shadow-md shadow-red-500/30">
                            <i class="fa-solid fa-envelope"></i> GET QUOTE
                        </a>
                    <?php endif; ?>

                    <!-- Mobile Menu Button -->
                    <button class="md:hidden p-2 text-slate-600 hover:text-slate-900 transition" id="mobileMenuBtn">
                        <i class="fa-solid fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu (Hidden by default) -->
        <div class="md:hidden hidden bg-white border-t border-slate-100 absolute w-full shadow-2xl" id="mobileMenu">
            <div class="px-4 py-6 space-y-2 max-h-[70vh] overflow-y-auto">
                <a href="<?php echo $base_url; ?>index.php" class="block px-4 py-3 text-base font-bold text-slate-800 bg-slate-50 rounded-xl">Home</a>
                <a href="<?php echo $base_url; ?>about.php" class="block px-4 py-3 text-base font-bold text-slate-700 hover:bg-slate-50 rounded-xl">About Us</a>
                <a href="<?php echo $base_url; ?>products.php" class="block px-4 py-3 text-base font-bold text-slate-700 hover:bg-slate-50 rounded-xl">Products</a>
                <a href="<?php echo $base_url; ?>certificates.php" class="block px-4 py-3 text-base font-bold text-slate-700 hover:bg-slate-50 rounded-xl">Certificates</a>
                
                <div class="py-2">
                    <p class="px-4 text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Our Brands</p>
                    <div class="grid grid-cols-1 gap-2 pl-4 border-l-2 border-slate-100 ml-4">
                        <a href="<?php echo $base_url; ?>brands/bipraj.php" class="block px-4 py-2 text-sm font-bold text-slate-600 hover:text-bipraj hover:bg-bipraj/10 rounded-lg">Bipraj</a>
                        <a href="<?php echo $base_url; ?>brands/bislaim.php" class="block px-4 py-2 text-sm font-bold text-slate-600 hover:text-bislaim hover:bg-bislaim/10 rounded-lg">Bislaim</a>
                        <a href="<?php echo $base_url; ?>brands/bislini.php" class="block px-4 py-2 text-sm font-bold text-slate-600 hover:text-bislaim hover:bg-gradient-to-r from-bislaim/10 to-bipraj/10 rounded-lg">Bislini</a>
                    </div>
                </div>
                
                <div class="h-px w-full bg-slate-100 my-4"></div>
                
                <?php if(!isset($_SESSION['user_id'])): ?>
                    <a href="<?php echo $base_url; ?>login.php" class="flex justify-center items-center gap-2 w-full border-2 border-slate-200 text-slate-700 px-5 py-3 rounded-xl text-base font-bold">
                        <i class="fa-solid fa-user"></i> Log In Portal
                    </a>
                <?php else: ?>
                    <a href="<?php echo $base_url . $dash_link; ?>" class="flex justify-center items-center gap-2 w-full bg-slate-900 text-white px-5 py-3 rounded-xl text-base font-bold">
                        <i class="fa-solid fa-gauge-high"></i> Open Dashboard
                    </a>
                <?php endif; ?>
                
                <a href="<?php echo $base_url; ?>contact.php" class="flex justify-center items-center gap-2 w-full bg-ptred text-white px-6 py-3 rounded-xl text-base font-bold shadow-md shadow-red-500/20 mt-2">
                    <i class="fa-solid fa-phone"></i> Contact & Support
                </a>
            </div>
        </div>
    </header>

    <script>
        // Global Cart Counter Logic
        function updateGlobalCartCount() {
            let cart = JSON.parse(localStorage.getItem('pthealthcare_cart')) || [];
            let totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            const badge = document.getElementById('headerCartCount');
            if(badge) {
                if(totalItems > 0) {
                    badge.textContent = totalItems;
                    badge.classList.remove('scale-0');
                    badge.classList.add('scale-100');
                } else {
                    badge.classList.remove('scale-100');
                    badge.classList.add('scale-0');
                }
            }
        }
        
        document.addEventListener('DOMContentLoaded', () => {
            updateGlobalCartCount(); // Initial check
            
            // Mobile Menu Toggle
            const btn = document.getElementById('mobileMenuBtn');
            const menu = document.getElementById('mobileMenu');
            if(btn && menu) {
                btn.addEventListener('click', () => {
                    menu.classList.toggle('hidden');
                    const icon = btn.querySelector('i');
                    if(menu.classList.contains('hidden')) {
                        icon.classList.remove('fa-xmark');
                        icon.classList.add('fa-bars');
                    } else {
                        icon.classList.remove('fa-bars');
                        icon.classList.add('fa-xmark');
                    }
                });
            }
        });
    </script>
    <main>
