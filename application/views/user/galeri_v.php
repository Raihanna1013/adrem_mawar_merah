<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/style/style.css">
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

<section id="galeri">
            <div class="content">
                <h3>Lihat Etalase Produk Kami</h3>
            </div>
        </section>

<div class="gallery-section">
  <div class="container">
    <div class="gallery-grid">
      <div class="gallery-item">
        <div class="gallery-card">
          <img src="asset/image/adrem.png" alt="Tempat Wisata Yogyakarta Terbaru Hits">
          <div class="badge info">INFO</div>
          <div class="gallery-overlay">
            <h4>Tempat Wisata Yogyakarta Terbaru Hits</h4>
            <span class="date">21 December 2023</span>
          </div>
        </div>
      </div>

      <div class="gallery-item">
        <div class="gallery-card">
          <img src="path/to/image2.jpg" alt="Ruang Lukisan Keraton Yogyakarta">
          <div class="badge info">INFO</div>
          <div class="gallery-overlay">
            <h4>Ruang Lukisan Keraton Yogyakarta</h4>
            <span class="date">13 June 2024</span>
          </div>
        </div>
      </div>

      <div class="gallery-item">
        <div class="gallery-card">
          <img src="path/to/image3.jpg" alt="Wisata Lebaran di Yogyakarta">
          <div class="badge info">INFO</div>
          <div class="gallery-overlay">
            <h4>Wisata Lebaran di Yogyakarta</h4>
            <span class="date">April 2024</span>
          </div>
        </div>
      </div>

      <!-- Tambahkan item galeri lainnya dengan pola yang sama -->
    </div>
  </div>
</div>

<!-- Modal Gallery -->
<div id="galleryModal" class="modal">
  <span class="close-modal" onclick="closeModal()">&times;</span>
  <button class="modal-prev" onclick="changeSlide(-1)">&#10094;</button>
  <button class="modal-next" onclick="changeSlide(1)">&#10095;</button>
  
  <div class="modal-content">
    <img id="modalImage" src="">
    <div class="modal-caption">
      <h3 id="modalTitle"></h3>
      <p id="modalDate"></p>
    </div>
    <button class="load-more">Tampilkan Lebih Banyak</button>
  </div>
</div>

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
    
</body>
</html>