<?php
// index.php
require_once __DIR__ . '/includes/db.php';
include 'includes/header.php';

// Fetch all products for the homepage display
$stmt = $pdo->query("SELECT * FROM products ORDER BY brand, size");
$products = $stmt->fetchAll();
?>

<!-- Hero Slider Section -->
<section class="h-[65vh] min-h-[450px] md:min-h-[initial] md:h-[80vh] w-full relative group">
    <div class="swiper heroSwiper h-full w-full">
        <div class="swiper-wrapper">
            <!-- Slide 1: Bipraj -->
            <div class="swiper-slide bg-slate-100 relative flex items-center justify-start overflow-hidden">
                <!-- Desktop Banner Image -->
                <img src="<?php echo $base_url; ?>assets/images/banners/bipraj-banner.png" 
                     class="hidden sm:block absolute inset-0 w-full h-full object-cover object-center z-0" 
                     alt="Bipraj Promo Desktop">
                     
                <!-- Mobile Banner Image (Forces background image to stick to the RIGHT where bottles are) -->
                <img src="<?php echo $base_url; ?>assets/images/banners/bipraj-banner.png" 
                     class="block sm:hidden absolute inset-0 w-full h-full object-cover object-[80%_center] z-0" 
                     alt="Bipraj Promo Mobile">
                
                <!-- Advanced gradient to ensure text readability on mobile and desktop -->
                <div class="absolute inset-0 bg-gradient-to-r from-white/90 via-white/70 sm:via-white/40 to-transparent z-0"></div>
                
                <div class="text-left px-6 sm:px-12 md:px-16 max-w-7xl mx-auto transform transition duration-1000 translate-y-4 opacity-0 slide-content relative z-10 w-full">
                    <h1 class="text-[2.5rem] leading-[1.1] sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-[#111827] tracking-tight mb-4 drop-shadow-[0_2px_4px_rgba(255,255,255,0.8)]">Natural & Pure <br/>Drinking Water</h1>
                    <p class="text-lg sm:text-xl md:text-2xl text-slate-700 mb-8 font-bold drop-shadow-sm max-w-sm sm:max-w-md">Premium hydration tailored for your everyday life.</p>
                    
                    <div class="flex flex-wrap items-center gap-4">
                        <a href="<?php echo $base_url; ?>about.php" class="inline-flex items-center justify-center bg-[#2563ea] text-white px-8 py-3.5 rounded-full font-black hover:bg-[#1d4ed8] hover:scale-105 transition shadow-lg text-sm tracking-wide">
                            MORE ABOUT US
                        </a>
                        <a href="<?php echo $base_url; ?>contact.php" class="inline-flex items-center justify-center bg-white border border-slate-200 text-slate-800 px-8 py-3.5 rounded-full font-black hover:bg-slate-50 hover:scale-105 transition shadow-lg text-sm tracking-wide">
                            CONTACT US
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Slide 2: Bislaim -->
            <div class="swiper-slide bg-bislaim bg-cover bg-center flex items-center justify-center relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent z-0"></div>
                <div class="text-center px-4 max-w-4xl mx-auto transform transition duration-1000 translate-y-4 opacity-0 slide-content relative z-10 w-full">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-white tracking-tight mb-4 md:mb-6 drop-shadow-lg leading-tight">Bislaim Mineral Water</h1>
                    <p class="text-lg sm:text-xl md:text-2xl text-white/90 mb-8 md:mb-10 font-medium drop-shadow-md px-2">Refreshment You Can Trust</p>
                    <a href="<?php echo $base_url; ?>brands/bislaim.php" class="inline-flex items-center gap-2 bg-white text-bislaim px-6 py-3 md:px-8 md:py-4 rounded-full font-black hover:bg-slate-50 hover:scale-105 transition shadow-xl text-sm md:text-base">
                        Explore Bislaim <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Slide 3: Bislini -->
            <div class="swiper-slide bg-gradient-to-br from-bislaim to-bipraj bg-cover bg-center flex items-center justify-center relative overflow-hidden">
                <div class="absolute inset-0 bg-white/5 z-0"></div>
                <div class="text-center px-4 max-w-4xl mx-auto transform transition duration-1000 translate-y-4 opacity-0 slide-content relative z-10 w-full">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-slate-900 tracking-tight mb-4 md:mb-6 drop-shadow-lg leading-tight">Bislini Pure Water</h1>
                    <p class="text-lg sm:text-xl md:text-2xl text-slate-800 mb-8 md:mb-10 font-bold drop-shadow-md px-2">Clean, Safe & Healthy</p>
                    <a href="<?php echo $base_url; ?>brands/bislini.php" class="inline-flex items-center gap-2 bg-slate-900 text-white px-6 py-3 md:px-8 md:py-4 rounded-full font-black hover:bg-black hover:scale-105 transition shadow-xl text-sm md:text-base">
                        Explore Bislini <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Navigation Buttons -->
        <div class="swiper-button-next hidden md:flex opacity-0 group-hover:opacity-100 transition duration-300"></div>
        <div class="swiper-button-prev hidden md:flex opacity-0 group-hover:opacity-100 transition duration-300"></div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- Full About Section -->
<section class="bg-white py-16 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold text-slate-900 sm:text-5xl tracking-tight mb-4">About P.T. HEALTHCARE PVT. LTD</h2>
            <p class="text-xl text-slate-500 max-w-3xl mx-auto">Discover our story and commitment to pure hydration.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Information Side -->
            <div>
                <h3 class="text-3xl font-bold text-slate-900 mb-6 font-sans">Our Origin & Vision</h3>
                <div class="prose prose-lg text-slate-600">
                    <p class="mb-4">
                        Established in 2022 and fully operational since 2025, <strong>P.T. Healthcare Pvt. Ltd.</strong> is a premier packaged drinking water company rooted in Bagula, Nadia, West Bengal.
                    </p>
                    <p class="mb-4">
                        We recognized the vital need for completely safe, trusted, and mineral-enriched drinking water in our community and beyond. What started as a vision to elevate everyday health standards has grown into a state-of-the-art purification enterprise.
                    </p>
                    <p>
                        Through our flagship brands—<strong>Bipraj</strong>, <strong>Bislaim</strong>, and <strong>Bislini</strong>—we offer an array of hydration solutions meticulously tailored to provide 100% clean, refreshing, and great-tasting water for every household and business.
                    </p>
                </div>
                
                <div class="mt-8">
                    <h4 class="font-bold text-xl text-slate-900 mb-4">Core Principles</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3">
                            <span class="bg-bislaim/10 text-bislaim p-2 rounded-full"><i class="fa-solid fa-check"></i></span>
                            <span class="text-slate-700 font-medium">Uncompromising Hygiene Standards</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="bg-bislaim/10 text-bislaim p-2 rounded-full"><i class="fa-solid fa-check"></i></span>
                            <span class="text-slate-700 font-medium">Technological Excellence in Purification</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="bg-bislaim/10 text-bislaim p-2 rounded-full"><i class="fa-solid fa-check"></i></span>
                            <span class="text-slate-700 font-medium">Customer-First Reliability</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Visual/Graphical Side -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-bipraj/30 rounded-2xl h-64 flex items-center justify-center p-6 text-center transform translate-y-8 transition hover:-translate-y-2 hover:shadow-lg">
                    <div>
                        <i class="fa-solid fa-industry text-5xl text-blue-500 mb-4"></i>
                        <h4 class="font-bold text-slate-900">Modern Facility</h4>
                    </div>
                </div>
                <div class="bg-bislaim/20 rounded-2xl h-64 flex items-center justify-center p-6 text-center transition hover:-translate-y-2 hover:shadow-lg">
                    <div>
                        <i class="fa-solid fa-truck-fast text-5xl text-bislaim mb-4"></i>
                        <h4 class="font-bold text-slate-900">Swift Delivery</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- All Products Grid -->
<section class="bg-slate-50 py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold text-slate-900 mb-4">Our Complete Catalog</h2>
            <p class="text-xl text-slate-500 max-w-3xl mx-auto">Browse and shop directly from our full range of purified water products.</p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach($products as $product): ?>
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col overflow-hidden group">
                <div class="h-48 bg-slate-50 flex justify-center items-center relative overflow-hidden p-6">
                    <?php $iconColor = $product['brand'] === 'Bipraj' ? 'text-bipraj' : 'text-bislaim'; ?>
                    <i class="fa-solid fa-bottle-water text-6xl <?php echo $iconColor; ?> opacity-80 group-hover:scale-110 transition duration-500"></i>
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur shadow-sm px-3 py-1 rounded-full text-xs font-bold text-slate-700">
                        <?php echo htmlspecialchars($product['size']); ?>
                    </div>
                </div>
                
                <div class="p-5 flex flex-col flex-1">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1"><?php echo htmlspecialchars($product['brand']); ?></span>
                    <h3 class="text-lg font-bold text-slate-900 mb-4"><?php echo htmlspecialchars($product['name']); ?></h3>
                    
                    <div class="mt-auto flex items-center justify-between">
                        <span class="text-2xl font-extrabold text-slate-900">₹<?php echo number_format($product['price'], 2); ?></span>
                        <button class="add-to-cart bg-slate-100 hover:bg-bislaim hover:text-white text-slate-700 w-10 h-10 rounded-full flex items-center justify-center transition shadow-sm"
                            data-id="<?php echo $product['id']; ?>"
                            data-name="<?php echo htmlspecialchars($product['name']); ?>"
                            data-price="<?php echo $product['price']; ?>"
                            data-brand="<?php echo htmlspecialchars($product['brand']); ?>"
                            data-size="<?php echo htmlspecialchars($product['size']); ?>"
                            title="Add to Cart"
                        >
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Brands Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">Our Premium Brands</h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <a href="brands/bipraj.php" class="group bg-bipraj p-10 rounded-3xl text-center transform transition hover:-translate-y-2 hover:shadow-xl">
                <i class="fa-solid fa-bottle-water text-6xl text-slate-900 mb-6 group-hover:scale-110 transition duration-300"></i>
                <h3 class="text-2xl font-bold text-slate-900 mb-2">Bipraj</h3>
                <p class="text-slate-800">Pure Hydration for Everyday</p>
            </a>
            
            <a href="brands/bislaim.php" class="group bg-bislaim p-10 rounded-3xl text-center transform transition hover:-translate-y-2 hover:shadow-xl">
                <i class="fa-solid fa-glass-water text-6xl text-white mb-6 group-hover:scale-110 transition duration-300"></i>
                <h3 class="text-2xl font-bold text-white mb-2">Bislaim</h3>
                <p class="text-white/90">Refreshment You Can Trust</p>
            </a>
            
            <a href="brands/bislini.php" class="group bg-gradient-to-br from-bislaim to-bipraj p-10 rounded-3xl text-center transform transition hover:-translate-y-2 hover:shadow-xl">
                <i class="fa-solid fa-bottle-droplet text-6xl text-slate-900 mb-6 group-hover:scale-110 transition duration-300"></i>
                <h3 class="text-2xl font-bold text-slate-900 mb-2">Bislini</h3>
                <p class="text-slate-800">Clean, Safe & Healthy</p>
            </a>
        </div>
    </div>
</section>

<!-- Features Grid -->
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 text-center">
            <div>
                <div class="mx-auto bg-bislaim/10 w-20 h-20 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fa-solid fa-filter text-3xl text-bislaim"></i>
                </div>
                <h4 class="text-xl font-bold text-slate-900 mb-2">5-Step Filtration</h4>
                <p class="text-slate-500">Advanced purification process.</p>
            </div>
            <div>
                <div class="mx-auto bg-bislaim/10 w-20 h-20 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fa-solid fa-vial-circle-check text-3xl text-bislaim"></i>
                </div>
                <h4 class="text-xl font-bold text-slate-900 mb-2">Chlorine-Free</h4>
                <p class="text-slate-500">No harsh chemicals added.</p>
            </div>
            <div>
                <div class="mx-auto bg-bislaim/10 w-20 h-20 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fa-solid fa-gem text-3xl text-bislaim"></i>
                </div>
                <h4 class="text-xl font-bold text-slate-900 mb-2">Mineral Enriched</h4>
                <p class="text-slate-500">Essential minerals for health.</p>
            </div>
            <div>
                <div class="mx-auto bg-bislaim/10 w-20 h-20 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fa-solid fa-shield-halved text-3xl text-bislaim"></i>
                </div>
                <h4 class="text-xl font-bold text-slate-900 mb-2">Hygienic Packaging</h4>
                <p class="text-slate-500">Sealed for freshness & safety.</p>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<!-- Swiper & Cart Initialization -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Swiper
        if(typeof Swiper !== 'undefined') {
            const swiper = new Swiper('.heroSwiper', {
                loop: true,
                effect: 'fade',
                fadeEffect: { crossFade: true },
                autoplay: { delay: 5000, disableOnInteraction: false },
                pagination: { el: '.swiper-pagination', clickable: true },
                navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
                on: {
                    slideChangeTransitionStart: function () {
                        document.querySelectorAll('.slide-content').forEach(el => {
                            el.classList.remove('opacity-100', 'translate-y-0');
                            el.classList.add('opacity-0', 'translate-y-4');
                        });
                    },
                    slideChangeTransitionEnd: function () {
                        const activeSlide = document.querySelector('.swiper-slide-active .slide-content');
                        if(activeSlide) {
                            activeSlide.classList.remove('opacity-0', 'translate-y-4');
                            activeSlide.classList.add('opacity-100', 'translate-y-0');
                        }
                    }
                }
            });
            setTimeout(() => {
                const activeSlide = document.querySelector('.swiper-slide-active .slide-content');
                if(activeSlide) {
                    activeSlide.classList.remove('opacity-0', 'translate-y-4');
                    activeSlide.classList.add('opacity-100', 'translate-y-0');
                }
            }, 100);
        }

        // Add to Cart Logic
        const addToCartBtns = document.querySelectorAll('.add-to-cart');
        addToCartBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.dataset.id;
                const name = this.dataset.name;
                const price = parseFloat(this.dataset.price);
                const brand = this.dataset.brand;
                const size = this.dataset.size;

                let cart = JSON.parse(localStorage.getItem('pthealthcare_cart')) || [];
                const existingItemIndex = cart.findIndex(item => item.id == id);
                
                if (existingItemIndex > -1) {
                    cart[existingItemIndex].quantity += 1;
                } else {
                    cart.push({ id, name, price, brand, size, quantity: 1 });
                }
                
                localStorage.setItem('pthealthcare_cart', JSON.stringify(cart));
                
                // Visual feedback
                const originalHtml = this.innerHTML;
                this.innerHTML = '<i class="fa-solid fa-check"></i>';
                this.classList.add('bg-bislaim', 'text-white');
                this.classList.remove('bg-slate-100', 'text-slate-700');
                
                if (typeof updateGlobalCartCount === 'function') {
                    updateGlobalCartCount();
                }

                setTimeout(() => {
                    this.innerHTML = originalHtml;
                    this.classList.remove('bg-bislaim', 'text-white');
                    this.classList.add('bg-slate-100', 'text-slate-700');
                }, 1000);
            });
        });
    });
</script>
