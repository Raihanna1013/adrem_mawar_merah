<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - Mawar Merah</title>
    <link rel="stylesheet" href="<?= base_url('asset/style/style.css'); ?>">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-brand">
            <a href="<?= base_url(); ?>">
                <img src="<?= base_url('images/logo.png'); ?>" alt="Logo" class="logo">
            </a>
        </div>
        
        <!-- Hamburger Menu -->
        <div class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="nav-menu">
            <a href="<?= base_url(); ?>" class="nav-link">Beranda</a>
            <a href="#" class="nav-link">Tentang Kami</a>
            <a href="<?= base_url('produk'); ?>" class="nav-link">Produk</a>
            <a href="#" class="nav-link">Cara Pesan</a>
            <a href="#" class="nav-link">Berita</a>
            <a href="#" class="nav-link">Galeri Foto</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="product-detail-wrapper">
            <!-- Left Side - Product Images -->
            <div class="product-gallery">
                <div class="main-image-container">
                    <img src="<?= base_url('uploads/products/adrem-merah.jpg'); ?>" alt="Adrem Merah" class="main-product-image">
                </div>
                <div class="thumbnail-list">
                    <img src="<?= base_url('uploads/products/thumb1.jpg'); ?>" class="thumb-img">
                    <img src="<?= base_url('uploads/products/thumb2.jpg'); ?>" class="thumb-img">
                    <img src="<?= base_url('uploads/products/thumb3.jpg'); ?>" class="thumb-img">
                </div>
            </div>

            <!-- Middle - Product Info -->
            <div class="product-info">
                <h1 class="product-title">Adrem Merah</h1>
                <div class="product-price">Rp 82.000</div>
                
                <div class="detail-section">
                    <h3>Detail Product</h3>
                    <div class="product-details">
                        <p><span>Kondisi:</span> Baru</p>
                        <p><span>Min. Pemesanan:</span> 1 Buah</p>
                        <p><span>Etalase:</span> <a href="#" class="category-link">Baju Santai</a></p>
                    </div>
                </div>

                <p class="description">
                    Lorem ipsum dolor sit amet consectetur. Risus venenatis molestie sed tellus mauris 
                    sed fermentum egestas amet. Dapibus tincidunt pellentesque posuere accumsan.
                </p>
            </div>

            <!-- Right Side - Order Options -->
            <div class="order-options">
                <h3 class="order-title">Dapat Pesan Di</h3>
                <div class="order-buttons">
                    <a href="#" class="btn-order wa">
                        <img src="<?= base_url('images/whatsapp.png'); ?>" alt="WhatsApp">
                        Pesan Lewat WA
                    </a>
                    <a href="#" class="btn-order dm">
                        <img src="<?= base_url('images/instagram.png'); ?>" alt="Instagram">
                        Pesan Lewat DM
                    </a>
                    <a href="#" class="btn-order shopee">
                        <img src="<?= base_url('images/shopee.png'); ?>" alt="Shopee">
                        Pesan Lewat Shopee
                    </a>
                </div>
            </div>
        </div>

        <!-- Recommendations Section -->
        <div class="recommendations">
            <div class="section-header">
                <h2>Recommendation For You</h2>
                <a href="#" class="view-all">View All</a>
            </div>
            <div class="product-grid">
                <!-- Product Card -->
                <div class="product-card">
                    <img src="<?= base_url('uploads/products/jacket.jpg'); ?>" alt="Color Full Jacket">
                    <div class="product-details">
                        <h3>Color Full Jacket</h3>
                        <div class="product-meta">
                            <span class="category">Unisex Jacket</span>
                            <div class="rating">★★★★☆ (52)</div>
                        </div>
                        <div class="price-section">
                            <span class="price">Rp 82.000</span>
                            <span class="discount">-40%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <!-- Footer content here -->
        </div>
    </footer>

    <!-- Add JavaScript at the bottom of the body -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const navMenu = document.querySelector('.nav-menu');
            
            menuToggle.addEventListener('click', function() {
                navMenu.classList.toggle('active');
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (!menuToggle.contains(e.target) && !navMenu.contains(e.target)) {
                    navMenu.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html> 