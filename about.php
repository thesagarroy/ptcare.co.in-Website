<?php
// about.php
include 'includes/header.php';
?>

<div class="bg-white py-16 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-extrabold text-slate-900 sm:text-5xl tracking-tight mb-4">About Us</h1>
            <p class="text-xl text-slate-500 max-w-3xl mx-auto">Discover the story behind P.T Healthcare Pvt. Ltd. and our commitment to pure hydration.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <!-- Information Side -->
            <div>
                <h2 class="text-3xl font-bold text-slate-900 mb-6 font-sans">Our Origin & Vision</h2>
                <div class="prose prose-lg text-slate-600">
                    <p class="mb-4">
                        Established in 2022 and fully operational since 2025, <strong>P.T Healthcare Pvt. Ltd.</strong> is a premier packaged drinking water company rooted in Bagula, Nadia, West Bengal.
                    </p>
                    <p class="mb-4">
                        We recognized the vital need for completely safe, trusted, and mineral-enriched drinking water in our community and beyond. What started as a vision to elevate everyday health standards has grown into a state-of-the-art purification enterprise.
                    </p>
                    <p>
                        Through our flagship brands—<strong>Bipraj</strong>, <strong>Bislaim</strong>, and <strong>Bislini</strong>—we offer an array of hydration solutions meticulously tailored to provide 100% clean, refreshing, and great-tasting water for every household and business.
                    </p>
                </div>
                
                <div class="mt-8">
                    <h3 class="font-bold text-xl text-slate-900 mb-4">Core Principles</h3>
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
</div>

<?php include 'includes/footer.php'; ?>
