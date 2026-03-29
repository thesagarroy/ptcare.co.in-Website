<?php
// index.php
include 'includes/header.php';
?>

<!-- Hero Slider Section -->
<section class="h-[80vh] min-h-[500px] w-full relative group">
    <div class="swiper heroSwiper h-full w-full">
        <div class="swiper-wrapper">
            <!-- Slide 1: Bipraj -->
            <div class="swiper-slide bg-bipraj flex items-center justify-center">
                <div class="text-center px-4 max-w-4xl mx-auto transform transition duration-1000 translate-y-4 opacity-0 slide-content">
                    <h1 class="text-5xl md:text-7xl font-extrabold text-slate-900 tracking-tight mb-6">Bipraj Drinking Water</h1>
                    <p class="text-xl md:text-2xl text-slate-800 mb-10 font-medium">Pure Hydration for Everyday Life</p>
                    <a href="<?php echo $base_url; ?>brands/bipraj.php" class="inline-flex items-center gap-2 bg-slate-900 text-white px-8 py-4 rounded-full font-bold hover:bg-black hover:scale-105 transition shadow-lg">
                        Explore Bipraj <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Slide 2: Bislaim -->
            <div class="swiper-slide bg-bislaim flex items-center justify-center">
                <div class="text-center px-4 max-w-4xl mx-auto transform transition duration-1000 translate-y-4 opacity-0 slide-content">
                    <h1 class="text-5xl md:text-7xl font-extrabold text-white tracking-tight mb-6">Bislaim Mineral Water</h1>
                    <p class="text-xl md:text-2xl text-white/90 mb-10 font-medium">Refreshment You Can Trust</p>
                    <a href="<?php echo $base_url; ?>brands/bislaim.php" class="inline-flex items-center gap-2 bg-white text-bislaim px-8 py-4 rounded-full font-bold hover:bg-slate-50 hover:scale-105 transition shadow-lg">
                        Explore Bislaim <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Slide 3: Bislini -->
            <div class="swiper-slide bg-gradient-to-br from-bislaim to-bipraj flex items-center justify-center">
                <div class="text-center px-4 max-w-4xl mx-auto transform transition duration-1000 translate-y-4 opacity-0 slide-content">
                    <h1 class="text-5xl md:text-7xl font-extrabold text-slate-900 tracking-tight mb-6">Bislini Pure Water</h1>
                    <p class="text-xl md:text-2xl text-slate-800 mb-10 font-medium">Clean, Safe & Healthy</p>
                    <a href="<?php echo $base_url; ?>brands/bislini.php" class="inline-flex items-center gap-2 bg-slate-900 text-white px-8 py-4 rounded-full font-bold hover:bg-black hover:scale-105 transition shadow-lg">
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

<!-- About Section Outline -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-6">About P.T Healthcare Pvt. Ltd.</h2>
        <p class="text-lg text-slate-600 leading-relaxed mb-8">
            Based in Bagula, Nadia, West Bengal, we have been operational since 2025, delivering safe, mineral-enriched drinking water using cutting-edge advanced purification systems. We are dedicated to ensuring the highest standards of hygiene and quality in every drop.
        </p>
        <a href="about.php" class="text-bislaim font-bold hover:text-bislini transition inline-flex items-center gap-2">Read Our Story <i class="fa-solid fa-arrow-right"></i></a>
    </div>
</section>

<!-- Brands Section -->
<section class="py-24 bg-slate-50">
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
<section class="py-24 bg-white">
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

<!-- Include Footer which has Swiper JS -->
<?php include 'includes/footer.php'; ?>

<!-- Swiper Initialization -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if(typeof Swiper !== 'undefined') {
            const swiper = new Swiper('.heroSwiper', {
                loop: true,
                effect: 'fade', // professional fade transition
                fadeEffect: {
                    crossFade: true
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                on: {
                    slideChangeTransitionStart: function () {
                        // Reset all animation classes
                        document.querySelectorAll('.slide-content').forEach(el => {
                            el.classList.remove('opacity-100', 'translate-y-0');
                            el.classList.add('opacity-0', 'translate-y-4');
                        });
                    },
                    slideChangeTransitionEnd: function () {
                        // Add animation classes to active slide
                        const activeSlide = document.querySelector('.swiper-slide-active .slide-content');
                        if(activeSlide) {
                            activeSlide.classList.remove('opacity-0', 'translate-y-4');
                            activeSlide.classList.add('opacity-100', 'translate-y-0');
                        }
                    }
                }
            });
            // Trigger animation on first load
            setTimeout(() => {
                const activeSlide = document.querySelector('.swiper-slide-active .slide-content');
                if(activeSlide) {
                    activeSlide.classList.remove('opacity-0', 'translate-y-4');
                    activeSlide.classList.add('opacity-100', 'translate-y-0');
                }
            }, 100);
        }
    });
</script>
