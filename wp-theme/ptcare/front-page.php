<?php
/**
 * front-page.php — PT Healthcare WordPress Theme
 * Homepage template: shows the hero slider, about summary, and brand cards.
 * WordPress uses this file when a static front page is set in Settings → Reading.
 */

get_header();
?>

<!-- =============================================
     HERO SLIDER
     ============================================= -->
<section class="w-full overflow-hidden">
    <div class="swiper heroSwiper">
        <div class="swiper-wrapper">

            <!-- Slide 1: Bipraj Banner -->
            <div class="swiper-slide">
                <div class="relative w-full" style="aspect-ratio:16/9; min-height:180px;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banners/bipraj-banner.png"
                         class="absolute inset-0 w-full h-full object-cover object-center"
                         alt="Bipraj – Natural & Pure Drinking Water">
                </div>
            </div>

            <!-- Slide 2: Bislaim -->
            <div class="swiper-slide">
                <div class="relative w-full bg-bislaim" style="aspect-ratio:16/9; min-height:180px;">
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4">
                        <h1 style="font-size:clamp(1rem,4vw,4.5rem);" class="font-extrabold text-white tracking-tight leading-tight mb-[1%] drop-shadow-lg">Bislaim Mineral Water</h1>
                        <p style="font-size:clamp(0.6rem,1.8vw,1.5rem);" class="text-white/90 font-medium drop-shadow-md mb-[2%]">Refreshment You Can Trust</p>
                        <a href="<?php echo home_url('/brands/bislaim'); ?>"
                           class="inline-flex items-center gap-2 bg-white text-bislaim rounded-full font-black hover:bg-slate-50 hover:scale-105 transition shadow-xl whitespace-nowrap"
                           style="font-size:clamp(0.55rem,1.2vw,1rem); padding:clamp(4px,0.8vw,14px) clamp(10px,2vw,32px);">
                            Explore Bislaim <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Slide 3: Bislini -->
            <div class="swiper-slide">
                <div class="relative w-full bg-gradient-to-br from-bislaim to-bipraj" style="aspect-ratio:16/9; min-height:180px;">
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4">
                        <h1 style="font-size:clamp(1rem,4vw,4.5rem);" class="font-extrabold text-slate-900 tracking-tight leading-tight mb-[1%] drop-shadow-lg">Bislini Pure Water</h1>
                        <p style="font-size:clamp(0.6rem,1.8vw,1.5rem);" class="text-slate-800 font-bold drop-shadow-md mb-[2%]">Clean, Safe &amp; Healthy</p>
                        <a href="<?php echo home_url('/brands/bislini'); ?>"
                           class="inline-flex items-center gap-2 bg-slate-900 text-white rounded-full font-black hover:bg-black hover:scale-105 transition shadow-xl whitespace-nowrap"
                           style="font-size:clamp(0.55rem,1.2vw,1rem); padding:clamp(4px,0.8vw,14px) clamp(10px,2vw,32px);">
                            Explore Bislini <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="swiper-button-prev !text-white !bg-black/30 !rounded-full !w-9 !h-9 after:!text-sm hover:!bg-black/50 transition hidden md:flex"></div>
        <div class="swiper-button-next !text-white !bg-black/30 !rounded-full !w-9 !h-9 after:!text-sm hover:!bg-black/50 transition hidden md:flex"></div>
        <div class="swiper-pagination !bottom-2"></div>
    </div>
</section>

<!-- =============================================
     ABOUT SUMMARY
     ============================================= -->
<section class="bg-white py-16 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-extrabold text-slate-900 sm:text-5xl tracking-tight mb-4">About P.T. HEALTHCARE PVT. LTD</h2>
        <p class="text-xl text-slate-500 max-w-3xl mx-auto mb-12">Established in 2022, we deliver pure, safe, and mineral-enriched drinking water across Nadia, West Bengal and beyond.</p>
        <a href="<?php echo home_url('/about'); ?>" class="inline-flex items-center gap-2 bg-bislaim text-slate-900 px-8 py-3.5 rounded-full font-black hover:opacity-90 hover:scale-105 transition shadow-lg">
            Learn More <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>
</section>

<!-- =============================================
     BRANDS SECTION
     ============================================= -->
<section class="bg-slate-50 py-16 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">Our Brands</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
            <a href="<?php echo home_url('/brands/bipraj'); ?>" class="group bg-bipraj p-10 rounded-3xl text-center transform transition hover:-translate-y-2 hover:shadow-xl">
                <i class="fa-solid fa-bottle-water text-6xl text-slate-900 mb-6 group-hover:scale-110 transition duration-300"></i>
                <h3 class="text-2xl font-bold text-slate-900 mb-2">Bipraj</h3>
                <p class="text-slate-800">Pure Hydration for Everyday</p>
            </a>
            <a href="<?php echo home_url('/brands/bislaim'); ?>" class="group bg-bislaim p-10 rounded-3xl text-center transform transition hover:-translate-y-2 hover:shadow-xl">
                <i class="fa-solid fa-glass-water text-6xl text-white mb-6 group-hover:scale-110 transition duration-300"></i>
                <h3 class="text-2xl font-bold text-white mb-2">Bislaim</h3>
                <p class="text-white/90">Refreshment You Can Trust</p>
            </a>
            <a href="<?php echo home_url('/brands/bislini'); ?>" class="group bg-gradient-to-br from-bislaim to-bipraj p-10 rounded-3xl text-center transform transition hover:-translate-y-2 hover:shadow-xl">
                <i class="fa-solid fa-bottle-droplet text-6xl text-slate-900 mb-6 group-hover:scale-110 transition duration-300"></i>
                <h3 class="text-2xl font-bold text-slate-900 mb-2">Bislini</h3>
                <p class="text-slate-800">Clean, Safe &amp; Healthy</p>
            </a>
        </div>
    </div>
</section>

<!-- WordPress page content (if any) -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="max-w-7xl mx-auto px-4 py-12">
        <?php the_content(); ?>
    </div>
<?php endwhile; endif; ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof Swiper !== 'undefined') {
        new Swiper('.heroSwiper', {
            loop: true,
            effect: 'fade',
            fadeEffect: { crossFade: true },
            autoplay: { delay: 5000, disableOnInteraction: false },
            pagination: { el: '.swiper-pagination', clickable: true },
            navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' }
        });
    }
});
</script>

<?php get_footer(); ?>
