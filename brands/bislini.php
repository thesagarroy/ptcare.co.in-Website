<?php
// brands/bislini.php
require_once __DIR__ . '/../../config/config.php';
$base_url = SITE_URL . '/';
include '../includes/header.php';
?>

<div class="bg-gradient-to-br from-bislaim to-bipraj pt-24 pb-32">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h1 class="text-5xl md:text-7xl font-extrabold text-slate-900 tracking-tight mb-6">Bislini</h1>
        <p class="text-xl md:text-2xl text-slate-800 mb-10 font-medium max-w-2xl mx-auto">Clean, Safe & Healthy. The perfect balance of purity and essential minerals.</p>
        <a href="<?php echo $base_url; ?>products.php" class="inline-flex items-center gap-2 bg-slate-900 text-white px-8 py-4 rounded-full font-bold hover:bg-black hover:scale-105 transition shadow-lg">
            Shop Bislini <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>
</div>

<div class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900">Why Bislini?</h2>
            <p class="text-slate-600 mt-4 text-lg">Award-winning taste meets scientific purification.</p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="p-8 bg-slate-50 rounded-3xl border border-slate-100 hover:shadow-lg transition">
                <div class="bg-white w-14 h-14 rounded-2xl flex items-center justify-center text-bislini text-2xl mb-6 shadow-sm shadow-bislaim/20">
                    <i class="fa-solid fa-star"></i>
                </div>
                <h4 class="font-bold text-slate-900 text-xl mb-2">Balanced Profile</h4>
                <p class="text-slate-600 text-sm">Our most expertly balanced mineral profile available.</p>
            </div>
            
            <div class="p-8 bg-slate-50 rounded-3xl border border-slate-100 hover:shadow-lg transition">
                <div class="bg-white w-14 h-14 rounded-2xl flex items-center justify-center text-bislini text-2xl mb-6 shadow-sm shadow-bislaim/20">
                    <i class="fa-solid fa-droplet"></i>
                </div>
                <h4 class="font-bold text-slate-900 text-xl mb-2">Micro-filtered</h4>
                <p class="text-slate-600 text-sm">Advanced nano-filtration for ultimate clarity.</p>
            </div>

            <div class="p-8 bg-slate-50 rounded-3xl border border-slate-100 hover:shadow-lg transition">
                <div class="bg-white w-14 h-14 rounded-2xl flex items-center justify-center text-bislini text-2xl mb-6 shadow-sm shadow-bislaim/20">
                    <i class="fa-solid fa-heart-pulse"></i>
                </div>
                <h4 class="font-bold text-slate-900 text-xl mb-2">Health Focused</h4>
                <p class="text-slate-600 text-sm">Promotes a healthy and energetic metabolism entirely.</p>
            </div>

            <div class="p-8 bg-slate-50 rounded-3xl border border-slate-100 hover:shadow-lg transition">
                <div class="bg-white w-14 h-14 rounded-2xl flex items-center justify-center text-bislini text-2xl mb-6 shadow-sm shadow-bislaim/20">
                    <i class="fa-solid fa-award"></i>
                </div>
                <h4 class="font-bold text-slate-900 text-xl mb-2">Award Winning</h4>
                <p class="text-slate-600 text-sm">Recognized quality standards across the state.</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-slate-50 py-24 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-extrabold text-slate-900 mb-12">Available Sizes</h2>
        
        <div class="flex flex-wrap justify-center gap-6">
            <div class="relative bg-white p-10 rounded-3xl shadow-lg border-2 border-bislini w-64 flex flex-col items-center cursor-pointer transform hover:scale-105 transition">
                <div class="absolute inset-0 bg-gradient-to-br from-bislaim/10 to-bipraj/10 rounded-3xl pointer-events-none"></div>
                <i class="fa-solid fa-bottle-droplet text-6xl text-bislini mb-6 relative z-10"></i>
                <h4 class="font-bold text-slate-900 text-3xl relative z-10">1L</h4>
                <p class="text-slate-500 text-sm mt-2 relative z-10">Premium Quality</p>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
