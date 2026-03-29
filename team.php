<?php
// team.php
require_once __DIR__ . '/config/config.php';
$base_url = SITE_URL . '/';
include 'includes/header.php';
?>

<!-- Hero Section -->
<div class="bg-ptdark pt-24 pb-32 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-ptdark via-slate-800 to-slate-900"></div>
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/black-scales.png')] opacity-20"></div>
    <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
        <h1 class="text-5xl md:text-7xl font-black text-white tracking-tight mb-6">Meet The <span class="bg-gradient-to-r from-bislaim to-bipraj bg-clip-text text-transparent">Directors</span></h1>
        <p class="text-xl md:text-2xl text-slate-400 mb-10 font-medium max-w-2xl mx-auto">The visionary leadership driving P.T. Healthcare's commitment to purity and health.</p>
    </div>
</div>

<!-- Team Catalog Grid -->
<div class="bg-white py-24 -mt-10 relative z-20 rounded-t-[3rem] shadow-[0_-20px_40px_-15px_rgba(0,0,0,0.1)] border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">

            <!-- Director 1 -->
            <div class="bg-white rounded-3xl p-6 shadow-xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-slate-100 group relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-bislaim to-blue-500 rounded-3xl opacity-0 group-hover:opacity-10 transition duration-500 blur-sm"></div>
                <!-- Profile Image -->
                <div class="h-80 bg-slate-100 rounded-2xl mb-8 flex flex-col items-center justify-center overflow-hidden relative shadow-inner">
                    <!-- Placeholder for actual uploaded image -->
                    <div class="absolute inset-0 bg-slate-200"></div>
                    <i class="fa-solid fa-user-tie text-9xl text-slate-400 group-hover:scale-110 group-hover:text-bislaim transition duration-500 relative z-10"></i>
                    
                    <!-- Upload overlay text -->
                    <div class="absolute bottom-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-slate-600 shadow-sm z-10">
                        1.jpg
                    </div>
                </div>
                
                <h3 class="text-2xl font-black text-slate-900 mb-1 group-hover:text-bislaim transition uppercase tracking-wide">Director Name</h3>
                <p class="text-bislaim font-bold mb-4">Managing Director</p>
                
                <p class="text-slate-600 text-sm leading-relaxed mb-6">Upload your director's photo in <code class="bg-slate-100 px-1 rounded">/assets/images/team/</code> folder and update this text later.</p>
                
                <div class="flex items-center gap-3">
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 hover:bg-[#0077b5] hover:text-white transition"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 hover:bg-[#1DA1F2] hover:text-white transition"><i class="fa-brands fa-twitter"></i></a>
                </div>
            </div>

            <!-- Director 2 -->
            <div class="bg-white rounded-3xl p-6 shadow-xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-slate-100 group relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-bislaim to-bipraj rounded-3xl opacity-0 group-hover:opacity-10 transition duration-500 blur-sm"></div>
                <!-- Profile Image -->
                <div class="h-80 bg-slate-100 rounded-2xl mb-8 flex flex-col items-center justify-center overflow-hidden relative shadow-inner">
                    <div class="absolute inset-0 bg-slate-200"></div>
                    <i class="fa-solid fa-user-tie text-9xl text-slate-400 group-hover:scale-110 group-hover:text-blue-500 transition duration-500 relative z-10"></i>
                    
                    <div class="absolute bottom-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-slate-600 shadow-sm z-10">
                        2.jpg
                    </div>
                </div>
                
                <h3 class="text-2xl font-black text-slate-900 mb-1 group-hover:text-blue-500 transition uppercase tracking-wide">Director Name</h3>
                <p class="text-blue-500 font-bold mb-4">Executive Director</p>
                
                <p class="text-slate-600 text-sm leading-relaxed mb-6">Leading the operational efficiency and strategic partnerships of P.T. Healthcare Pvt. Ltd.</p>
                
                <div class="flex items-center gap-3">
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 hover:bg-[#0077b5] hover:text-white transition"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 hover:bg-[#1DA1F2] hover:text-white transition"><i class="fa-brands fa-twitter"></i></a>
                </div>
            </div>
            
            <!-- Information Panel -->
            <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-3xl p-8 shadow-xl flex flex-col justify-center border border-slate-700 text-white relative overflow-hidden group">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10"></div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-bislaim rounded-bl-full -z-0 opacity-20 transition group-hover:scale-150 duration-500"></div>
                
                <i class="fa-solid fa-users text-5xl text-bislaim mb-6 relative z-10"></i>
                <h3 class="text-3xl font-black mb-4 relative z-10">The Core<br/>Leadership</h3>
                <p class="text-slate-400 mb-8 relative z-10">Our leadership team brings together decades of expertise in pure water processing, distribution, and corporate management.</p>
                
                <button class="flex w-fit items-center gap-2 bg-white/10 hover:bg-white/20 border border-white/20 text-white px-6 py-3 rounded-full font-bold transition backdrop-blur-sm relative z-10">
                    Contact Management <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>

        </div>

    </div>
</div>

<?php include 'includes/footer.php'; ?>
