<?php
// products.php
include 'includes/db.php';
include 'includes/header.php';

$stmt = $pdo->query("SELECT * FROM products ORDER BY brand, size");
$products = $stmt->fetchAll();

$brands = array_unique(array_column($products, 'brand'));
$sizes = array_unique(array_column($products, 'size'));
?>

<div class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row gap-8">
            
            <!-- Sidebar Filters -->
            <aside class="w-full md:w-64 shrink-0">
                <div class="sticky top-24">
                    <h2 class="text-2xl font-extrabold text-slate-900 mb-6">Filters</h2>
                    
                    <div class="mb-8">
                        <h3 class="font-bold text-slate-900 border-b border-slate-200 pb-2 mb-4">Brand</h3>
                        <div class="space-y-3">
                            <?php foreach($brands as $brand): ?>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" class="brand-filter w-4 h-4 text-bislaim border-slate-300 rounded focus:ring-bislaim" value="<?php echo htmlspecialchars($brand); ?>">
                                <span class="text-slate-600 group-hover:text-slate-900"><?php echo htmlspecialchars($brand); ?></span>
                            </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="font-bold text-slate-900 border-b border-slate-200 pb-2 mb-4">Size</h3>
                        <div class="space-y-3">
                            <?php foreach($sizes as $size): ?>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" class="size-filter w-4 h-4 text-bislaim border-slate-300 rounded focus:ring-bislaim" value="<?php echo htmlspecialchars($size); ?>">
                                <span class="text-slate-600 group-hover:text-slate-900"><?php echo htmlspecialchars($size); ?></span>
                            </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </aside>
            
            <!-- Products Grid -->
            <div class="flex-1">
                <h1 class="text-3xl font-extrabold text-slate-900 mb-8">All Products</h1>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="productGrid">
                    <?php foreach($products as $product): ?>
                    <div class="product-card bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col overflow-hidden group" data-brand="<?php echo htmlspecialchars($product['brand']); ?>" data-size="<?php echo htmlspecialchars($product['size']); ?>">
                        
                        <div class="h-56 bg-slate-50 flex justify-center items-center relative overflow-hidden p-6">
                            <?php 
                                // Simplified image icon mapping if actual images aren't present
                                $iconColor = $product['brand'] === 'Bipraj' ? 'text-bipraj' : 'text-bislaim'; 
                            ?>
                            <i class="fa-solid fa-bottle-water text-7xl <?php echo $iconColor; ?> opacity-80 group-hover:scale-110 transition duration-500"></i>
                            
                            <!-- Hidden info tags (e.g. Size badge) -->
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur shadow-sm px-3 py-1 rounded-full text-xs font-bold text-slate-700">
                                <?php echo htmlspecialchars($product['size']); ?>
                            </div>
                        </div>
                        
                        <div class="p-6 flex flex-col flex-1">
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1"><?php echo htmlspecialchars($product['brand']); ?></span>
                            <h3 class="text-lg font-bold text-slate-900 mb-4"><?php echo htmlspecialchars($product['name']); ?></h3>
                            
                            <div class="mt-auto flex items-center justify-between">
                                <span class="text-2xl font-extrabold text-slate-900">₹<?php echo number_format($product['price'], 2); ?></span>
                                <button class="add-to-cart bg-slate-100 hover:bg-bislaim hover:text-white text-slate-700 w-12 h-12 rounded-full flex items-center justify-center transition shadow-sm"
                                    data-id="<?php echo $product['id']; ?>"
                                    data-name="<?php echo htmlspecialchars($product['name']); ?>"
                                    data-price="<?php echo $product['price']; ?>"
                                    data-brand="<?php echo htmlspecialchars($product['brand']); ?>"
                                    data-size="<?php echo htmlspecialchars($product['size']); ?>"
                                    title="Add to Cart"
                                >
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Empty state shown via JS -->
                <div id="emptyState" class="hidden text-center py-24 bg-slate-50 rounded-2xl border border-dashed border-slate-300 mt-6">
                    <i class="fa-solid fa-flask text-5xl text-slate-300 mb-4"></i>
                    <h3 class="text-xl font-bold text-slate-700">No products found</h3>
                    <p class="text-slate-500">Try adjusting your filters to find what you're looking for.</p>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Basic Filtering logic
    const brandFilters = document.querySelectorAll('.brand-filter');
    const sizeFilters = document.querySelectorAll('.size-filter');
    const products = document.querySelectorAll('.product-card');
    const emptyState = document.getElementById('emptyState');

    function applyFilters() {
        const selectedBrands = Array.from(brandFilters).filter(cb => cb.checked).map(cb => cb.value);
        const selectedSizes = Array.from(sizeFilters).filter(cb => cb.checked).map(cb => cb.value);
        let visibleCount = 0;

        products.forEach(product => {
            const matchBrand = selectedBrands.length === 0 || selectedBrands.includes(product.dataset.brand);
            const matchSize = selectedSizes.length === 0 || selectedSizes.includes(product.dataset.size);

            if (matchBrand && matchSize) {
                product.classList.remove('hidden');
                visibleCount++;
            } else {
                product.classList.add('hidden');
            }
        });

        if(visibleCount === 0) {
            emptyState.classList.remove('hidden');
        } else {
            emptyState.classList.add('hidden');
        }
    }

    brandFilters.forEach(cb => cb.addEventListener('change', applyFilters));
    sizeFilters.forEach(cb => cb.addEventListener('change', applyFilters));

    // Add to Cart Logic
    const addToCartBtns = document.querySelectorAll('.add-to-cart');
    addToCartBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.dataset.id;
            const name = this.dataset.name;
            const price = parseFloat(this.dataset.price);
            const brand = this.dataset.brand;
            const size = this.dataset.size;

            let cart = JSON.parse(localStorage.getItem('pthealthcare_cart')) || [];
            const existingItemIndex = cart.findIndex(item => item.id == id);
            
            if (existingItemIndex > -1) {
                cart[existingItemIndex].quantity += 1;
            } else {
                cart.push({ id, name, price, brand, size, quantity: 1 });
            }
            
            localStorage.setItem('pthealthcare_cart', JSON.stringify(cart));
            
            // Visual feedback
            const originalHtml = this.innerHTML;
            this.innerHTML = '<i class="fa-solid fa-check"></i>';
            this.classList.add('bg-bislaim', 'text-white');
            this.classList.remove('bg-slate-100', 'text-slate-700');
            
            if (typeof updateGlobalCartCount === 'function') {
                updateGlobalCartCount();
            }

            setTimeout(() => {
                this.innerHTML = originalHtml;
                this.classList.remove('bg-bislaim', 'text-white');
                this.classList.add('bg-slate-100', 'text-slate-700');
            }, 1000);
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>
