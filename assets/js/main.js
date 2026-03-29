// assets/js/main.js

document.addEventListener('DOMContentLoaded', () => {
    // 1. Update Cart Count from LocalStorage
    updateCartCount();

    // 2. Hero Slider Logic
    const slides = document.querySelectorAll('.hero-slide');
    if (slides.length > 0) {
        let currentSlide = 0;
        const totalSlides = slides.length;
        
        // Next button handler
        const nextBtn = document.querySelector('.slider-next');
        const prevBtn = document.querySelector('.slider-prev');
        
        const goToSlide = (index) => {
            slides.forEach(slide => slide.classList.remove('active'));
            slides[index].classList.add('active');
        };

        const nextSlide = () => {
            currentSlide = (currentSlide + 1) % totalSlides;
            goToSlide(currentSlide);
        };

        const prevSlide = () => {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            goToSlide(currentSlide);
        };

        if(nextBtn) nextBtn.addEventListener('click', nextSlide);
        if(prevBtn) prevBtn.addEventListener('click', prevSlide);

        // Auto slide
        setInterval(nextSlide, 5000);
    }
    
    // 3. Add to Cart functionality
    const addToCartBtns = document.querySelectorAll('.add-to-cart');
    addToCartBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.dataset.id;
            const name = this.dataset.name;
            const price = parseFloat(this.dataset.price);
            const image = this.dataset.image;
            const brand = this.dataset.brand;
            const size = this.dataset.size;

            let cart = JSON.parse(localStorage.getItem('pthealthcare_cart')) || [];
            
            // Fix: properly block scoping item in array
            const existingItemIndex = cart.findIndex(item => item.id == id);
            
            if (existingItemIndex > -1) {
                cart[existingItemIndex].quantity += 1;
            } else {
                cart.push({ id, name, price, image, brand, size, quantity: 1 });
            }
            
            localStorage.setItem('pthealthcare_cart', JSON.stringify(cart));
            updateCartCount();
            
            // Simple visual feedback
            const originalText = this.innerText;
            this.innerText = 'Added!';
            setTimeout(() => {
                this.innerHTML = '<i class="fa-solid fa-cart-plus"></i> Add to Cart';
            }, 1000);
        });
    });
});

function updateCartCount() {
    const cartCountEl = document.getElementById('cartCount');
    if (!cartCountEl) return;
    
    const cart = JSON.parse(localStorage.getItem('pthealthcare_cart')) || [];
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    cartCountEl.innerText = totalItems;
}
