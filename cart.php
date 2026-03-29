<?php
// cart.php
include 'includes/db.php';
include 'includes/header.php';

// Checkout Logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'checkout') {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $cartDataStr = $_POST['cart_data'] ?? '[]';
    $cartData = json_decode($cartDataStr, true);
    
    if(!empty($name) && !empty($phone) && !empty($address) && !empty($cartData)) {
        try {
            $pdo->beginTransaction();
            $totalAmount = 0;
            foreach($cartData as $item) {
                $totalAmount += floatval($item['price']) * intval($item['quantity']);
            }
            
            $stmt = $pdo->prepare("INSERT INTO orders (customer_name, phone, address, total) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $phone, $address, $totalAmount]);
            $orderId = $pdo->lastInsertId();
            
            $stmtItems = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
            foreach($cartData as $item) {
                $stmtItems->execute([$orderId, $item['id'], $item['quantity'], $item['price']]);
            }
            
            $pdo->commit();
            
            echo "<script>
                localStorage.removeItem('pthealthcare_cart');
                window.location.href = 'cart.php?success=1';
            </script>";
            exit;
            
        } catch(Exception $e) {
            $pdo->rollBack();
            $error = "Checkout failed. Please try again later.";
        }
    } else {
        $error = "Please fill all details and ensure cart is not empty.";
    }
}
?>

<div class="bg-white py-12 min-h-[60vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold text-slate-900 mb-8">Shopping Cart</h1>

        <?php if(isset($_GET['success'])): ?>
            <div class="bg-green-50 border border-green-200 rounded-2xl p-8 text-center">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 text-green-500 text-4xl">
                    <i class="fa-solid fa-check"></i>
                </div>
                <h2 class="text-2xl font-bold text-slate-900 mb-2">Order Confirmed!</h2>
                <p class="text-slate-600 mb-6 max-w-md mx-auto">We've received your order and our execution team will dispatch it shortly to your address.</p>
                <a href="products.php" class="inline-flex items-center gap-2 bg-slate-900 text-white px-6 py-3 rounded-full font-bold hover:bg-black transition">
                    Continue Shopping
                </a>
            </div>
        <?php else: ?>
            
            <?php if(isset($error)): ?>
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-3">
                    <i class="fa-solid fa-triangle-exclamation"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <div id="cartContentWrapper" class="hidden grid-cols-1 lg:grid-cols-12 gap-10">
                <!-- Cart Items List -->
                <div class="lg:col-span-7 xl:col-span-8 space-y-4" id="cartItemsContainer">
                    <!-- Javascript Injects here -->
                </div>

                <!-- Checkout Summary Form -->
                <div class="lg:col-span-5 xl:col-span-4">
                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 sticky top-24">
                        <h3 class="text-lg font-bold text-slate-900 mb-6">Order Summary</h3>
                        
                        <div class="flex justify-between items-center mb-4 text-slate-600">
                            <span>Subtotal</span>
                            <span id="cartSubtotal" class="font-bold text-slate-900">₹0.00</span>
                        </div>
                        <div class="flex justify-between items-center mb-6 text-slate-600">
                            <span>Delivery</span>
                            <span class="text-sm">Calculated at dispatch</span>
                        </div>
                        
                        <div class="border-t border-slate-200 pt-4 mb-8 flex justify-between items-center">
                            <span class="text-lg font-bold text-slate-900">Total</span>
                            <span id="cartTotal" class="text-2xl font-extrabold text-tertiary">₹0.00</span>
                        </div>

                        <form id="checkoutForm" method="POST" action="cart.php">
                            <input type="hidden" name="action" value="checkout">
                            <input type="hidden" name="cart_data" id="cartDataInput">
                            
                            <div class="space-y-4 mb-6">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Full Name</label>
                                    <input type="text" name="name" required class="w-full px-4 py-2 bg-white border border-slate-300 rounded-xl focus:ring-2 focus:ring-bislaim focus:border-bislaim outline-none transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Phone Number</label>
                                    <input type="tel" name="phone" required class="w-full px-4 py-2 bg-white border border-slate-300 rounded-xl focus:ring-2 focus:ring-bislaim focus:border-bislaim outline-none transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Delivery Address</label>
                                    <textarea name="address" rows="3" required class="w-full px-4 py-2 bg-white border border-slate-300 rounded-xl focus:ring-2 focus:ring-bislaim focus:border-bislaim outline-none transition resize-none"></textarea>
                                </div>
                            </div>
                            
                            <button type="submit" class="w-full bg-bislaim text-white font-bold py-4 px-6 rounded-xl hover:bg-emerald-500 transition shadow-md flex items-center justify-center gap-2">
                                <i class="fa-solid fa-lock text-sm"></i> Place Secure Order
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div id="emptyCartMsg" class="hidden text-center py-20 bg-slate-50 rounded-2xl border border-dashed border-slate-300">
                <i class="fa-solid fa-cart-shopping text-6xl text-slate-300 mb-6"></i>
                <h3 class="text-2xl font-bold text-slate-800 mb-2">Your cart is empty</h3>
                <p class="text-slate-500 mb-8">Browse our catalog and add items to your cart.</p>
                <a href="products.php" class="inline-flex items-center gap-2 bg-slate-900 text-white px-8 py-4 rounded-full font-bold hover:bg-black transition">
                    Browse Products
                </a>
            </div>
            
        <?php endif; ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    if(!document.getElementById('cartContentWrapper')) return;

    function renderCart() {
        const cart = JSON.parse(localStorage.getItem('pthealthcare_cart')) || [];
        const wrapper = document.getElementById('cartContentWrapper');
        const emptyMsg = document.getElementById('emptyCartMsg');
        const container = document.getElementById('cartItemsContainer');
        const totalEl = document.getElementById('cartTotal');
        const subtotalEl = document.getElementById('cartSubtotal');
        const cartDataInput = document.getElementById('cartDataInput');

        if (cart.length === 0) {
            wrapper.classList.remove('grid');
            wrapper.classList.add('hidden');
            emptyMsg.classList.remove('hidden');
            emptyMsg.classList.add('block');
            return;
        }

        wrapper.classList.add('grid');
        wrapper.classList.remove('hidden');
        emptyMsg.classList.remove('block');
        emptyMsg.classList.add('hidden');

        let html = '';
        let total = 0;

        cart.forEach((item, index) => {
            total += item.price * item.quantity;
            html += `
                <div class="bg-white border border-slate-200 p-4 rounded-2xl flex items-center gap-4 sm:gap-6 shadow-sm">
                    <div class="w-20 h-20 bg-slate-50 rounded-xl flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-bottle-water text-3xl text-slate-300"></i>
                    </div>
                    <div class="flex-1">
                        <div class="text-xs text-slate-400 font-bold uppercase mb-1">${item.brand} | ${item.size}</div>
                        <h4 class="font-bold text-slate-900 mb-1">${item.name}</h4>
                        <div class="text-bislaim font-bold">₹${item.price.toFixed(2)}</div>
                    </div>
                    <div class="flex items-center gap-3 bg-slate-50 rounded-full px-2 py-1 border border-slate-200">
                        <button onclick="updateQty(${index}, -1)" class="w-8 h-8 rounded-full flex items-center justify-center hover:bg-white transition text-slate-600"><i class="fa-solid fa-minus text-xs"></i></button>
                        <span class="font-bold w-4 text-center select-none">${item.quantity}</span>
                        <button onclick="updateQty(${index}, 1)" class="w-8 h-8 rounded-full flex items-center justify-center hover:bg-white transition text-slate-600"><i class="fa-solid fa-plus text-xs"></i></button>
                    </div>
                    <div class="shrink-0 text-right w-20 hidden sm:block">
                        <div class="font-black text-slate-900">₹${(item.price * item.quantity).toFixed(2)}</div>
                    </div>
                    <button onclick="removeItem(${index})" class="text-red-400 hover:text-red-600 transition p-2 ml-2 bg-red-50 hover:bg-red-100 rounded-full w-10 h-10 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
            `;
        });

        container.innerHTML = html;
        const formattedTotal = '₹' + total.toFixed(2);
        totalEl.innerText = formattedTotal;
        subtotalEl.innerText = formattedTotal;
        cartDataInput.value = JSON.stringify(cart);
    }

    window.updateQty = (index, change) => {
        let cart = JSON.parse(localStorage.getItem('pthealthcare_cart')) || [];
        cart[index].quantity += change;
        if(cart[index].quantity < 1) cart[index].quantity = 1;
        localStorage.setItem('pthealthcare_cart', JSON.stringify(cart));
        renderCart();
        if (typeof updateGlobalCartCount === 'function') updateGlobalCartCount();
    };

    window.removeItem = (index) => {
        let cart = JSON.parse(localStorage.getItem('pthealthcare_cart')) || [];
        cart.splice(index, 1);
        localStorage.setItem('pthealthcare_cart', JSON.stringify(cart));
        renderCart();
        if (typeof updateGlobalCartCount === 'function') updateGlobalCartCount();
    };

    renderCart();

    // Block submission if cart is somehow empty or logic fails
    document.getElementById('checkoutForm').addEventListener('submit', function(e) {
        if(document.getElementById('cartDataInput').value === '[]') {
            e.preventDefault();
            alert('Your cart is empty!');
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>
