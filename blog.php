<?php
// blog.php
include 'includes/header.php';
?>

<style>
.blog-page { padding: 60px 0; background: var(--bg-light); min-height: 60vh; }
.blog-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px; }
.blog-card { background: white; border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-sm); transition: var(--transition); }
.blog-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-md); }
.blog-img { height: 200px; background: var(--primary-blue); display: flex; align-items: center; justify-content: center; font-size: 3rem; color: white; }
.blog-content { padding: 30px; }
.blog-date { color: var(--text-muted); font-size: 0.9rem; margin-bottom: 10px; display: block; }
.blog-title { font-size: 1.25rem; margin-bottom: 15px; }
.blog-excerpt { color: var(--text-muted); margin-bottom: 20px; line-height: 1.6; }
.read-more { color: var(--primary-teal); font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 5px; }
.read-more:hover { gap: 8px; }
</style>

<div class="blog-page">
    <div class="container">
        <h1 class="section-title">Our Blog</h1>
        
        <div class="blog-grid">
            <article class="blog-card">
                <div class="blog-img">
                    <i class="fa-solid fa-droplet"></i>
                </div>
                <div class="blog-content">
                    <span class="blog-date">March 15, 2026</span>
                    <h2 class="blog-title">The Importance of Mineral Water</h2>
                    <p class="blog-excerpt">Discover why mineral-enriched water is essential for your daily health and well-being. From better digestion to glowing skin...</p>
                    <a href="#" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </article>

            <article class="blog-card">
                <div class="blog-img" style="background: var(--primary-teal);">
                    <i class="fa-solid fa-glass-water"></i>
                </div>
                <div class="blog-content">
                    <span class="blog-date">March 10, 2026</span>
                    <h2 class="blog-title">Daily Hydration Benefits</h2>
                    <p class="blog-excerpt">How much water should you really drink? We break down the science of hydration and how it affects your energy levels throughout the day.</p>
                    <a href="#" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </article>

            <article class="blog-card">
                <div class="blog-img" style="background: linear-gradient(135deg, #01d2b6, #b1e7ff);">
                    <i class="fa-solid fa-recycle"></i>
                </div>
                <div class="blog-content">
                    <span class="blog-date">March 5, 2026</span>
                    <h2 class="blog-title">Our Sustainable Packaging</h2>
                    <p class="blog-excerpt">P.T Healthcare is committed to reducing environmental impact. Learn more about our latest eco-friendly bottling initiatives.</p>
                    <a href="#" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </article>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
