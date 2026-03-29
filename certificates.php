<?php
// certificates.php
require_once __DIR__ . '/config/config.php';
$base_url = SITE_URL . '/';
include 'includes/header.php';
?>

<!-- Hero Section -->
<div class="bg-slate-900 pt-24 pb-32 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
    <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
        <h1 class="text-5xl md:text-7xl font-extrabold text-white tracking-tight mb-6">Our Accreditations <br/><span class="text-bislaim">& Certificates</span></h1>
        <p class="text-xl md:text-2xl text-slate-300 mb-10 font-medium max-w-2xl mx-auto">Committed to the highest standards of safety, purity, and operational excellence.</p>
    </div>
</div>

<!-- Certificates Catalog Grid -->
<div class="bg-slate-50 py-24 -mt-10 relative z-20 rounded-t-[3rem] shadow-[0_-20px_40px_-15px_rgba(0,0,0,0.1)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <h2 class="text-3xl font-extrabold text-slate-800">Verified Quality & Trust</h2>
            <div class="w-24 h-1 bg-bislaim mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

            <!-- Certificate 1: ISO 9001:2015 -->
            <div class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-slate-100 group">
                <div class="h-64 bg-slate-100 rounded-2xl mb-8 flex items-center justify-center overflow-hidden relative">
                    <!-- Placeholder for actual uploaded image -->
                    <div class="absolute inset-0 bg-gradient-to-br from-slate-100 to-slate-200"></div>
                    <i class="fa-solid fa-file-shield text-7xl text-slate-300 group-hover:scale-110 group-hover:text-bislaim transition duration-500 relative z-10"></i>
                    <div class="absolute bottom-4 right-4 bg-white px-3 py-1 rounded-full text-xs font-bold text-slate-500 shadow-sm z-10">
                        <i class="fa-solid fa-camera"></i> IMG/PDF
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-bislaim transition">ISO 9001:2015</h3>
                <p class="text-slate-600 mb-6">Certified for our Quality Management Systems in manufacturing and distributing packaged drinking water.</p>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-bold text-slate-400">Status: <span class="text-green-500">Active</span></span>
                    <button class="text-bislaim font-bold hover:text-ptdark transition flex items-center gap-2">View <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>

            <!-- Certificate 2: FSSAI -->
            <div class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-slate-100 group relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-orange-50 rounded-bl-full -z-10 transition group-hover:scale-150 duration-500"></div>
                <div class="h-64 bg-slate-100 rounded-2xl mb-8 flex items-center justify-center overflow-hidden relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-50 to-orange-100"></div>
                    <i class="fa-solid fa-utensils text-7xl text-orange-200 group-hover:scale-110 group-hover:text-orange-500 transition duration-500 relative z-10"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-orange-500 transition">FSSAI License</h3>
                <p class="text-slate-600 mb-6">Food Safety and Standards Authority of India certified for complying with highest food safety norms.</p>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-bold text-slate-400">Status: <span class="text-green-500">Active</span></span>
                    <button class="text-orange-500 font-bold hover:text-ptdark transition flex items-center gap-2">View <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>

            <!-- Certificate 3: BIS -->
            <div class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-slate-100 group relative border-t-4 hover:border-t-blue-500">
                <div class="h-64 bg-slate-100 rounded-2xl mb-8 flex items-center justify-center overflow-hidden relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-blue-100"></div>
                    <i class="fa-solid fa-award text-7xl text-blue-200 group-hover:scale-110 group-hover:text-blue-500 transition duration-500 relative z-10"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-blue-500 transition">BIS Certification</h3>
                <p class="text-slate-600 mb-6">Bureau of Indian Standards hallmark guaranteeing the pure and authentic mineral composition.</p>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-bold text-slate-400">Status: <span class="text-green-500">Active</span></span>
                    <button class="text-blue-500 font-bold hover:text-ptdark transition flex items-center gap-2">View <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>

            <!-- Certificate 4: MSME -->
            <div class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-slate-100 group">
                <div class="h-64 bg-slate-100 rounded-2xl mb-8 flex items-center justify-center overflow-hidden relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-teal-50 to-teal-100"></div>
                    <i class="fa-solid fa-industry text-7xl text-teal-200 group-hover:scale-110 group-hover:text-teal-500 transition duration-500 relative z-10"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-teal-500 transition">MSME Registered</h3>
                <p class="text-slate-600 mb-6">Proudly registered under the Ministry of Micro, Small & Medium Enterprises, driving local growth.</p>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-bold text-slate-400">Status: <span class="text-green-500">Active</span></span>
                    <button class="text-teal-500 font-bold hover:text-ptdark transition flex items-center gap-2">View <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>

            <!-- Upload Placeholder Design -->
            <div class="bg-slate-50 rounded-3xl p-8 border-2 border-dashed border-slate-300 flex flex-col items-center justify-center text-center hover:bg-slate-100 hover:border-slate-400 transition cursor-pointer group h-full min-h-[400px]">
                <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition">
                    <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-400 group-hover:text-ptdark"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-700 mb-2">Upload More</h3>
                <p class="text-slate-500 text-sm max-w-[200px]">Save your certificates in <br/><code>/assets/images/certificates/</code></p>
            </div>

        </div>

    </div>
</div>

<?php include 'includes/footer.php'; ?>
