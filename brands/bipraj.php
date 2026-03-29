<?php
// brands/bipraj.php
require_once __DIR__ . '/../config/config.php';
$base_url = SITE_URL . '/';
include '../includes/header.php';
?>

<div class="bg-bipraj pt-24 pb-32">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h1 class="text-5xl md:text-7xl font-extrabold text-slate-900 tracking-tight mb-6">Bipraj</h1>
        <p class="text-xl md:text-2xl text-slate-800 mb-10 font-medium max-w-2xl mx-auto">Premium Drinking Water tailored for your everyday hydration needs.</p>
        <a href="<?php echo $base_url; ?>products.php" class="inline-flex items-center gap-2 bg-white text-slate-900 px-8 py-4 rounded-full font-bold hover:bg-slate-50 hover:scale-105 transition shadow-lg">
            Shop Bipraj Range <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>
</div>

<div class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            
            <div class="order-2 md:order-1">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-8">Why Choose Bipraj?</h2>
                <ul class="space-y-6">
                    <li class="flex items-start gap-4">
                        <div class="bg-bipraj/30 w-12 h-12 rounded-full flex items-center justify-center text-slate-900 shrink-0 mt-1">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-900 mb-1">5-Step Advanced Filtration Process</h4>
                            <p class="text-slate-600">Ensuring every drop is completely purified.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="bg-bipraj/30 w-12 h-12 rounded-full flex items-center justify-center text-slate-900 shrink-0 mt-1">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-900 mb-1">100% Chlorine-Free formula</h4>
                            <p class="text-slate-600">Free from harsh chemical aftertastes.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="bg-bipraj/30 w-12 h-12 rounded-full flex items-center justify-center text-slate-900 shrink-0 mt-1">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-900 mb-1">Designed for daily hydration</h4>
                            <p class="text-slate-600">The perfect companion for your active lifestyle.</p>
                        </div>
                    </li>
                </ul>
            </div>
            
            <div class="order-1 md:order-2 bg-slate-50 h-96 rounded-3xl border border-slate-100 flex items-center justify-center shadow-inner">
                 <i class="fa-solid fa-bottle-water text-9xl text-bipraj opacity-80"></i>
            </div>
        </div>
    </div>
</div>

<div class="bg-slate-50 py-24 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-extrabold text-slate-900 mb-4">Available Sizes</h2>
        <p class="text-slate-600 mb-12 max-w-2xl mx-auto">Whether you need a quick refreshment or a long-lasting supply, Bipraj has you covered.</p>
        
        <div class="flex flex-wrap justify-center gap-6">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 w-40 flex flex-col items-center">
                <i class="fa-solid fa-bottle-water text-4xl text-bipraj mb-4"></i>
                <h4 class="font-bold text-slate-900 text-lg">500ml</h4>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 w-40 flex flex-col items-center transform scale-105 shadow-md">
                <i class="fa-solid fa-bottle-water text-5xl text-bipraj mb-4"></i>
                <h4 class="font-bold text-slate-900 text-lg">1L</h4>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 w-40 flex flex-col items-center">
                <i class="fa-solid fa-bottle-water text-6xl text-bipraj mb-4"></i>
                <h4 class="font-bold text-slate-900 text-lg">2L</h4>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 w-40 flex flex-col items-center">
                <i class="fa-solid fa-jug-detergent text-6xl text-bipraj mb-4"></i>
                <h4 class="font-bold text-slate-900 text-lg">5L</h4>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 w-40 flex flex-col items-center">
                <i class="fa-solid fa-database text-6xl text-bipraj mb-4"></i>
                <h4 class="font-bold text-slate-900 text-lg">20L</h4>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
