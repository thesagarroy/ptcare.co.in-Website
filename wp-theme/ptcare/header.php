<?php
/**
 * header.php — PT Healthcare WordPress Theme
 * Converted from includes/header.php (custom PHP) to WordPress-compatible format.
 * Uses home_url('/') instead of $base_url, wp_head() for scripts/styles,
 * and is_user_logged_in() for the login/dashboard button logic.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white font-sans text-slate-800 antialiased pt-16 sm:pt-20 md:pt-28 lg:pt-[116px]'); ?>>

<?php wp_body_open(); ?>

    <!-- Header Wrapper -->
    <div class="fixed top-0 w-full z-50 flex flex-col">

        <!-- 1. Top Announcement Bar (Hidden on Mobile) -->
        <div class="hidden md:block bg-slate-100 border-b border-slate-200 text-slate-600 text-[11px] sm:text-xs py-1.5 sm:py-2 w-full">
            <div class="w-full px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-1 sm:gap-2">
                <div class="flex items-center gap-3 sm:gap-4 font-medium">
                    <span class="flex items-center gap-1.5 hover:text-ptred transition">
                        <i class="fa-solid fa-truck-fast"></i> Delivery across West Bengal
                    </span>
                    <span class="hidden md:inline text-slate-300">|</span>
                    <span class="hidden md:flex items-center gap-1.5 hover:text-ptdark transition">
                        <i class="fa-solid fa-leaf text-green-500"></i> ISO 9001:2015
                    </span>
                </div>
                <div class="flex items-center gap-3 sm:gap-4 font-bold">
                    <a href="<?php echo home_url('/contact'); ?>" class="hover:text-ptred transition hidden sm:inline-block">
                        <i class="fa-solid fa-location-dot"></i> Find Distributors
                    </a>
                    <span class="hidden md:inline text-slate-300">|</span>
                    <a href="tel:+91-7003450006" class="flex items-center gap-2 bg-white px-3 py-1 rounded-full shadow-sm text-slate-800 hover:text-ptred transition">
                        <i class="fa-solid fa-phone cursor-pointer"></i> +91 7003450006
                    </a>
                </div>
            </div>
        </div>

        <!-- 2. Main Navigation Header -->
        <header class="bg-white shadow-md w-full transition-all duration-300" id="mainHeader">
            <div class="w-full px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16 sm:h-20">

                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center pr-4 md:pr-8">
                        <a href="<?php echo home_url('/'); ?>" class="flex items-center gap-3 group">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/logo.png"
                                 alt="<?php bloginfo('name'); ?> Logo"
                                 class="h-10 md:h-12 w-auto object-contain group-hover:scale-105 transition duration-300 drop-shadow-sm">
                            <div class="hidden sm:block">
                                <span class="block text-xl font-heading font-black text-slate-900 tracking-tight leading-none group-hover:text-bislaim transition">
                                    P.T. HEALTHCARE
                                </span>
                                <span class="block text-[0.65rem] font-bold text-slate-400 tracking-widest uppercase mt-1">Pvt. Ltd.</span>
                            </div>
                        </a>
                    </div>

                    <!-- Desktop Navigation -->
                    <nav class="hidden md:flex flex-1 items-center justify-center space-x-1 lg:space-x-4">
                        <a href="<?php echo home_url('/'); ?>" class="px-4 py-2 text-[15px] font-bold text-slate-700 hover:text-bislaim rounded-lg hover:bg-slate-50 transition">Home</a>
                        <a href="<?php echo home_url('/about'); ?>" class="px-4 py-2 text-[15px] font-bold text-slate-700 hover:text-bislaim rounded-lg hover:bg-slate-50 transition">About Us</a>
                        <a href="<?php echo home_url('/products'); ?>" class="px-4 py-2 text-[15px] font-bold text-slate-700 hover:text-bislaim rounded-lg hover:bg-slate-50 transition">Products</a>
                        <a href="<?php echo home_url('/certificates'); ?>" class="px-4 py-2 text-[15px] font-bold text-slate-700 hover:text-bislaim rounded-lg hover:bg-slate-50 transition">Certificates</a>
                        <a href="<?php echo home_url('/team'); ?>" class="px-4 py-2 text-[15px] font-bold text-slate-700 hover:text-bislaim rounded-lg hover:bg-slate-50 transition">Team</a>

                        <!-- Brands Dropdown -->
                        <div class="relative group">
                            <button class="px-4 py-2 text-[15px] font-bold text-slate-700 hover:text-bislaim rounded-lg hover:bg-slate-50 transition flex items-center gap-1">
                                Brands <i class="fa-solid fa-chevron-down text-[10px] mt-0.5"></i>
                            </button>
                            <div class="absolute left-0 mt-0 w-48 bg-white border border-slate-100 rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50 overflow-hidden">
                                <div class="p-2 space-y-1">
                                    <a href="<?php echo home_url('/brands/bipraj'); ?>" class="block px-4 py-2 text-sm font-bold text-slate-600 hover:bg-bipraj/20 hover:text-slate-900 rounded-lg transition">💧 Bipraj</a>
                                    <a href="<?php echo home_url('/brands/bislaim'); ?>" class="block px-4 py-2 text-sm font-bold text-slate-600 hover:bg-bislaim/20 hover:text-slate-900 rounded-lg transition">🌿 Bislaim</a>
                                    <a href="<?php echo home_url('/brands/bislini'); ?>" class="block px-4 py-2 text-sm font-bold text-slate-600 hover:bg-slate-100 hover:text-slate-900 rounded-lg transition">🧊 Bislini</a>
                                </div>
                            </div>
                        </div>
                    </nav>

                    <!-- Right Actions -->
                    <div class="flex flex-shrink-0 items-center justify-end gap-3 sm:gap-4 pl-4 border-l border-slate-100">

                        <!-- Cart Icon -->
                        <a href="<?php echo home_url('/cart'); ?>" class="relative p-2 text-slate-600 hover:text-ptdark transition group">
                            <i class="fa-solid fa-cart-shopping text-xl group-hover:scale-110 transition"></i>
                            <span id="headerCartCount" class="absolute top-0 right-0 -mt-1 -mr-2 bg-ptred text-white text-[10px] font-bold w-5 h-5 flex items-center justify-center rounded-full border-2 border-white shadow-sm transform scale-0 transition duration-300">0</span>
                        </a>

                        <div class="hidden sm:block w-px h-8 bg-slate-200 mx-1"></div>

                        <!-- Login / Dashboard -->
                        <?php if (is_user_logged_in()) : ?>
                            <a href="<?php echo admin_url(); ?>" class="hidden sm:flex items-center gap-2 bg-slate-900 text-white px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-black transition shadow-md">
                                <i class="fa-solid fa-gauge-high"></i> Dashboard
                            </a>
                        <?php else : ?>
                            <a href="<?php echo wp_login_url(home_url('/')); ?>" class="hidden sm:flex items-center gap-2 border-2 border-slate-200 text-slate-700 px-5 py-2 rounded-lg text-sm font-bold hover:border-slate-800 hover:text-slate-900 transition bg-white">
                                <i class="fa-solid fa-user"></i> Log In
                            </a>
                            <a href="<?php echo home_url('/contact'); ?>" class="hidden md:flex items-center gap-2 bg-ptred text-white px-6 py-2.5 rounded-lg text-sm font-bold hover:bg-red-700 transition shadow-md shadow-red-500/30">
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
        </header>
    </div><!-- End Header Wrapper -->

    <!-- Mobile Navigation Menu -->
    <div class="md:hidden hidden bg-white border-t border-slate-100 fixed top-16 sm:top-20 w-full shadow-2xl z-40" id="mobileMenu">
        <div class="px-4 py-6 space-y-2 max-h-[80vh] overflow-y-auto">
            <a href="<?php echo home_url('/'); ?>" class="block px-4 py-3 text-base font-bold text-slate-800 bg-slate-50 rounded-xl">Home</a>
            <a href="<?php echo home_url('/about'); ?>" class="block px-4 py-3 text-base font-bold text-slate-700 hover:bg-slate-50 rounded-xl">About Us</a>
            <a href="<?php echo home_url('/products'); ?>" class="block px-4 py-3 text-base font-bold text-slate-700 hover:bg-slate-50 rounded-xl">Products</a>
            <a href="<?php echo home_url('/certificates'); ?>" class="block px-4 py-3 text-base font-bold text-slate-700 hover:bg-slate-50 rounded-xl">Certificates</a>
            <a href="<?php echo home_url('/team'); ?>" class="block px-4 py-3 text-base font-bold text-slate-700 hover:bg-slate-50 rounded-xl">Our Team</a>

            <div class="py-2">
                <p class="px-4 text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Our Brands</p>
                <div class="grid grid-cols-1 gap-2 pl-4 border-l-2 border-slate-100 ml-4">
                    <a href="<?php echo home_url('/brands/bipraj'); ?>" class="block px-4 py-2 text-sm font-bold text-slate-600 hover:text-bislaim hover:bg-bislaim/10 rounded-lg">Bipraj</a>
                    <a href="<?php echo home_url('/brands/bislaim'); ?>" class="block px-4 py-2 text-sm font-bold text-slate-600 hover:text-bislaim hover:bg-bislaim/10 rounded-lg">Bislaim</a>
                    <a href="<?php echo home_url('/brands/bislini'); ?>" class="block px-4 py-2 text-sm font-bold text-slate-600 hover:text-bislaim hover:bg-slate-100 rounded-lg">Bislini</a>
                </div>
            </div>

            <div class="h-px w-full bg-slate-100 my-4"></div>

            <?php if (is_user_logged_in()) : ?>
                <a href="<?php echo admin_url(); ?>" class="flex justify-center items-center gap-2 w-full bg-slate-900 text-white px-5 py-3 rounded-xl text-base font-bold">
                    <i class="fa-solid fa-gauge-high"></i> Open Dashboard
                </a>
            <?php else : ?>
                <a href="<?php echo wp_login_url(home_url('/')); ?>" class="flex justify-center items-center gap-2 w-full border-2 border-slate-200 text-slate-700 px-5 py-3 rounded-xl text-base font-bold">
                    <i class="fa-solid fa-user"></i> Log In Portal
                </a>
            <?php endif; ?>

            <a href="<?php echo home_url('/contact'); ?>" class="flex justify-center items-center gap-2 w-full bg-ptred text-white px-6 py-3 rounded-xl text-base font-bold shadow-md shadow-red-500/20 mt-2">
                <i class="fa-solid fa-phone"></i> Contact &amp; Support
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Cart badge
            (function() {
                const cart = JSON.parse(localStorage.getItem('pthealthcare_cart')) || [];
                const total = cart.reduce((s, i) => s + parseInt(i.quantity), 0);
                const badge = document.getElementById('headerCartCount');
                if (badge && total > 0) {
                    badge.textContent = total;
                    badge.classList.replace('scale-0', 'scale-100');
                }
            })();

            // Mobile menu toggle
            const btn = document.getElementById('mobileMenuBtn');
            const menu = document.getElementById('mobileMenu');
            if (btn && menu) {
                btn.addEventListener('click', () => {
                    menu.classList.toggle('hidden');
                    const icon = btn.querySelector('i');
                    icon.classList.toggle('fa-bars');
                    icon.classList.toggle('fa-xmark');
                });
            }
        });
    </script>

    <!-- Page Content Start -->
    <div id="page-content">
