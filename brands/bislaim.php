<?php
// brands/bislaim.php
require_once __DIR__ . '/../../config/config.php';
$base_url = SITE_URL . '/';
include '../includes/header.php';
?>

<div class="bg-bislaim pt-24 pb-32">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h1 class="text-5xl md:text-7xl font-extrabold text-white tracking-tight mb-6">Bislaim</h1>
        <p class="text-xl md:text-2xl text-white/90 mb-10 font-medium max-w-2xl mx-auto">Refreshment You Can Trust. Pure, crisp, and revitalizing.</p>
        <a href="<?php echo $base_url; ?>products.php" class="inline-flex items-center gap-2 bg-white text-bislaim px-8 py-4 rounded-full font-bold hover:bg-slate-50 hover:scale-105 transition shadow-lg">
            Explore Range <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>
</div>

<div class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            
            <div class="bg-slate-50 h-96 rounded-3xl border border-slate-100 flex items-center justify-center shadow-inner">
                 <i class="fa-solid fa-glass-water text-9xl text-bislaim opacity-80"></i>
            </div>

            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-8">The Bislaim Standard</h2>
                <ul class="space-y-6">
                    <li class="flex items-start gap-4">
                        <div class="bg-bislaim/10 w-12 h-12 rounded-xl flex items-center justify-center text-bislaim shrink-0 mt-1">
                            <i class="fa-solid fa-certificate"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-900 mb-1">Premium QA Testing</h4>
                            <p class="text-slate-600">For every single batch, guaranteeing premium standards.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="bg-bislaim/10 w-12 h-12 rounded-xl flex items-center justify-center text-bislaim shrink-0 mt-1">
                            <i class="fa-solid fa-bolt"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-900 mb-1">Revitalizing Mineral Blend</h4>
                            <p class="text-slate-600">Specifically engineered for quick energy recovery.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="bg-bislaim/10 w-12 h-12 rounded-xl flex items-center justify-center text-bislaim shrink-0 mt-1">
                            <i class="fa-solid fa-shield-cat"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-900 mb-1">Family Safe</h4>
                            <p class="text-slate-600">Guaranteed safety from manufacturing to delivery.</p>
                        </div>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
</div>

<div class="bg-slate-50 py-24 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-extrabold text-slate-900 mb-12">Available Sizes</h2>
        
        <div class="flex flex-wrap justify-center gap-6">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 w-48 flex flex-col items-center hover:shadow-md transition cursor-pointer">
                <i class="fa-solid fa-bottle-water text-4xl text-bislaim mb-4"></i>
                <h4 class="font-bold text-slate-900 text-xl">500ml</h4>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-md border-2 border-bislaim w-48 flex flex-col items-center transform scale-105 cursor-pointer">
                <div class="bg-bislaim text-white text-xs font-bold px-3 py-1 rounded-full absolute -top-3">POPULAR</div>
                <i class="fa-solid fa-bottle-water text-6xl text-bislaim mb-4 mt-2"></i>
                <h4 class="font-bold text-slate-900 text-xl">1L</h4>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 w-48 flex flex-col items-center hover:shadow-md transition cursor-pointer">
                <i class="fa-solid fa-bottle-water text-7xl text-bislaim mb-4"></i>
                <h4 class="font-bold text-slate-900 text-xl">2L</h4>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
