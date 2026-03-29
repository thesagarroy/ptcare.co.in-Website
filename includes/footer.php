<?php
// includes/footer.php
?>
    </main>

    <!-- Global Footer -->
    <footer class="bg-slate-900 text-white pt-16 pb-6 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                
                <div>
                    <h4 class="text-xl font-bold text-bipraj mb-6 flex items-center gap-2">
                        <i class="fa-solid fa-droplet"></i> PT Healthcare
                    </h4>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        Delivering safe, mineral-enriched drinking water using advanced purification systems across Nadia and beyond.
                    </p>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold text-white mb-6">Our Brands</h4>
                    <ul class="space-y-3 text-slate-400 text-sm">
                        <li><a href="<?php echo $base_url; ?>brands/bipraj.php" class="hover:text-bislaim transition">Bipraj Drinking Water</a></li>
                        <li><a href="<?php echo $base_url; ?>brands/bislaim.php" class="hover:text-bislaim transition">Bislaim Mineral Water</a></li>
                        <li><a href="<?php echo $base_url; ?>brands/bislini.php" class="hover:text-bislaim transition">Bislini Pure Water</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold text-white mb-6">Quick Links</h4>
                    <ul class="space-y-3 text-slate-400 text-sm">
                        <li><a href="<?php echo $base_url; ?>products.php" class="hover:text-bislaim transition">Shop Products</a></li>
                        <li><a href="<?php echo $base_url; ?>about.php" class="hover:text-bislaim transition">About Us</a></li>
                        <li><a href="<?php echo $base_url; ?>contact.php" class="hover:text-bislaim transition">Contact Us</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold text-white mb-6">Contact Info</h4>
                    <ul class="space-y-4 text-slate-400 text-sm">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-phone text-bislaim mt-1"></i>
                            <span>7003450006</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-location-dot text-bislaim mt-1"></i>
                            <span>Bagula, Nadia,<br>West Bengal</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-slate-800 pt-8 text-center text-sm text-slate-500">
                <p>&copy; <?php echo date('Y'); ?> P.T Healthcare Pvt. Ltd. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Swiper JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Global Cart Script for Badge updates -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            updateGlobalCartCount();
        });

        function updateGlobalCartCount() {
            const countEl = document.getElementById('headerCartCount');
            if (countEl) {
                const cart = JSON.parse(localStorage.getItem('pthealthcare_cart')) || [];
                const total = cart.reduce((sum, item) => sum + parseInt(item.quantity), 0);
                countEl.innerText = total;
            }
        }
    </script>
</body>
</html>
