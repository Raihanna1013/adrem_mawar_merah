<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - Mawar Merah</title>
    <link rel="stylesheet" href="<?= base_url('asset/style/style.css'); ?>">
</head>
<body>
    <nav class="navbar">
        <div class="nav-brand">
            <a href="<?= base_url(); ?>">
                <img src="<?= base_url('images/logo.png'); ?>" alt="Logo" class="logo">
            </a>
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

    <div class="detail-container">
        <div class="product-detail">
            <div class="product-images">
                <div class="main-image">
                    <img src="<?= base_url('uploads/products/adrem-mawar.jpg'); ?>" alt="Adrem Mawar Merah">
                </div>
                <div class="thumbnail-images">
                    <img src="<?= base_url('uploads/products/adrem-mawar-1.jpg'); ?>" alt="Thumbnail 1">
                    <img src="<?= base_url('uploads/products/adrem-mawar-2.jpg'); ?>" alt="Thumbnail 2">
                    <img src="<?= base_url('uploads/products/adrem-mawar-3.jpg'); ?>" alt="Thumbnail 3">
                </div>
            </div>
            <div class="product-info-detail">
                <h1 class="product-title">Adrem Mawar Merah</h1>
                <p class="product-price">Rp 82.000</p>
                <div class="product-description">
                    <h3>Deskripsi Produk:</h3>
                    <p>Jaket Adrem Mawar Merah dengan kombinasi warna hijau dan kuning. Dibuat dengan bahan berkualitas tinggi yang nyaman dipakai.</p>
                    
                    <h3>Spesifikasi:</h3>
                    <ul>
                        <li>Bahan: Cotton premium</li>
                        <li>Ukuran: M, L, XL</li>
                        <li>Warna: Merah, Hijau, Kuning</li>
                    </ul>
                </div>
                <div class="product-actions">
                    <button class="btn-whatsapp-large">
                        <img src="<?= base_url('images/whatsapp.png'); ?>" alt="WhatsApp">
                        Pesan Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 