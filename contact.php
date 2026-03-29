<?php
// contact.php
include 'includes/header.php';
$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simulated form post
    $success = true;
}
?>

<div class="bg-slate-50 py-16 sm:py-24 min-h-[60vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            
            <!-- Left Side Data -->
            <div>
                <h1 class="text-4xl font-extrabold text-slate-900 mb-4">Get in Touch</h1>
                <p class="text-lg text-slate-600 mb-10">We'd love to hear from you! Whether you're looking for wholesale distribution, event supply, or regular home delivery, our team is ready to assist.</p>
                
                <div class="space-y-8">
                    <div class="flex items-start gap-4">
                        <div class="bg-bislaim/10 w-14 h-14 rounded-2xl flex items-center justify-center text-bislaim shrink-0 text-xl">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 text-lg mb-1">Phone</h3>
                            <p class="text-slate-600">7003450006</p>
                            <p class="text-sm text-slate-500 mt-1">Mon-Sat from 8am to 6pm</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="bg-bipraj/10 w-14 h-14 rounded-2xl flex items-center justify-center text-bipraj shrink-0 text-xl">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 text-lg mb-1">Headquarters</h3>
                            <p class="text-slate-600">Bagula, Nadia<br>West Bengal, India</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right side Form -->
            <div class="bg-white p-8 md:p-10 rounded-3xl shadow-sm border border-slate-100">
                <?php if ($success): ?>
                    <div class="text-center py-10">
                        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 text-green-500 text-4xl">
                            <i class="fa-solid fa-paper-plane"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">Message Sent!</h3>
                        <p class="text-slate-500">We will respond back via phone or email within 24 hours.</p>
                        <a href="contact.php" class="text-bislaim font-bold mt-6 inline-block">Send another message</a>
                    </div>
                <?php else: ?>
                    <form method="POST" class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Full Name</label>
                            <input type="text" name="name" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-bislaim focus:border-bislaim outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Phone or Email</label>
                            <input type="text" name="contact" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-bislaim focus:border-bislaim outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Message</label>
                            <textarea name="message" rows="4" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-bislaim focus:border-bislaim outline-none transition resize-none"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-slate-900 text-white font-bold py-4 px-6 rounded-xl hover:bg-black transition shadow-md">
                            Send Message
                        </button>
                    </form>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
