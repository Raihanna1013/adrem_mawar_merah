<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adrem Merah | Detail Produk</title>
    <link rel="stylesheet" href="<?= base_url('asset/style/style.css'); ?>">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Font Poppin -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<nav class="navbar">
<a href="<?= base_url(); ?>" class="navbar-brand">
    <img src="<?= base_url('asset/image/logoadrem.png'); ?>" alt="Logo">
  </a>
  <div class="menu-container">
    <a href="<?= base_url(); ?>" class="menu-item">Beranda</a>
    
    <div class="menu-item dropdown">
      <span>Tentang Kami</span>
      <div class="dropdown-menu">
        <a href="<?= base_url('tentang_kami'); ?>" class="dropdown-item">Profil Usaha</a>
        <a href="<?= base_url('organisasi'); ?>" class="dropdown-item">Organisasi</a>
        <a href="<?= base_url('sertifikat'); ?>" class="dropdown-item">Sertifikat</a>
      </div>
    </div>
    
    <a href="<?= base_url('produk'); ?>" class="menu-item">Produk</a>
    
    
    <div class="menu-item dropdown">
      <span>Berita</span>
      <div class="dropdown-menu">
        <a href="<?= base_url('berita'); ?>" class="dropdown-item">Berita</a>
        <a href="<?= base_url('galeri-foto'); ?>" class="dropdown-item">Galeri Foto</a>
      </div>
    </div>
    
    <a href="<?= base_url('galeri'); ?>" class="menu-item">Galeri Foto</a>
  </div>
</nav>
<!-- Main Content -->
        <div class="container product-detail-container">
            <!-- Left Side - Product Images -->
            <div class="product-page-mainimage">
                <div class="product-page-image">
                <img src="<?= base_url('asset/img/' . $produk->foto_barang); ?>" alt="<?= $produk->nama_barang; ?>" class="img-fluid" width="400px" height="400px">
                </div>
                
                <div class="product-thumbnails">
                  <img src="<?= base_url('asset/img/' . $produk->foto_barang); ?>" alt="Thumbnail 1" class="thumbnail" onclick="changeImage(this)">
                  <img src="<?= base_url('asset/img/' . $produk->foto_barang); ?>" alt="Thumbnail 2" class="thumbnail" onclick="changeImage(this)">
                  <img src="<?= base_url('asset/img/' . $produk->foto_barang); ?>" alt="Thumbnail 3" class="thumbnail" onclick="changeImage(this)">
                </div>
            </div>


            <!-- Right Side - Product Info -->
            <div class="product-info">
                <h1 class="product-title"><?= $produk->nama_barang; ?></h1>
                <div class="product-price">Rp <?= number_format($produk->harga_barang, 0, ',', '.'); ?></div>
                
                <br>
                
                <div class="product-details">
                    <h3>Detail Product</h3>
                    <ul>
                        <li><span>Min. Pemesanan:</span> 1 Buah</li>
        
                    </ul>
                </div> 
                <div class="product-description">
                <p><?= $produk->deskripsi_barang; ?></p>
                </div>
            </div>

            <!-- Order Section -->
            <div class="order-section">
                  <div class="order-title">Dapat Pesan Di</div>
                  <div class="order-buttons">
                    <a href="https://wa.me/6282227175035?text=Saya tertarik dengan produk <?= $produk->nama_barang ?>" class="btn-order whatsapp">
                      <img src=<?= base_url('asset/image/waputih.svg') ?> alt="WhatsApp"> Pesan Lewat WA
                    </a>
                    <a href="#" class="btn-order instagram">
                      <img src="<?= base_url('asset/image/igputih.svg') ?>" alt="Instagram"> Pesan Lewat DM
                    </a>
                    <a href="#" class="btn-order shopee">
                      <img src=<?= base_url('asset/image/shopeeputih.svg') ?> alt="Shopee"> Pesan Lewat Shopee
                    </a>
                  </div>
                </div>
            </div>


        <!-- Recommendations -->
        
<!-- Footer -->
<footer class="footer">
  <div class="container">
    <div class="footer-content">
      <!-- Logo Column -->
      <div class="footer-logo">
        <img src="<?php echo base_url('asset/image/logoadrem.png'); ?>" alt="Logo">
      </div>

      <!-- Company Column -->
      <div class="footer-column">
        <h3>Company</h3>
        <ul>
          <li><a href="#">About</a></li>
          <li><a href="#">Press</a></li>
          <li><a href="#">Events</a></li>
          <li><a href="#" class="request-demo">Request Demo <i class="fas fa-arrow-right"></i></a></li>
        </ul>
      </div>

      <!-- Our Service Column -->
      <div class="footer-column">
        <h3>Our Service</h3>
        <ul>
          <li><a href="#">Official Store</a></li>
          <li><a href="#">Product</a></li>
          <li><a href="#">Style brand</a></li>
        </ul>
      </div>

      <!-- Resources Column -->
      <div class="footer-column">
        <h3>Resources</h3>
        <ul>
          <li><a href="#">Help Center</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Tutorials</a></li>
          <li><a href="#">FAQs</a></li>
        </ul>
      </div>

      <!-- Support Column -->
      <div class="footer-column">
        <h3>Support</h3>
        <ul>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">Developers</a></li>
          <li><a href="#">Documentation</a></li>
          <li><a href="#">Integrations</a></li>
        </ul>
      </div>

      <!-- Social Media Column -->
      <div class="footer-column">
        <h3>Social media</h3>
        <div class="social-links">
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-tiktok"></i></a>
        </div>
      </div>
    </div>
    <br>

    <!-- Footer Bottom -->

</footer>
<script>
  function changeImage(thumbnail) {
    let mainImage = document.getElementById("mainImage");
    mainImage.src = thumbnail.src;
  }
</script>
</body>
</html>